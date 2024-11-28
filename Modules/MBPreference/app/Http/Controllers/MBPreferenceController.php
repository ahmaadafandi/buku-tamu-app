<?php

namespace Modules\MBPreference\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Preference;
use Illuminate\Http\Request;

class MBPreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mbpreference::index', ['preference' => Preference::findOrFail(1)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mbpreference::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('mbpreference::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('mbpreference::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function update_bg(Request $request)
    {
        $validatedData = $request->validate([
            'background_s1' => 'required',
            'background_s2' => 'required',
            'background_s3' => 'required',
            'background_s4' => 'required'
        ]);

        $update = Preference::where('id', 1)->update($validatedData);
        if($update){
            return response()->json([
                'status' => true,
                'pesan' => 'Data berhasil diubah!'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'pesan' => 'Proses gagal!'
            ]);
        }
    }

    public function update_main(Request $request)
    {
        $validatedData = $request->validate([
            'logo' => 'required',
            'nama_aplikasi' => 'required',
            'vidio' => 'required'
        ]);

        $update = Preference::where('id', 1)->update($validatedData);
        if($update){
            return response()->json([
                'status' => true,
                'pesan' => 'Data berhasil diubah!'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'pesan' => 'Proses gagal!'
            ]);
        }
    }
}
