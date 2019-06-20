<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\SocialMediaLink;
use Illuminate\Http\Request;
use App\User;
use App\profile;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('profile')->get();

        $roles = Role::get();
        return view(
            'Users.index', compact('users', 'roles')
        );
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('Users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); //Get user with specified id
        $roles = Role::get(); //Get all roles

        return view('Users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findorFail($id);
        if($request->get('password') != "") {
            $this->validate($request, [
                'password' => 'min:6|confirmed'
            ]);
            $user->password = Hash::make($request->get('password'));
        }
        $roles = $request['roles'];
        if (isset($roles)) {

            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        }
        else {

            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }
        return redirect('/users');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::FindOrFail($id);
        $profile = Profile::FindOrFail($user->id);
        if( $profile->avatar = 'default.jpg') {
            $profile->social_media()->delete();
            $profile->delete();
            $user->delete();
        }
        else {
            $image = public_path('/upload/avatar/' . $profile->avatar);
            File::delete($image);
            $profile->social_media()->delete();
            $profile->delete();
            $user->delete();
        }

        return redirect('/users');
    }
}
