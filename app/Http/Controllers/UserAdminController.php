<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserAdminController extends Controller
{
    public function index() {
        $users = User::all();

    	return view('admin.users.index', compact('users'));
    }

    public function create() {
    	return view('admin.users.create');
    }

    public function store(Request $request) {
    	$input = $request->all();
		
        Validator::make($input, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
        ]);

        Alert::success('Berhasil !', 'Admin Sudah Ditambahkan');	
    	
        return redirect('/admin/users');
    }

    public function destroy($id) {
        User::destroy($id);

        Alert::info('Dihapus !', 'Admin Berhasil Dihapus');    
        
        return back();
    }
}
