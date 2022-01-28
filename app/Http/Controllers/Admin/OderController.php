<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OderRequest;
use App\Models\User;
use App\Models\Oder;
use Auth;

use Illuminate\Support\Facades\Response;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Style;


class OderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        if (Auth::user()->department == 'Marketing' && Auth::user()->team == 'Manager' || Auth::user()->department == 'Marketing' && Auth::user()->team == 'IT') {
            $oders = Oder::orderby('created_at', 'desc')
                ->search('category', 'tag')
                ->paginate(20);
            return view('admin.oder.index', compact('oders'));
        }
        return response()->view('errors.403');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // Người được giao
        $users = User::where('team', '=', 'Design')->get();
        // Người cập nhật mạng xã hội
        $users_social = User::where('team', '=', 'Content')->get();
        return view('admin.oder.add', compact('users', 'users_social'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OderRequest $request)
    {
        $oder = new Oder();
        $oder['team'] = $request->team;
        $oder['customer'] = $request->team;
        $oder['category'] = $request->category;
        $oder['tag'] = $request->tag;
        $oder['content'] = $request->content;
        $oder['description'] = $request->description;
        $oder['start_date'] = $request->start_date;
        $oder['end_date'] = $request->end_date;
        $oder['pic_id'] = $request->pic_id;
        $oder['status'] = $request->status;
        $oder['return_link'] = $request->return_link;
        $oder['finish_date'] = $request->finish_date;
        $oder['comment'] = $request->comment;
        $oder['success'] = $request->success;
        $oder['pic_social_id'] = $request->pic_social_id;
        $oder['status_social'] = $request->status_social;
        $oder['link_social'] = $request->link_social;
        $oder['date_social'] = $request->date_social;
        //dd($request->all());
        // dd($request->all());
        $oder->fill($request->all());
        $oder->save();
        return redirect()->route('oder.view')->with('message', 'Đã thêm yêu cầu thiết kế thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Oder $oder)
    {
        // Người được giao
        $users = User::where('team', '=', 'Design')->get();
        // Người cập nhật mạng xã hội
        $users_social = User::where('team', '=', 'Content')->get();
        return view('admin.oder.edit', compact('users', 'users_social', 'oder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OderRequest $request, Oder $oder)
    {
        $oder->fill($request->all());
        $oder->save();
        if(Auth::user()->team == 'Design') {
            return redirect()->route('admin')->with('message', 'Đã cập nhật tình trạng thiết kế thành công!');
        }
        elseif(Auth::user()->team == 'Content') {
            return redirect()->route('admin')->with('message', 'Đã cập nhật tình trạng mạng xã hội thành công!');
        }
        else {
        return redirect()->route('oder.view')->with('message', 'Đã cập nhật yêu cầu thiết kế thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oder $oder)
    {
        // If the object exists, delete then return the screen path containing the object with the message
        if ($oder->delete() == true) {
            return redirect()->route('oder.index')->with('message', 'Xoá yêu cầu thiết kế thành công');
        }
        // Otherwise go back to the first page and the message is not successful
        else {
            return redirect()->back()->with('error', 'Xoá yêu cầu thiết kế không thành công!');
        }
    }

    public function oder_view(User $user)
    {
        if (Auth::user()->team == 'Manager' || Auth::user()->team == 'Staff' || Auth::user()->team == 'Content' || Auth::user()->team == 'Seo' || Auth::user()->team == 'Luxshine' || Auth::user()->team == 'Apo' || Auth::user()->team == 'Macsara' || Auth::user()->team == 'IT') {
            $id = Auth::user()->id;
            $oders = User::find($id)
                ->getOder()
                ->orderBy('id', 'DESC')
                ->paginate(20);
            return view('admin.oder.view', compact('oders'));
        }
        return response()->view('errors.403');
    }


    public function oder_work()
    {
        if (Auth::user()->team == 'Design') {
            $id = Auth::user()->id;
            $oders = User::find($id)
                ->getWork()
                ->orderBy('id', 'DESC')
                ->paginate(20);
            return view('admin.oder.work', compact('oders'));
        }
        elseif (Auth::user()->team == 'Content') {
            $id = Auth::user()->id;
            $oders = User::find($id)
                ->getSocial()
                ->orderBy('id', 'DESC')
                ->paginate(20);
            return view('admin.oder.work', compact('oders'));
        }
        return response()->view('errors.403');
    }


    public function oder_analytic(Request $request)
    {
        $ids = $request->ids;
        $excel = $this->ExportOder($ids);
        return view('admin.oder.preview', compact('ids', 'excel'));
    }

    public function export(Request $request)
    {
        $ids = $request->get('ids');
        $excel = $this->ExportOder($ids);
        return redirect($excel);
    }

    public function ExportOder(string $handleId)
    {
        $handleIds = explode(',', $handleId);
        $arr = [];
        foreach ($handleIds as $key => $val) {
            $oder = Oder::find($val);

            $arr[$key]['team'] = !empty($oder->team) ? $oder->team : '';
            $arr[$key]['category'] = !empty($oder->category) ? $oder->category : '';
            $arr[$key]['tag'] = !empty($oder->tag) ? $oder->tag : '';
            $arr[$key]['content'] = !empty($oder->content) ? $oder->content : '';
            $arr[$key]['description'] = !empty($oder->description) ? $oder->description : '';
            $arr[$key]['start_date'] = !empty($oder->start_date) ? $oder->start_date : '';
            $arr[$key]['end_date'] = !empty($oder->end_date) ? $oder->end_date : '';
            $arr[$key]['pic_id'] = !empty($oder->pic_id) ? $oder->pic->name : '';
            $arr[$key]['status'] = !empty($oder->status) ? $oder->status : '';
            $arr[$key]['finish_date'] = !empty($oder->finish_date) ? $oder->finish_date : '';
            $arr[$key]['return_link'] = !empty($oder->return_link) ? $oder->return_link : '';
            $arr[$key]['comment'] = !empty($oder->comment) ? $oder->comment : '';
            $arr[$key]['success'] = !empty($oder->success) ? $oder->success : '';
            $arr[$key]['pic_social_id'] = !empty($oder->pic_social_id) ? $oder->pic_social->name : '';
            $arr[$key]['status_social'] = !empty($oder->status_social) ? $oder->status_social : '';
            $arr[$key]['link_social'] = !empty($oder->link_social) ? $oder->link_social : '';
            $arr[$key]['date_social'] = !empty($oder->date_social) ? $oder->date_social : '';
        }
        // Constructor Excel Reader
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setIncludeCharts(true);
        $reader->setReadDataOnly(true);
        $reader->setReadDataOnly(true);

        // Read Template Excel
        $template = storage_path('excel/APOGROUP_ODER_HINH_ANH.xlsx');
        $spreadsheet = $reader->load($template);


        // Create New Writer
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->setIncludeCharts(true);

        foreach ($arr as $key => $val) {

            $spreadsheet->setActiveSheetIndexByName("ORDER")->getCell('B' . (3 + $key * 1))->setValue($val['team']);
            $spreadsheet->setActiveSheetIndexByName("ORDER")->getCell('C' . (3 + $key * 1))->setValue($val['category']);
            $spreadsheet->setActiveSheetIndexByName("ORDER")->getCell('D' . (3 + $key * 1))->setValue($val['tag']);
            $spreadsheet->setActiveSheetIndexByName("ORDER")->getCell('E' . (3 + $key * 1))->setValue($val['content']);
            $spreadsheet->setActiveSheetIndexByName("ORDER")->getCell('F' . (3 + $key * 1))->setValue($val['description']);
            $spreadsheet->setActiveSheetIndexByName("ORDER")->getCell('J' . (3 + $key * 1))->setValue($val['start_date']);
            $spreadsheet->setActiveSheetIndexByName("ORDER")->getCell('N' . (3 + $key * 1))->setValue($val['end_date']);
            $spreadsheet->setActiveSheetIndexByName("ORDER")->getCell('O' . (3 + $key * 1))->setValue($val['pic_id']);
            $spreadsheet->setActiveSheetIndexByName("ORDER")->getCell('P' . (3 + $key * 1))->setValue($val['status'] == 1 ? "Done" : "Not Done");
            $spreadsheet->setActiveSheetIndexByName("ORDER")->getCell('Q' . (3 + $key * 1))->setValue($val['return_link']);
            $spreadsheet->setActiveSheetIndexByName("ORDER")->getCell('U' . (3 + $key * 1))->setValue($val['finish_date']);
            $spreadsheet->setActiveSheetIndexByName("ORDER")->getCell('V' . (3 + $key * 1))->setValue($val['comment']);
            $spreadsheet->setActiveSheetIndexByName("ORDER")->getCell('W' . (3 + $key * 1))->setValue($val['success'] == 1 ? "Done" : "Not Done");
            $spreadsheet->setActiveSheetIndexByName("ORDER")->getCell('X' . (3 + $key * 1))->setValue($val['pic_social_id']);
            $spreadsheet->setActiveSheetIndexByName("ORDER")->getCell('Y' . (3 + $key * 1))->setValue($val['status_social'] == 1 ? "Done" : "Not Done");
            $spreadsheet->setActiveSheetIndexByName("ORDER")->getCell('Z' . (3 + $key * 1))->setValue($val['link_social']);
            $spreadsheet->setActiveSheetIndexByName("ORDER")->getCell('AD' . (3 + $key * 1))->setValue($val['date_social']);
        }


        // Output Permission
        $outputDir = public_path('export');
        if (!is_dir($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        // Output path
        $output = $outputDir . '/' . 'bao-cao-yeu-cau-thiet-ke' . '-' . time() . '.xlsx';
        if (is_file($output)) {
            unlink($output);
        }

        // Writer File Into Path
        $writer->save('export/bao-cao-yeu-cau-thiet-ke' . '-' . time() . '.xlsx');

        return str_replace(public_path(''), getenv('APP_URL'), $output);

    }
}
