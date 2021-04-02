<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(5);//paginate ist um nicht alle zu bekommen sonder nur wieviele man als value angibt
                                                                    // orderby('created_at', 'desc')-> oder latest()-> als shortcut zum Sortieren

        //$posts = Post::get(); //ist eine Collection um alle Posts zu bekommen, where oder find für spezifische suche
        return view('posts.index', [
            'posts' => $posts
    ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
      /*  Post::create([
            'user_id' => auth()->id(),*/
      }

      public function destroy(Post $post)
      {
          $this->authorize('delete', $post);

          $post->delete();

          return back();
      }
}
