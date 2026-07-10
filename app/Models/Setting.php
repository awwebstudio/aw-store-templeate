<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'nama_toko',
        'email_toko',
        'no_wa',
        'alamat',
        'deskripsi',
    ];
}