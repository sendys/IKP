<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'pegawais';
    protected $fillable = [
        'nama',
        'ktp',
        'tlahir',
        'tgllhr',
        'jk',
        'telp',
        'lokasi',
        'alamat',
    ];

    protected $dates = ['deleted_at'];
}
