<?php

namespace App\Http\Controllers;


use App\Services\RoleService;
use App\Services\UserService;
use Exception;

class UserController extends Controller {
    public function __construct(private readonly UserService $userService, private readonly RoleService $roleService){}

    public function index(){
        $users = $this->userService->get();
        return view('pages.users.index', compact('users'));
    }

    public function create(){
        return view('pages.users.create');
    }

    public function store(){
        try{
            $this->userService->create();
            return redirect()->route('users.index')->with('success', __('messages.success.create'));
        }catch (Exception $e){
            return redirect()->route('users.index')->with('error', __('messages.error.create'));
        }
    }

    public function edit($user){
        $user = $this->userService->getByUuid($user);
        $roles = $this->roleService->getUserUpdate($user);
        return view('pages.users.edit', compact('user', 'roles'));
    }

    public function update($user){
        try {
//            dd(request()->all());
            $this->userService->update($user);
            return redirect()->route('users.index')->with('success', __('messages.success.update'));
        }catch (Exception $e){
            return redirect()->route('users.index')->with('error', __('messages.error.update'));
        }
    }

    public function destroy($users){
        try {
            $this->userService->delete($users);
            return redirect()->route('users.index')->with('success', __('messages.success.delete'));
        }catch (Exception $e){
            return redirect()->route('users.index')->with('error', __('messages.error.delete'));
        }
    }

}
