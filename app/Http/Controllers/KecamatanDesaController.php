<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KecamatanDesaController extends Controller
{
    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = KecamatanDesa::get()->where($select, $value)->groupBy($dependent);

        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach ($data as $row) {
            $output .= '<option value="'.$row->$dependent.'">'.$row->dependent.'</option>';
        }
        echo $output;
    }
}
