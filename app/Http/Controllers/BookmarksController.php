<?php

namespace App\Http\Controllers;

use App\Bookmark;
use Illuminate\Http\Request;
use Auth;
use Image;
use File;

class BookmarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Auth::user();
        $bookmarks = Bookmark::paginate(10);
        return view('Bookmarks.index', compact('bookmarks'));
    }

    /**
     * Search function
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $user = Auth::user();
        $q = $request->input('q');
        $bookmarks = Bookmark::where('title', 'LIKE', '%' . $q . '%')->paginate(10);
        return view('Bookmarks.index', compact('bookmarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Bookmarks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validated = request()->validate([
            'title' => ['required', 'max:255'],
            'url' => ['required', 'max:512'],
            'description' => ['required'],
        ]);
        if($request->input('status') == "True"){
            $status = true;
        }else{
            $status = false;
        }
        $bookmark = Bookmark::Create([
            'user_id' => $user->id,
            'title' => $request->input('title'),
            'url' => $request->input('url'),
            'description' => $request->input('description'),
            'status' => $status,
        ]);

        if ($request->hasFile('thumbnail')) {
            $avatar = $request->file('thumbnail');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/bookmarks/' . $filename));
            $bookmark->thumbnail = $filename;
            $bookmark->save();
        }
        $tags = explode(',', $request->input('tag'));
        $bookmark->retag($tags);
        return redirect('/Bookmarks');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookmark = Bookmark::FindOrFail($id);
        return view('Bookmarks.show', compact('bookmark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookmark = Bookmark::FindOrFail($id);
        return view('Bookmarks.edit', compact('bookmark'));
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
            'title' => ['required', 'max:255'],
            'url' => ['required', 'max:512'],
            'description' => ['required'],

        ]);

        if($request->input('status') == "True"){
            $status = true;
        }else{
            $status = false;
        }

        $bookmark = BookMark::find($id);
        $bookmark->title = $request->get('title');
        $bookmark->url = $request->get('url');
        $bookmark->description = $request->get('description');
        $bookmark->status = $status;

        if ($request->hasFile('thumbnail')) {
            if ($bookmark->thumbnail == 'default.jpg') {
                $img = $request->file('thumbnail');
                $filename = time() . '.' . $img->getClientOriginalExtension();
                Image::make($img)->resize(300, 300)->save(public_path('/uploads/bookmarks/' . $filename));
                $bookmark->thumbnail = $filename;
            } else {
                $image = public_path('/uploads/bookmarks/' . $bookmark->thumbnail);
                File::delete($image);
                $img = $request->file('thumbnail');
                $filename = time() . '.' . $img->getClientOriginalExtension();
                Image::make($img)->resize(300, 300)->save(public_path('/uploads/bookmarks/' . $filename));
                $bookmark->thumbnail = $filename;
            }
        }

        $bookmark->save();
        $tags = explode(',', $request->input('tag'));
        $bookmark->retag($tags);
        return redirect('/Bookmarks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Bookmark::FindOrFail($id);
        $book->detag();
        $book->delete();
        return redirect('/Bookmarks');
    }

    /**
     * Api for showing all of the bookmarks
     * @return bookmarks[]|\Illuminate\Database\Eloquent\Collection
     */
    public function apiAll()
    {
        return Bookmark::all();
    }
    /**
     * Api for showing only one bookmarks
     * @param $id
     * @return mixed
     */
    public function apiOne($id)
    {
        return Bookmark::findOrFail($id);
    }

}
