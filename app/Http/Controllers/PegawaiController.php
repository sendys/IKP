<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Psr\Http\Message\ResponseInterface;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = $request->input('perPage', 10);
        $search = $request->input('search', '');

        // If the search is empty, return the default results
        if (empty($search)) {
            $query = DB::table('pegawais')
                ->select('pegawais.id','pegawais.nama','pegawais.ktp','pegawais.tlahir','pegawais.tgllhr','pegawais.jk',
                'pegawais.telp','pegawais.lokasi','pegawais.alamat','pegawais.path')
                        ->whereNull('pegawais.deleted_at');
        } else {
            $query = DB::table('pegawais')
            ->select('pegawais.id','pegawais.nama','pegawais.ktp','pegawais.tlahir','pegawais.tgllhr','pegawais.jk',
            'pegawais.telp','pegawais.lokasi','pegawais.alamat','pegawais.path')
                    ->whereNull('pegawais.deleted_at')
                    ->where(function ($q) use ($search) {
                        $q->where('pegawais.telp', '=', $search)
                        ->orWhere('pegawais.nama', 'like', '%' . $search . '%');
            });
        }

        $total = $query->count();
        $pegawai = $query
            ->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->orderByDesc('pegawais.id')
            ->get();

        $pagination = [
            'total' => $total,
            'per_page' => $perPage,
            'current_page' => $page,
            'last_page' => ceil($total / $perPage),
        ];

        // Handle AJAX request
        if ($request->ajax()) {
            return response()->json($pegawai);
           /*  return view('pegawai.index', compact('pegawai'))->render(); */
        }

        // Return the full page view for normal requests
        /* return response()->json([$pegawai,$pagination,$search, $perPage,$page,$total]); */
        return view('admin.pegawai.index', compact('pegawai', 'pagination', 'search', 'perPage', 'page', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required|string',
        'tlahir' => 'required',
        'tgllhr' => 'required|date',
        'jk' => 'required',
        'lokasi' => 'required',
        'telp' => 'required',
        'path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi foto
        ], [
            'nama.required' => 'Nama karyawan wajib diisi.',
            'tlahir.required' => 'Tempat lahir wajib diisi.',
            'tgllhr.required' => 'Tanggal lahir wajib diisi.',
            'jk.required' => 'Jenis kelamin wajib diisi.',
            'lokasi.required' => 'Lokasi kerja wajib diisi.',
            'telp.required' => 'No.Telp wajib diisi.',
            'path.image' => 'File harus berupa gambar.',
            'path.mimes' => 'Format foto harus jpg, jpeg, atau png.',
            'path.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        // Default foto kosong
        $fotoPath = null;

        if ($request->hasFile('path')) {
            $fotoPath = $request->file('path')->store('public/photo'); // Simpan di storage
            $fotoPath = str_replace('public/', 'storage/', $fotoPath); // Ubah path agar bisa diakses
        }

        $data =[
            'ktp' => $request->input('ktp'),
            'nama' => $request->input('nama'),
            'tlahir' => $request->input('tlahir'),
            'tgllhr' => $request->input('tgllhr'),
            'jk' => $request->input('jk'),
            'telp' => $request->input('telp'),
            'lokasi' => $request->input('lokasi'),
            'alamat' => $request->input('alamat'),
            'path' => $fotoPath, // Simpan path foto ke database
        ];

        try {

            DB::table('pegawais')->insert($data);
            return response()->json(['success' => true, 'message' => 'Data saved successfully!']);

        } catch (\Exception $e) {
            //dd($data);
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) : View
    {
        $pegawais = Pegawai::findOrFail($id);
        return view('admin.pegawai.edit', compact('pegawais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) : RedirectResponse
    {
        //dd($request->all());

         // Find the user by ID
        $pegawais = Pegawai::findOrFail($id);

        $request->validate([
            'nik' => 'required|integer|min:16|unique:pegawais,nik,' . $pegawais->id,
            'kode_maping_bpjs' =>'required',
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'kelamin' => 'required',
            'agama' => 'required|string',
            'telp' => 'required|string',
            'nomorsip' => 'required|string',
            'pendidikan' => 'required|string',
            'status_kawin' => 'required|string',
            'alamat' => 'required|string',
        ]);

         // Update only specific fields
        $pegawais->update([
            'nik' => $request->input('nik'),
            'nip' => $request->input('nip'),
            'kode_maping_bpjs' => $request->input('kode_maping_bpjs'),
            'nama' => $request->input('nama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'kelamin' => $request->input('kelamin'),
            'agama' =>$request->input('agama'),
            'telp' => $request->input('telp'),
            'nomorsip' => $request->input('nomorsip'),
            'pendidikan' => $request->input('pendidikan'),
            'status_kawin' => $request->input('status_kawin'),
            'alamat' => $request->input('alamat'),
        ]);

        Alert::success('Success', 'Saved Successfully');
        return redirect()->route('admin.pegawai.index')->with('success', 'Pegawai updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $pegawai = Pegawai::findOrFail($id);
            $pegawai->delete();

            return response()->json([
                'success' => true,
                'message' => 'Pegawai berhasil dihapus!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data.'
            ], 500);
        }
    }

    public function pegawaideleted($id)
    {
        try {

            DB::table('pegawais')->where('id', $id)->update(['deleted_at' => Carbon::now()]);

            // Tampilkan pesan sukses
            Alert::success('Success', 'Deleted Successfully');
            return redirect()->route('pegawai.index')->with('success', 'Pegawai deleted successfully');

        } catch (\Exception $e) {
            // Tampilkan pesan error jika gagal
            Alert::error('Error', 'Failed to Delete');
            return redirect()->route('pegawai.index')->with('error', 'Failed to delete pegawai');
        }
    }

}
