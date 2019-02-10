<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jamaah;
use App\KecamatanDesa;

class PagesController extends Controller
{
    public function home()
    {
    	$kecamatan_list = KecamatanDesa::all()->groupBy('kecamatan');

        return view('pages.home', compact('kecamatan_list'));
    }

    public function jamaah(Request $request) 
    {
    	$kecamatan_list = KecamatanDesa::orderBy('kecamatan', 'ASC')->get()->groupBy('kecamatan');

        if ($request->get('sortir') == 'desa') {
            $jamaahJamaah = Jamaah::where('kecamatan', $request->get('kecamatan'))->where('desa', $request->get('desa'))->orderBy('nama', 'ASC')->get();
        }else if ($request->get('sortir') == 'kecamatan') {
            $jamaahJamaah = Jamaah::where('kecamatan', $request->get('kecamatan'))->orderBy('nama', 'ASC')->get();
        }else {
            $jamaahJamaah = Jamaah::orderBy('nama', 'ASC')->get();
        }

        return view('pages.jamaah', compact('jamaahJamaah', 'kecamatan_list'));
    }
}
