<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:Admin', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }
    public function index()
    {
        $users = User::orderby('created_at', 'desc')
            ->search('name', 'email', 'phone')
            ->paginate(20);
        // Return view with variable get user
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('admin.user.add', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['password'] = bcrypt($request->password);
        $user['is_active'] = ($request->is_active);
        $user->fillable($request->all());
        $user->save();
        $user->assignRole($request->role);
        return redirect()->route('user.index')->with('message', 'Đã thêm tài khoản thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $role = Role::all();
        return view('admin.user.edit', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user['first_name'] = $request->first_name;
        $user['last_name'] = $request->last_name;
        $user['gender'] = $request->gender;
        $user['birthday'] = $request->birthday;
        $user['address'] = $request->address;
        $user['name'] = $request->name;
        $user['images'] = $request->images;
        $user['email'] = $request->email;
        $user['phone'] = $request->phone;
        $user['is_active'] = ($request->is_active);
        $user->syncRoles($request->role);
        $permissions = Permission::all();
        $user->revokePermissionTo($permissions);
        $role = Role::findByName($request->role);
        foreach ($permissions as $per) {
            $permission = $per->name;
            if ($role->hasPermissionTo($permission)) {
                $user->givePermissionTo($permission);
            }
        }

        // Create a variable to get the file through the request
        $get_image = $request->file('images');
        // Create a variable that checks if the file exists
        $has_file = $request->hasFile('images');
        //If a file is found and an existing file returns true, then add the file
        if ($get_image && $has_file == true) {
            // Get the file name
            $get_image_name = $get_image->getClientOriginalName();
            // Convert files use uniqid to generate a random string and concatenate names with spaces and underscores
            $new_images = uniqid() . '_' . str_replace(' ', '_', $get_image_name);
            // Push the file to the path of the converted name
            $get_image->move('images/posts', $new_images);
            // Assigns the converted name to the array
            $user['images'] = $new_images;

            // Get all value
            $user->fillable($request->all());

            // Save value to database
            $user->save();

            // Return page redirection and successful message submission with Sweetaleart
            return redirect()->route('user.index')->with('message', 'Đã cập nhật thông tin thành công!');
        }
        // If the image is empty, continue to upload
        $user['images'] = "";
        // Get all value
        $user->fillable($request->all());
        // Save value to database
        $user->save();
        // Return page redirection and successful message submission with Sweetaleart
        return redirect()->route('user.index')->with('message', 'Đã cập nhật thông tin thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // If the object exists, delete then return the screen path containing the object with the message
        if ($user->delete() == true) {
            return redirect()->route('user.index')->with('message', 'Xoá tài khoản thành công');
        }
        // Otherwise go back to the first page and the message is not successful
        else {
            return redirect()->back()->with('error', 'Xoá tài khoản không thành công!');
        }
    }
}
