<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use Gate;
use App\Role;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
        // Tentar implementar essa chacagem (ñ estava redirecionando!);
        //if ( Gate::denies('adm') )
          //  return redirect()->back();
    }

    public function index()
    {
        if ( Gate::denies('adm') )
            return redirect()->back();

        $roles = $this->role->all();
        return view('painel.roles.index', compact('roles'));
    }

    public function permissions($id)
    {
        $role = $this->role->find($id);

        $permissions = $role->permissions()->get();

        return view('painel.roles.permissions', compact('role', 'permissions'));
    }
}
