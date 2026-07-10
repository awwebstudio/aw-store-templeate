<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan Pengiriman</title>
</head>

<body style="margin:0;background:#020617;color:white;font-family:Arial,sans-serif;">

<div style="padding:35px;">

<a href="{{ route('admin.laporan') }}"
style="display:inline-block;padding:12px 20px;border:2px solid #facc15;border-radius:10px;color:white;text-decoration:none;font-weight:bold;margin-bottom:25px;">
← Kembali
</a>

<p style="color:#facc15;font-weight:bold;letter-spacing:2px;">
LAPORAN PENGIRIMAN
</p>

<h1 style="margin:10px 0 25px;">
🚚 Laporan Pengiriman
</h1>

@php
$orders = \App\Models\Order::latest()->get();
@endphp

<table style="width:100%;border-collapse:collapse;background:#111827;border-radius:15px;overflow:hidden;">

<tr style="background:#1e293b;">
<th style="padding:14px;">Tanggal</th>
<th>Produk</th>
<th>Pembeli</th>
<th>Status Pengiriman</th>
<th>Jasa</th>
<th>No. Resi</th>
<th>Estimasi</th>
</tr>

@foreach($orders as $order)

<tr style="border-bottom:1px solid #334155;">

<td style="padding:12px;text-align:center;">
{{ $order->created_at->format('d/m/Y') }}
</td>

<td style="text-align:center;color:#facc15;font-weight:bold;">
{{ $order->nama_produk }}
</td>

<td style="text-align:center;">
{{ $order->user->name ?? '-' }}
</td>

<td style="text-align:center;color:#38bdf8;font-weight:bold;">
{{ $order->status_pengiriman ?? 'Belum Diproses' }}
</td>

<td style="text-align:center;">
{{ $order->jasa_pengiriman ?? '-' }}
</td>

<td style="text-align:center;">
{{ $order->nomor_resi ?? '-' }}
</td>

<td style="text-align:center;">
{{ $order->estimasi_tiba ?? '-' }}
</td>

</tr>

@endforeach

</table>

</div>

</body>
</html>