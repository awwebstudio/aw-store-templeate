<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    // Halaman Kelola Pengiriman
    public function index()
    {
        $orders = Order::latest()->get();

        return view('orders.kelola-pengiriman', compact('orders'));
    }

    // Kirim Barang
    public function kirim(Request $request, Order $order)
{
    $request->validate([
        'status_pengiriman' => 'required',
        'jasa_pengiriman' => 'required',
        'nomor_resi' => 'required',
        'estimasi_tiba' => 'required',
    ]);

    $statusPembayaran = $order->status;

    if ($order->metode == 'COD' && $request->status_pengiriman == 'Selesai') {
        $statusPembayaran = 'Berhasil Dibayar';
    }

    $order->update([
        'status_pengiriman' => $request->status_pengiriman,
        'jasa_pengiriman' => $request->jasa_pengiriman,
        'nomor_resi' => $request->nomor_resi,
        'estimasi_tiba' => $request->estimasi_tiba,
        'status' => $statusPembayaran,
    ]);

    return redirect()->route('pengiriman.index')
        ->with('success', 'Data pengiriman berhasil disimpan.');
}

public function invoice()
{
    $orders = \App\Models\Order::latest()->get();

    return view('admin.invoice', compact('orders'));
}

}