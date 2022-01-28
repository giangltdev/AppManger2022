<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:SupperAdmin', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        $roles = Role::with('permissions')
            ->search('name')
            ->paginate(20);
        // dd($roles);
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.add', compact('permissions'));
    }

    public function createPer()
    {
        $permissions = Permission::all();
        return view('admin.roles.addPer', compact('permissions'));
    }

    public function storePer(Request $request)
    {
        $per = Permission::create(['name' => $request->pername, 'guard_name' => 'web']);
        return redirect()->route('roles.createPer')->with('message', 'Thêm quyền thành công');
    }

    public function delete(Request $request)
    {
        $role = Role::findById($request->id);
        $role->delete();
        return redirect()->route('roles.index')->with('message', 'Xóa chức vụ thành công');
    }

    public function deletePer(Request $request)
    {
        $per = Permission::findById($request->id);
        $per->delete();
        return redirect()->route('roles.createPer')->with('message', 'Xóa quyền thành công');
    }

    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);
        $role->givePermissionTo($request->permission);

        return redirect()->route('roles.index')->with('message', 'Thêm chức vụ thành công');
    }

    public function edit(Request $request)
    {
        // $role = $this->roleRepository->findById($request->id, ['permissions']);
        $role = Role::findById($request->id);
        $permissions = Permission::all();
        if ($role->permissions != null) {
            foreach ($role->permissions as $key => $per) {
                $role->revokePermissionTo($per);
            }
        }
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function editPer(Request $request)
    {
        $per = Permission::findById($request->id);
        $permissions = Permission::all();
        return view('admin.roles.editPer', compact('per', 'permissions'));
    }

    public function updateRole(Request $request)
    {
        $roleUpdate = Role::findById($request->id);
        //update name của role
        $roleUpdate->name = $request->name;
        $roleUpdate->save();
        $users = User::all();
        // dd($users);
        foreach ($users as $user) {
            if ($user->hasRole($request->name)) {
                $user->givePermissionTo($request->permission);
            }
        }
        $roleUpdate->givePermissionTo($request->permission);
        return redirect()->route('roles.index')->with('message','Sửa chức vụ thành công');
    }

    public function updatePer(Request $request)
    {
        $perUpdate = Permission::findById($request->id);
        //update name của Permission
        $perUpdate->name = $request->pername;
        $perUpdate->save();
        return redirect()->route('roles.createPer')->with('message','Sửa quyền thành công');
    }
}
