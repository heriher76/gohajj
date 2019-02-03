<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    public function index() {
    	return view('admin.users.index');
    }

    public function create() {
    	return view('admin.users.create');
    }

    public function store(Request $request) {
    	$input = $request->all();
		dd($input);
    	
    	return view('admin.users.index');
    }
}
