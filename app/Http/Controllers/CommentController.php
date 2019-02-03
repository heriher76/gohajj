<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
	public function index() {
		return view('admin.comment.index');
	}

    public function store(Request $request) {
    	$input = $request->all();
    	dd($input);

    	
    }
}
