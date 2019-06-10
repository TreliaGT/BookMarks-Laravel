<?php

namespace App\Http\Controllers;

use App\SocialMediaLink;
use Illuminate\Http\Request;
use Auth;
use App\Profile;
class socialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
      //  dd($user->id);
        $profile = Profile::FindOrFail($user->id);
        return view('SocialMedia.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = request()->validate([
            'name' => ['required'],
            'url' => ['required'],
        ]);
        $user = Auth::user();
        $profile = Profile::FindOrFail($user->id);

        SocialMediaLink::create([
            'name' => $request->input('name'),
            'url' => $request->input('url'),
            'profile_id' => $profile->id,
        ]);

        return view('SocialMedia.index', compact('profile'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socialmedia = SocialMediaLink::FindOrFail($id);
        $socialmedia->delete();
        $user = Auth::user();
        //  dd($user->id);
        $profile = Profile::FindOrFail($user->id);
        return view('SocialMedia.index', compact('profile'));
    }
}
