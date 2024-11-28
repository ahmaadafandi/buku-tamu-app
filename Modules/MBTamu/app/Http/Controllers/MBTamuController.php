<?php

namespace Modules\MBTamu\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use App\Models\Tamu;
use Illuminate\Container\Attributes\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class MBTamuController extends Controller
{
    public function json(Request $request) {
        if ($request->ajax()) {
            // $kabkotaId = $request->input('kabkota_id');

            $data = Tamu::latest();
            
            return DataTables::of($data)
              ->addColumn('action', function(Tamu $tamu){
                //   $actionBtn = '<a href="javascript:;" data-id="'.$tamu->id.'" class="badge badge-primary mb-1 edit"> <i class="fa fa-pencil-square" aria-hidden="true"></i> edit</a>
                //   <a href="javascript:;" data-id="'.$tamu->id.'" class="badge badge-danger hapus"><i class="fa fa-minus-circle" aria-hidden="true"></i> hapus</a>';
 
                  $actionBtn = '<a class="btn btn-sm btn-icon text-info edit" data-bs-toggle="tooltip" title="Edit User" href="javascript:;" data-id="'.$tamu->id.'"> 
                                    <span class="btn-inner">
                                        <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </a>
                                <a class="btn btn-sm btn-icon text-danger hapus" data-bs-toggle="tooltip" title="Delete User" href="javascript:;" data-id="'.$tamu->id.'">
                                    <span class="btn-inner">
                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                            <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </a> 
                                ';
                  return $actionBtn;
              })
              ->rawColumns(['action'])
              ->make(true);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mbtamu::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mbtamu::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi data
            $validatedData = $request->validate([
                'bidang' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'no_hp' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'Instansi_asal' => 'required|string|max:255',
                'tujuan' => 'required|string|max:255',
            ]);
            
            // Tambahkan data tambahan
            $validatedData['posisi_id'] = 1;
            $validatedData['tanggal'] = date('Y-m-d');
            $validatedData['status'] = 1;

            // Simpan ke database
            $daftar_tamu = Tamu::create($validatedData);

            // Berikan respons sukses
            return response()->json([
                'status' => true,
                'pesan' => "Data berhasil disimpan",
                'data' => $daftar_tamu, // Opsional, jika ingin mengembalikan data yang disimpan
            ]);

        } catch (ValidationException $e) {
            // Tangkap error validasi
            return response()->json([
                'status' => false,
                'pesan' => $e->validator->errors()->first(),
            ]);
        } catch (\Exception $e) {
            // Tangkap error lain
            return response()->json([
                'status' => false,
                'pesan' => 'Terjadi kesalahan saat menyimpan data.',
                'error' => $e->getMessage(), // Opsional, untuk debugging
            ]);
        }
    }


    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('mbtamu::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return response()->json([
            'data' => Tamu::findOrFail($id)
        ]);
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
        $delete = Tamu::find($id)->delete($id);

        if($delete){
            return response()->json([
                'status' => true,
                'pesan' => "Data berhasil dihapus"
            ]);
        }else{
            return response()->json([
                'status' => false,
                'pesan' => "Data gagal dihapus"
            ]);
        }
    }

    public function update_tamu(Request $request)
    {
        $validatedData = $request->validate([
            'bidang' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'instansi_asal' => 'required',
            'tujuan' => 'required'
        ]);

        $update = Tamu::where('id', $request->tamu_id)->update($validatedData);

        if($update){
            return response()->json([
                'status' => true,
                'pesan' => 'Data has been Update!'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'pesan' => 'Proccess failed!'
            ]);
        }
    }
}
