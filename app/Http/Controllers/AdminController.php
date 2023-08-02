<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin_login()
    {
        return view('admin.login');
    }

    public function admin_login_submit(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('dashboard');
        }else{
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'password' => ['Şifrə yanlışdır'],
            ]);
            throw $error;
        }

    }

    public function create_admin(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        if($request->roles){
            foreach ($request->roles as $admin_role){
                DB::table('admins_roles')->insert(
                    ['admin_id' => $admin->id, 'role_id' => $admin_role]
                );
            }
        }



        return redirect()->back()->with('message','Əlavə olundu');
    }

    public function dashboard()
    {
//        $admin = Auth::guard('admin')->user();
//        dd($admin->hasRole('user'));
        return view('admin.dashboard');

    }

    public function admin_logout()
    {

        Auth::guard('admin')->logout();

        return redirect()->route('admin_login');

    }

    public function users_list()
    {

        $users = User::all();
        return view('admin.users_list', compact('users'));

    }

    public function edit_user($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    public function delete_user($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('message','User silindi');
    }

    public function update_user(Request $request,$id)
    {

        $request->validate([
            'email' => 'required|email|unique:users,email,'. $id,
            'username' => 'required|unique:users,username,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_active = $request->is_active;
        $user->save();

        return redirect()->back()->with('message','Uğurla update edildi');

    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function userTickets(User $user)
    {
        $user->load('tickets');
        return view('admin.user-tickets', compact('user'));
    }

    public function admin_list()
    {

        $admins = Admin::with('roles')->get();
        $roles = Role::all();
        return view('admin.admin_list', compact('admins','roles'));

    }

    public function edit_admin($id)
    {
        $admin = Admin::with('roles')->findOrFail($id);
        $roles = Role::all();

        return view('admin.edit_admin', compact('admin','roles'));
    }

    public function update_admin(Request $request,$id)
    {


        $admin = Admin::with('roles')->findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if($request->password){
            $admin->password = Hash::make($request->password);
        }



        $admin->save();

        if($request->roles){
            DB::table('admins_roles')->where('admin_id',$admin->id)->delete();

            foreach ($request->roles as $admin_role){
                DB::table('admins_roles')->insert(
                    ['admin_id' => $admin->id, 'role_id' => $admin_role]
                );
            }
        }



        return redirect()->back()->with('message','Əlavə olundu');

    }


}
