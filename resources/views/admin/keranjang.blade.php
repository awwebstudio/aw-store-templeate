<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Keranjang Aktif</title>
</head>

<body style="margin:0;background:#020617;color:white;font-family:Arial,sans-serif;">
<div style="padding:35px;">

<div style="
display:flex;
justify-content:flex-end;
margin-bottom:18px;
">

<a href="{{ route('dashboard') }}"
style="
padding:12px 22px;
border:2px solid #facc15;
border-radius:12px;
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
padding:35px 40px;
border-radius:24px;
margin-bottom:30px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 12px 35px rgba(0,0,0,.45);
">

<div>

<p style="
color:#facc15;
font-weight:bold;
letter-spacing:2px;
margin:0 0 10px;">
ADMIN PANEL
</p>

<h1 style="
font-size:44px;
margin:0;
color:white;">
🛒 Keranjang <span style="color:#facc15;">Aktif</span>
</h1>

<p style="
color:#cbd5e1;
margin-top:12px;
margin-bottom:0;">
Daftar pembeli yang masih memiliki produk di keranjang.
</p>

</div>

<img src="{{ asset('images/aw-logo.jpeg') }}"
style="
width:95px;
height:95px;
border-radius:50%;
object-fit:cover;
border:3px solid #facc15;
box-shadow:0 0 25px rgba(250,204,21,.6);
">

</section>
@php
$carts = \App\Models\Cart::with(['user','product'])->latest()->get();
@endphp

<table style="width:100%;border-collapse:collapse;background:#0f172a;border-radius:15px;overflow:hidden;margin-top:25px;">
<tr style="background:#1e293b;">
    <th style="padding:15px;">No</th>
    <th>Pembeli</th>
    <th>Produk</th>
    <th>Jumlah</th>
</tr>

@forelse($carts as $cart)
<tr style="text-align:center;border-top:1px solid #334155;">
    <td style="padding:15px;">{{ $loop->iteration }}</td>
    <td>{{ $cart->user->name ?? '-' }}</td>
    <td>{{ $cart->product->nama_produk ?? '-' }}</td>
    <td>{{ $cart->jumlah }}</td>
</tr>
@empty
<tr>
    <td colspan="4" style="padding:25px;text-align:center;color:#94a3b8;">
        Belum ada keranjang aktif.
    </td>
</tr>
@endforelse
</table>

</div>

</body>
</html>