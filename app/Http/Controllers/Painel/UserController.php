<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use Gate;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;

        // Tentar implementar essa chacagem (ñ estava redirecionando!);
        //if ( Gate::denies('user') )
          //  return redirect()->back();
    }

    public function index()
    {
        if ( Gate::denies('user') )
            return redirect()->back();

        $users = $this->user->all();
        return view('painel.users.index', compact('users'));
    }

    public function roles($id)
    {
        $user = $this->user->find($id);

        $roles = $user->roles()->get();

        return view('painel.users.roles', compact('user', 'roles'));
    }
}
