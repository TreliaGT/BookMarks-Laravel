<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use App\User;
use Illuminate\Support\Facades\Hash;
use Image;
use Auth;
use File;
class ProfileController extends Controller
{

    public function index(){

        $user = array('user' => Auth::user());
        // dd( $user->profile()->avatar);
        return view('Profile.profile', $user);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $profile = Profile::FindOrFail($user->id);
        if ($request->hasFile('avatar')) {

            if( $profile->avatar == 'default.jpg') {
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
                $profile->avatar = $filename;
                $profile->save();
            }else{
                $image = public_path('/uploads/avatars/' . $profile->avatar);
                File::delete($image);
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
                $profile->avatar = $filename;
                $profile->save();
            }
        }

        return redirect('Profile.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $profile = Profile::FindOrFail($id);
      return view('Profile.edit',  compact('profile'));
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

        $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $profile = Profile::find($id);
        $user = User::Find($profile->user_id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $profile->first_name = $request->get('firstname');
        $profile->last_name = $request->get('lastname');

        if($request->get('password') != "") {
            $this->validate($request, [
                'password' => 'min:6|confirmed'
            ]);
            $user->password = Hash::make($request->get('password'));
        }
        $user->save();
        $profile->save();
        return redirect('/profile');
    }

}
