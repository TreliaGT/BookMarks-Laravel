<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use App\Social_Media;
use Image;
use Auth;
class ProfileController extends Controller
{

    public function index(){

        $user = array('user' => Auth::user());
        // dd( $user->profile()->avatar);
        return view('Profile.profile', $user);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
            $user = Auth::user();
            $user->profile()->update(['avatar' => $filename]);
        }
        $user = array('user' => Auth::user());
        return view('Profile.profile', $user);
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
            'email' => ['required'],
        ]);

        $profile = Profile::find($id);
        $profile->first_name = $request->get('firstname');
        $profile->last_name = $request->get('lastname');
        $profile->email = $request->get('email');
        $profile->save();
        return redirect('/profile');
    }

}
