<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [

        
    'nama_produk',
    'jumlah',
    'harga',
    'total',
    'metode',
    'bank_ewallet',
    'status',

    'nama_penerima',
    'no_hp',
    'alamat',
    'kota',

    'provinsi',
    'kabupaten',
    'kecamatan',
    'desa',
    'alamat_lengkap',

    'status_pengiriman',
    'nomor_resi',
    'jasa_pengiriman',
    'estimasi_tiba',
    'user_id',

    ];
    
     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
