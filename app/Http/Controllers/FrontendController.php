<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;

class FrontendController extends Controller
{
    public function index()
    {
        // $tamu = Tamu::where('tanggal', date('Y-m-d'))->get();
        return view('index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            // $kabkotaId = $request->input('kabkota_id');

            $data = Tamu::where('tanggal', date('Y-m-d'))->get();
            
            return DataTables::of($data)
              ->make(true);
        }
    }

    public function tamu()
    {
        return view('tamu');
    }
}
