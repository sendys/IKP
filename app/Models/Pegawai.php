<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'pegawai_id');
    }
}
