<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Services\RoleService;

class RoleController extends Controller {

    public function __construct(private readonly RoleService $roleService){
    }

    public function index(){
        $roles = $this->roleService->get();
        return view('pages.roles.index', compact('roles'));
    }

    public function create(){
        return view('pages.roles.create');
    }

    public function store(){
        return response()->json();
    }

    public function edit(Role $role){
        return view('pages.roles.edit', compact('role'));
    }

    public function update(){
        return response()->json();
    }
}
