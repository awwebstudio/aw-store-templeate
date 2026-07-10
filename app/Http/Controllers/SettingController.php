<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Halaman Pengaturan (lihat data)
    public function edit()
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = Setting::create([
                'nama_toko' => 'AW Store',
                'email_toko' => 'admin@awstore.com',
                'no_wa' => '08xxxxxxxxxx',
                'alamat' => 'Kupang, NTT',
                'deskripsi' => 'Toko gitar online terpercaya.',
            ]);
        }

        return view('admin.pengaturan', compact('setting'));
    }

    // Halaman Edit Pengaturan
    public function editForm()
    {
        $setting = Setting::first();

        return view('admin.edit-pengaturan', compact('setting'));
    }

    // Simpan perubahan
    public function update(Request $request)
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting();
        }

        $setting->update([
            'nama_toko'   => $request->nama_toko,
            'email_toko'  => $request->email_toko,
            'no_wa'       => $request->no_wa,
            'alamat'      => $request->alamat,
            'deskripsi'   => $request->deskripsi,
        ]);

        return redirect()->route('admin.pengaturan')
            ->with('success', 'Pengaturan toko berhasil disimpan.');
    }
}