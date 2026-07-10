<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan Produk</title>
</head>

<body style="margin:0;background:#020617;color:white;font-family:Arial,sans-serif;">

<div style="padding:35px;">

<a href="{{ route('admin.laporan') }}"
style="display:inline-block;padding:12px 20px;border:2px solid #facc15;border-radius:10px;color:white;text-decoration:none;font-weight:bold;margin-bottom:25px;">
← Kembali
</a>

<p style="color:#facc15;font-weight:bold;letter-spacing:2px;">
LAPORAN PRODUK
</p>

<h1 style="margin:10px 0 25px;">
📦 Laporan Produk
</h1>

@php
$products = \App\Models\Product::latest()->get();
@endphp

<table style="width:100%;border-collapse:collapse;background:#111827;border-radius:15px;overflow:hidden;">

<tr style="background:#1e293b;">
<th style="padding:14px;">Gambar</th>
<th>Nama Produk</th>
<th>Harga</th>
<th>Stok</th>
<th>Deskripsi</th>
</tr>

@foreach($products as $product)

<tr style="border-bottom:1px solid #334155;">

<td style="padding:12px;text-align:center;">
@if($product->gambar)
<img src="{{ asset('images/'.$product->gambar) }}"
style="width:70px;height:70px;object-fit:contain;background:#020617;border-radius:10px;">
@else
-
@endif
</td>

<td style="text-align:center;color:#facc15;font-weight:bold;">
{{ $product->nama_produk }}
</td>

<td style="text-align:center;">
Rp {{ number_format($product->harga,0,',','.') }}
</td>

<td style="text-align:center;">
{{ $product->stok }}
</td>

<td style="text-align:center;color:#cbd5e1;">
{{ Str::limit($product->deskripsi, 60) }}
</td>

</tr>

@endforeach

</table>

</div>

</body>
</html>