<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jamaah;
use App\KecamatanDesa;

class AdminController extends Controller
{
    public function index() {
    	$kecamatan_list = KecamatanDesa::all()->groupBy('kecamatan');
    	$jamaah_list = Jamaah::all()->groupBy('tahun');

    	return view('admin.index', compact('kecamatan_list', 'jamaah_list'));
    }
}
