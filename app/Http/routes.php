<?php

Route::group(['prefix' => 'painel'], function () {

    //PostController
    Route::get('posts', 'Painel\PostController@index');

    //PermissionController
    Route::get('permissions', 'Painel\PermissionController@index');
    Route::get('permission/roles/{id}', 'Painel\PermissionController@roles');

    //RoleController
    Route::get('roles', 'Painel\RoleController@index');
    Route::get('role/permissions/{id}', 'Painel\RoleController@permissions');

    //UserController
    Route::get('users', 'Painel\UserController@index');
    Route::get('user/roles/{id}', 'Painel\UserController@roles');

    //PainelController
    Route::get('/', 'Painel\PainelController@index');

});

Route::auth();

Route::get('/', 'SiteController@index');
