<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pesanan Belum Diproses</title>
</head>

<body style="margin:0;background:#020617;color:white;font-family:Arial,sans-serif;">

<div style="padding:35px;">

<div style="display:flex;justify-content:flex-end;margin-bottom:20px;">
    <a href="{{ route('dashboard') }}"
    style="
    padding:12px 20px;
    border:2px solid #facc15;
    border-radius:10px;
    color:white;
    text-decoration:none;
    font-weight:bold;
    transition:.3s;
    "
    onmouseover="this.style.background='#facc15';this.style.color='#020617';"
    onmouseout="this.style.background='transparent';this.style.color='white';">
        ← Dashboard
    </a>
</div>

<section style="
background:linear-gradient(135deg,#111827,#1e3a8a);
padding:35px;
border-radius:22px;
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:30px;">

<div>
<p style="color:#facc15;font-weight:bold;letter-spacing:2px;">
ADMIN PANEL
</p>

<h1 style="margin:10px 0;font-size:42px;">
📦 Pesanan Belum Diproses
</h1>

<p style="color:#cbd5e1;">
Daftar pesanan yang masih menunggu diproses admin.
</p>
</div>

<img src="{{ asset('images/aw-logo.jpeg') }}"
style="
width:90px;
height:90px;
border-radius:50%;
border:3px solid #facc15;">
</section>

<table style="
width:100%;
border-collapse:collapse;
background:#0f172a;
overflow:hidden;
border-radius:15px;">

<thead style="background:#1e293b;">
<tr>
<th style="padding:15px;">No</th>
<th>Nama</th>
<th>Produk</th>
<th>Total</th>
<th>Pembayaran</th>
<th>Status</th>
<th>Tanggal</th>
</tr>
</thead>

<tbody>

@php
$orders = \App\Models\Order::whereNull('status_pengiriman')
    ->orWhere('status_pengiriman', 'Belum Diproses')
    ->latest()
    ->get();
@endphp

@foreach($orders as $order)

<tr style="text-align:center;border-top:1px solid #334155;">

<td style="padding:15px;">
{{ $loop->iteration }}
</td>

<td>
{{ $order->user->name ?? '-' }}
</td>

<td>
{{ $order->nama_produk }}
</td>

<td>
Rp {{ number_format($order->total,0,',','.') }}
</td>

<td>
{{ $order->metode }}
</td>

<td style="color:#f97316;font-weight:bold;">
{{ $order->status }}
</td>

<td>
{{ $order->created_at->format('d-m-Y') }}
</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</body>
</html>