<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan Pembayaran</title>
</head>

<body style="margin:0;background:#020617;color:white;font-family:Arial,sans-serif;">

<div style="padding:35px;">

<a href="{{ route('admin.laporan') }}"
style="
display:inline-block;
padding:12px 20px;
border:2px solid #facc15;
border-radius:10px;
color:white;
text-decoration:none;
font-weight:bold;
margin-bottom:25px;">
← Kembali
</a>

<p style="color:#facc15;font-weight:bold;letter-spacing:2px;">
LAPORAN PEMBAYARAN
</p>

<h1 style="margin:10px 0 25px;">
💳 Laporan Pembayaran
</h1>

@php
$orders = \App\Models\Order::latest()->get();
@endphp

<table style="
width:100%;
border-collapse:collapse;
background:#111827;
border-radius:15px;
overflow:hidden;">

<tr style="background:#1e293b;">

<th style="padding:14px;">Tanggal</th>
<th>Pembeli</th>
<th>Produk</th>
<th>Metode</th>
<th>Total</th>
<th>Status</th>

</tr>

@foreach($orders as $order)

<tr style="border-bottom:1px solid #334155;">

<td style="padding:12px;text-align:center;">
{{ $order->created_at->format('d/m/Y') }}
</td>

<td style="text-align:center;">
{{ $order->user->name ?? '-' }}
</td>

<td style="text-align:center;color:#facc15;font-weight:bold;">
{{ $order->nama_produk }}
</td>

<td style="text-align:center;">
{{ $order->metode ?? '-' }}
</td>

<td style="text-align:center;">
Rp {{ number_format($order->total,0,',','.') }}
</td>

<td style="
text-align:center;
font-weight:bold;
color:
{{ $order->status == 'Berhasil Dibayar'
? '#22c55e'
: '#f59e0b' }};
">
{{ $order->status }}
</td>

</tr>

@endforeach

</table>

</div>

</body>
</html>