<?php

namespace App\Http\Controllers\Painel;

use App\Post;
use Illuminate\Http\Request;

use Gate;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;

        // Tentar implementar essa chacagem (ñ estava redirecionando!);
        //if ( Gate::denies('view_post') )
        //  return redirect()->back();
    }

    public function index()
    {
        if ( Gate::denies('view_post') )
            return redirect()->back();
        //abort(403, 'Ação não permitida!');

        $posts = $this->post->all();

        return view('painel.posts.index', compact('posts'));
    }
}
