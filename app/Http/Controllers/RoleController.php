<?php

namespace App\Http\Controllers;

use App\Services\PermissionService;
use App\Services\RoleService;
use Exception;

class RoleController extends Controller {

    public function __construct(private readonly RoleService $roleService, private readonly PermissionService $permissionService){}

    public function index(){
        $roles = $this->roleService->get();
        return view('pages.roles.index', compact('roles'));
    }

    public function create(){
        $permissions = $this->permissionService->get();
        return view('pages.roles.create', compact('permissions'));
    }

    public function store(){
        try{
            $this->roleService->create();
            return redirect()->route('roles.index')->with('success', __('messages.success.create'));
        }catch (Exception $e){
            return redirect()->route('roles.index')->with('error', __('messages.error.create'));
        }
    }

    public function edit($role){
        $role = $this->roleService->getByUuid($role);
        $permissions = $this->permissionService->get();
        return view('pages.roles.edit', compact('role', 'permissions'));
    }

    public function update($role){
        try {
            $this->roleService->update($role);
            return redirect()->route('roles.index')->with('success', __('messages.success.update'));
        }catch (Exception $e){
            return redirect()->route('roles.index')->with('error', __('messages.error.update'));
        }
    }

    public function destroy($role){
        try {
            $this->roleService->delete($role);
            return redirect()->route('roles.index')->with('success', __('messages.success.delete'));
        }catch (Exception $e){
            return redirect()->route('roles.index')->with('error', __('messages.error.delete'));
        }
    }
}
