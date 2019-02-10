<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Comment;

class CommentController extends Controller
{
	public function index() {
		$comments = Comment::all();

		return view('admin.comment.index', compact('comments'));
	}

    public function sendComment(Request $request) {
    	$input = $request->all();

    	Comment::create([
    		'name' => $input['name'],
    		'email' => $input['email'],
    		'subject' => $input['subject'],
    		'message' => $input['message']
    	]);

        Alert::success('Terkirim !', 'Komentar Terkirim');	

    	return back();
    }
}
