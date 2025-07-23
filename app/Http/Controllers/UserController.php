<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Pegawai;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View
    {
        // Get the current page number from the request, default is 1
        $page = $request->input('page', 1);

        // Number of records per page
        $perPage = 5;

        // Calculate the offset
        $offset = ($page - 1) * $perPage;

        // Get the search query from the request
        $search = $request->input('search', '');

        // Fetch users with a specific role, apply limit and offset for pagination
        $users = DB::table('users')
                ->select('users.id', 'users.name','users.email','users.role')
                ->where('users.name', 'like', '%' . $search . '%')
                ->skip($offset)  // Apply offset
                ->take($perPage) // Apply limit  // Add where condition here
                ->get();

        // Get total number of records for pagination
        $total = DB::table('users')->count();

        $pagination = [
                    'total' => $total,
                    'per_page' => $perPage,
                    'current_page' => $page,
                    'last_page' => ceil($total / $perPage),
                    ];

        // Pass the users and pagination data to the view
        return view('admin.pengguna.index', compact('users', 'pagination','search', 'perPage','page','perPage','total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pegawai $pegawai) : View
    {
        //
        return view('admin.pengguna.create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasidata = $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|email|unique:users,email',
                ], [
                    'name.required' => 'Nama wajib diisi!',
                    'role' => 'Nama wajib diisi!',
                    'email.required' => 'Email wajib diisi!',
                    'email.email' => 'Format email tidak valid!',
                ]);

        // Cek apakah user sudah ada berdasarkan email
        $userExists = User::where('name', $request->input('name'))->exists();

        if ($userExists) {
            toast()->error('Nama user sudah ada.');
            return back()->withErrors(['name' => 'Nama user sudah ada.']);
        }

        $users = User::create([
            'pegawai_id' => $request['pegawai_id'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
            'name' => $request['name'],
            'is_active' => false, // User baru diblokir secara default
        ]);

        return redirect()->route('pegawai.index')->with('success', 'User saved successfully');
    }

    /* public function store(Request $request)
    {
        try {
            // Validasi input
            $validasidata = $request->validate([
                'name' => 'required|string',
                'role' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
            ], [
                'name.required' => 'Nama wajib diisi!',
                'role.required' => 'Role wajib diisi!',
                'email.required' => 'Email wajib diisi!',
                'email.email' => 'Format email tidak valid!',
                'password.required' => 'Password wajib diisi!',
                'password.min' => 'Password minimal 6 karakter!',
            ]);

            // Cek apakah user sudah ada berdasarkan nama
            $userExists = User::where('name', $request->input('name'))->exists();

            if ($userExists) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Nama user sudah ada.',
                ], 400);
            }

            // Buat user baru
            $user = User::create([
                'pegawai_id' => $request->pegawai_id,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            dd($user);

            return response()->json([
                'status' => 'success',
                'message' => 'User berhasil dibuat.',
                'data' => $user
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    } */


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) : View
    {
        $user = User::findOrFail($id);
        return view('admin.pengguna.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Validate the request
        $request->validate([
            'name' => 'string|unique:users,name,' . $user->id,
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required',
            // Add other fields as needed
        ]);
        //dd($user);
        // Update only specific fields
        $user->update([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'role' => $request->input('role'),
            // Add other fields as needed
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();

    }

    public function showresetpassword(Pegawai $pegawai) : View
    {
        /* $user = User::findOrFail($id); */
        return view('admin.pengguna.resetpassword', compact('pegawai'));
    }

    public function resetpassword(Request $request, $pegawai_id)
    {
        $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cari user berdasarkan pegawai_id
        $user = User::where('pegawai_id', $pegawai_id)->firstOrFail();

        // Update password user
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('pegawai.index')->with('success', 'Password berhasil direset');
    }

    /**
     * Aktivasi atau deaktivasi user
     */
    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = !$user->is_active;
        $user->save();

        $status = $user->is_active ? 'diaktivasi' : 'dinonaktifkan';

        return redirect()->back()->with('success', "User berhasil {$status}");
    }

    /**
     * Aktivasi user
     */
    public function activate($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = true;
        $user->save();

        return redirect()->back()->with('success', 'User berhasil diaktivasi');
    }

    /**
     * Deaktivasi user
     */
    public function deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = false;
        $user->save();

        return redirect()->back()->with('success', 'User berhasil dinonaktifkan');
    }

}
