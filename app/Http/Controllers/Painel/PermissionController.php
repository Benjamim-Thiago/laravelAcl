<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use Gate;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Permission;

class PermissionController extends Controller
{
    private $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;

        // Tentar implementar essa chacagem (ñ estava redirecionando!);
        //if ( Gate::denies('adm') )
          //  return redirect()->back();
    }

    public function index()
    {
        if ( Gate::denies('adm') )
            return redirect()->back();

        $permissions = $this->permission->all();
        return view('painel.permissions.index', compact('permissions'));
    }

    public function roles($id)
    {
        $permission = $this->permission->find($id);

        $roles = $permission->roles()->get();

        return view('painel.permissions.roles', compact('permission', 'roles'));
    }
}
