<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Profile;
use Auth;
use Image;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      /*  Role::create(['name' => 'Admin']);
        Permission::create(['name' => 'Admin access']);
        Role::create(['name' => 'User']);
        Permission::create(['name' => 'User access']);
        $role = Role::Find(1);
        $permission = Permission::Find(1);
        $role->givePermissionTo($permission);
        $role = Role::Find(2);
        $permission = Permission::Find(2);
        $role->givePermissionTo($permission);*/
     // auth()->user()->assignRole('Admin');
       //auth()->user()->assignRole('User');

        return view('Pages.home');
    }

    public function profile(){

        $user = array('user' => Auth::user());
      // dd( $user->profile()->avatar);
        return view('Pages.profile', $user);
    }

    public function update_UserImage(Request $request){
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time(). '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' . $filename));
            $user = Auth::user();
            $user->profile()->update(['avatar' => $filename]);

        }
        $user = array('user' => Auth::user());
        return view('Pages.profile', $user);
    }

}
