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
use App\Models\Agama;
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
    public function create() : View
    {
        //
        return view('admin.pengguna.create');
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
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
            'name' => $request['name'],
        ]);

        return redirect()->route('users.index')->with('success', 'User saved successfully');
    }

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

    public function showresetpassword($id) : View
    {
        $user = User::findOrFail($id);
        return view('admin.pengguna.resetpassword', compact('user'));
    }

    public function resetpassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('users.index')->with('success', 'Change Password Successfully');
    }


}
