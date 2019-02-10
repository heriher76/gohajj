<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jamaah;
use App\KecamatanDesa;
use Excel;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class JamaahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kecamatan_list = KecamatanDesa::orderBy('kecamatan', 'ASC')->get()->groupBy('kecamatan');

        if ($request->get('sortir') == 'desa') {
            $jamaahJamaah = Jamaah::where('kecamatan', $request->get('kecamatan'))->where('desa', $request->get('desa'))->orderBy('nama', 'ASC')->get();
        }else if ($request->get('sortir') == 'kecamatan') {
            $jamaahJamaah = Jamaah::where('kecamatan', $request->get('kecamatan'))->orderBy('nama', 'ASC')->get();
        }else {
            $jamaahJamaah = Jamaah::orderBy('nama', 'ASC')->get();
        }

        return view('admin.jamaah.index', compact('kecamatan_list', 'jamaahJamaah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jamaah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Jamaah::create($input);

        Alert::success('Jamaah','Berhasil Ditambahkan !');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jamaah::destroy($id);

        Alert::info('Jamaah','Berhasil Dihapus !');
        return back();        
    }

    public function import(Request $request)
    {
        $input = $request->all();

        if($request->hasFile('jamaah')){
            Excel::selectSheetsByIndex(0)->load($request->file('jamaah')->getRealPath(), function ($reader) use($input) {

                config(['excel.import.startRow' => 1 ]);

                foreach ($reader->toArray() as $key => $row) {     
                    $jamaah = Jamaah::where('no_paspor', $row['no._paspor'])->first();

                    if(count($jamaah) == 0) {
                        $data['nama'] = $row['nama'];
                        $data['tempat_tanggal_lahir'] = $row['tempat_tanggal_lahir'];
                        $data['tanggal_lahir'] = $row['tanggal_lahir'];
                        $data['alamat'] = $row['alamat'];
                        $data['telephone'] = $row['telephone'];
                        $data['kecamatan'] = $row['kecamatan'];
                        $data['desa'] = $row['desa'];
                        $data['kloter'] = $row['kloter'];
                        $data['no_paspor'] = $row['no._paspor'];
                        $data['tahun'] = $input['tahun'];

                        Jamaah::insert($data);
                    }

                    $kecamatanDesa = KecamatanDesa::where('kecamatan', $row['kecamatan'])->where('desa', $row['desa'])->first();
                    
                    if(count($kecamatanDesa) == 0) {
                        KecamatanDesa::create([
                            'kecamatan' => $row['kecamatan'],
                            'desa' => $row['desa']
                        ]);
                    }
                }
            });
            Alert::success('Jamaah','Berhasil Ditambahkan !');
            return back();
        }else{
            Alert::warning('Jamaah','Belum Ditambahkan !');
            return back();
        }
    }

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = KecamatanDesa::get()->where($select, $value)->groupBy($dependent);

        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach ($data as $row) {
            $output .= '<option value="'.$row[0]->$dependent.'">'.$row[0]->$dependent.'</option>';
        }
        echo $output;
    }
}
