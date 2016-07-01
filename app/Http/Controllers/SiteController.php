<?php

namespace App\Http\Controllers;

use Gate;
use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
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
        return redirect('/painel');
//        return view('portal.home.index');
    }

    public function update($id)
    {
        $post = Post::find($id);

        //$this->authorize('update-post', $post);
        if ( Gate::denies('edit_post', $post) )
            abort(403, 'Unauthorized');

        return view('update-post', compact('post'));
    }

    public function rolesPermissions()
    {
        $nameUser = auth()->user()->name;

        print( "<h1> $nameUser </h1>" );

        foreach ( auth()->user()->roles as $role ) {
            echo "<b> $role->name </b> -> ";

            $permissions = $role->permissions;
            foreach ( $permissions as $permission ) {
                echo "$permission->name, ";
            }
        echo '<hr>';
        }
    }
}
