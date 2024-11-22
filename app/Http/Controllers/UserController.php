<?php

namespace App\Http\Controllers;


class UserController extends Controller
{
    public function index(){
        return response()->json(auth()->user());
    }

    public function create(){
        return response()->json(auth()->user());
    }

    public function store(){
        return response()->json(auth()->user());
    }

    public function edit(){
        return response()->json(auth()->user());
    }

    public function update(){
        return response()->json(auth()->user());
    }

}
