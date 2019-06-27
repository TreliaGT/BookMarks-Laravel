<?php

namespace App\Http\Controllers;

use Cviebrock\EloquentTaggable\Models\Tag;
use Cviebrock\EloquentTaggable\Services\TagService;
use Illuminate\Http\Request;
use App\Bookmark;

class AdminTagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(15);
       return view('Tags.index', compact('tags'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::FindorFail($id);
       $bookmarks = Bookmark::withAnyTags($tag->name)->get();
        return view('Tags.show', compact('tag', 'bookmarks'));
    }

    /**
     * Search user function
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $q = $request->input('q');
        $tags = Tag::where('name', 'LIKE', '%' . $q . '%')->paginate(15);

        return view('Tags.index', compact('tags'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::FindorFail($id);
        $tag->delete();
       return redirect('/tags');
    }

    /**
     * Deletes all unsured tags
     */
    public function DeleteAll(){
        $service = app(\Cviebrock\EloquentTaggable\Services\TagService::class);
       $tags = $service->getAllUnusedTags();
      // dd($tags);
        foreach ($tags as $tag) {
            $tag->delete();
        }

        return redirect('/tags');
    }

    /**
     * Api for showing all of the Tags
     * @return bookmarks[]|\Illuminate\Database\Eloquent\Collection
     */
    public function apiAll()
    {
        dd(Tag::all());
        return Tag::all();
    }
    /**
     * Api for showing only one Tags
     * @param $id
     * @return mixed
     */
    public function apiOne($id)
    {
        return Tag::findOrFail($id);
    }
}
