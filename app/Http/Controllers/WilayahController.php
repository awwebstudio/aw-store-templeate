<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WilayahController extends Controller
{
    public function provinces()
    {
        return DB::table('wilayah')
    ->whereRaw('CHAR_LENGTH(kode) = 2')
    ->orderBy('nama')
    ->get();
    }

    public function regencies($kode)
{
    return DB::table('wilayah')
        ->where('kode', 'like', $kode . '.%')
        ->whereRaw('CHAR_LENGTH(kode) = 5')
        ->orderBy('nama')
        ->get();
}
public function districts($kode)
{
    return DB::table('wilayah')
        ->where('kode', 'like', $kode . '.%')
        ->whereRaw('CHAR_LENGTH(kode) = 8')
        ->orderBy('nama')
        ->get();
}
public function villages($kode)
{
    return DB::table('wilayah')
        ->where('kode', 'like', $kode . '.%')
        ->whereRaw('CHAR_LENGTH(kode) = 13')
        ->orderBy('nama')
        ->get();
}

}
