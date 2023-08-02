<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function permission()
    {
        $permissions = Permission::all();
        return view('admin.permissions',compact('permissions'));
    }

    public function create_permission(Request $request)
    {
        $permission = new Permission();

        $permission->name= $request->name;
        $permission->slug= $request->slug;

        $permission->save();
        return redirect()->back()->with('message','Əlavə olundu');
    }
}
