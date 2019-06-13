<?php

namespace App\Http\Controllers;

use App\SocialMediaLink;
use Illuminate\Http\Request;
use App\User;
use App\profile;
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

        return view(
            'Users.index', compact('users')
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
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

        return redirect('Users.index');
    }
}
