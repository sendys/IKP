<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RatingComponent extends Component
{

    public $ratings;

    public function updated($rating)
    {
        if ($rating === 'ratings') {
            // Logika setelah rating diperbarui
            session()->flash('message', 'Rating berhasil disimpan: ' . $this->ratings);

            $simpandata = new Penilaian();
            $simpandata->user_id = Auth::id();
            $simpandata->rating = $ratings;
            $simpandata->save();
        }
        session()->flash('message', 'Rating berhasil disimpan: ' . $value);

    }
    public function render()
    {
        return view('livewire.rating-component')->layout('layouts.user');
    }
}
