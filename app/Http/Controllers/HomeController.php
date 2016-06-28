<?php

namespace App\Http\Controllers;

use Gate;
use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Post $posts)
    {
        $posts = $posts->all();
        return view('home', compact('posts'));
    }

    public function update($id)
    {
        $post = Post::find($id);

        //$this->authorize('update-post', $post);
        if ( Gate::denies('update-post', $post) )
            abort(403, 'Unauthorized');

        return view('update-post', compact('post'));
    }
}
