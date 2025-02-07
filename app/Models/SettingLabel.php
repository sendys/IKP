<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SettingLabel extends Model
{
    use HasFactory;

    protected $fillable = [
        'namalabel',
    ];

}
