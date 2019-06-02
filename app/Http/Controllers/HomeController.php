<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
}
