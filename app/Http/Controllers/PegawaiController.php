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
        $pegawai = Pegawai::findOrFail($id);
        return view('admin.pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string',
            'tlahir' => 'required',
            'tgllhr' => 'required|date',
            'jk' => 'required',
            'lokasi' => 'required',
            'telp' => 'required',
            'path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            // Ambil data pegawai
            $pegawai = DB::table('pegawais')->where('id', $id)->first();
            if (!$pegawai) {
                return response()->json(['success' => false, 'message' => 'Data tidak ditemukan.'], 404);
            }

            // Simpan path foto lama
            $fotoPath = $pegawai->path;

            // Jika ada file baru, upload dan hapus yang lama
            if ($request->hasFile('path')) {
                // Hapus foto lama jika ada
                if ($fotoPath && Storage::exists($fotoPath)) {
                    Storage::delete($fotoPath);
                }

                // Simpan foto baru di folder public/photo
                $file = $request->file('path');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('photo', $fileName, 'public'); // Simpan di storage/app/public/photo

                // Update path foto
                $fotoPath = 'storage/' . $filePath; // Simpan path dengan "storage/"
            }
            // Update data pegawai
            DB::table('pegawais')->where('id', $id)->update([
                'nama' => $request->input('nama'),
                'tlahir' => $request->input('tlahir'),
                'tgllhr' => $request->input('tgllhr'),
                'jk' => $request->input('jk'),
                'telp' => $request->input('telp'),
                'lokasi' => $request->input('lokasi'),
                'alamat' => $request->input('alamat'),
                'path' => $fotoPath, // Simpan nama file saja, tanpa path lengkap
            ]);

            return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
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
