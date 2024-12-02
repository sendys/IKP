@extends('layouts.user')
@section('title', 'User Dashboard')

@section('content')
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #ffffff69;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif, sans-serif;
    }

    .container {
        text-align: center;

    }

    .logo img {
        cursor: pointer;
        max-width: 100px;
        height: auto;
        margin-bottom: 20px;
    }

    .rating-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 50px;
        margin-top: 20px;
    }

    .rating {
        text-align: center;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .rating img {
        width: 80px;
        height: 80px;
    }

    .rating:hover {
        transform: scale(1.2);
    }

    h1 {
        margin-bottom: 20px;
        color: #333;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <!-- Logo Perusahaan -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <div class="logo" onclick="document.getElementById('logout-form').submit();">
            <img src="{{ asset('image/logo.png') }}" alt="Logo Perusahaan">
        </div>

        <!-- Judul -->
        <h1>Bagaimana Pelayanan Kami. {{ $rating ?? 'Belum dipilih' }}</h1>

        <!-- Pilihan Kepuasan -->
        <div class="rating-container">
            <div wire:click="setRating(1)" class="rating" style="cursor: pointer;">
                <img src="{{ asset('image/happy.png') }}" alt="Sangat Puas">
                <p>Sangat Puas</p>
            </div>
            <div wire:click="setRating(2)" class="rating" style="cursor: pointer;">
                <img src="{{ asset('image/smile.png') }}" alt="Puas">
                <p>Puas</p>
            </div>
            <div wire:click="setRating(3)" class="rating" style="cursor: pointer;">
                <img src="{{ asset('image/smile_1.png') }}" alt="Tidak Puas">
                <p>Tidak Puas</p>
            </div>

        </div>
    </div>
</div>
@endsection

