<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Rating extends Component
{

    public $rating; // Properti untuk menyimpan rating yang dipilih

    // Atur rating ketika pengguna memilih nilai
    public function setRating($value)
    {
        $this->rating = $value;
    }

    // Simpan rating ke database
    public function saveRating()
    {
        // Validasi input
        if (!$this->rating) {
            session()->flash('error', 'Harap pilih rating terlebih dahulu!');
            return;
        }

        // Simpan ke database
        Penilaian::create([
            'user_id' => Auth::id(), // Mengambil ID pengguna yang sedang login
            'rating' => $this->rating,
        ]);

        // Flash pesan sukses
        session()->flash('message', 'Rating berhasil disimpan!');

        // Reset nilai rating
        $this->rating = null;
    }

    public function render()
    {

        return view('livewire.rating', [
            'rating' => $this->rating, // Kirim rating ke view
        ])->layout('layouts.user');
    }
}
