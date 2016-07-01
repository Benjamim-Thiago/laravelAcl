<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Post;
use App\Permission;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PainelController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalRoles = Role::count();
        $totalPosts = Post::count();
        $totalPermissions = Permission::count();

        return view('painel.home.index', compact('totalUsers', 'totalRoles', 'totalPosts', 'totalPermissions'));
    }
}
