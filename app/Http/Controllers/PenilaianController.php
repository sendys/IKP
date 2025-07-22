<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\SettingLabel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:3',
        ]);

        // Simpan data ke database
        Penilaian::create([
            'rating' => $validated['rating'],
        ]);

        // Kembalikan respons JSON
        return response()->json([
            'message' => 'Terima kasih atas penilaian Anda!',
        ]);
    }
}
