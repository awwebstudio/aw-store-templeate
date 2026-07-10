<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan AW Store</title>
</head>

<body style="margin:0;background:#020617;color:white;font-family:Arial,sans-serif;">

<div style="padding:35px;">

<!-- Dashboard + Logo -->
    <div style="
display:flex;
justify-content:flex-end;
margin-bottom:20px;
">

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


<div style="
display:flex;
justify-content:space-between;
align-items:center;
background:linear-gradient(135deg,#111827,#1d4ed8);
padding:35px;
border-radius:22px;
margin-bottom:35px;
box-shadow:0 10px 30px rgba(0,0,0,.35);
">

    <div>
        <p style="color:#facc15;font-size:13px;font-weight:bold;letter-spacing:3px;margin:0;">
            LAPORAN ADMIN
        </p>

        <h1 style="margin:10px 0;color:white;font-size:48px;">
            📑 Laporan <span style="color:#facc15;">AW Store</span>
        </h1>

        <p style="color:#e2e8f0;margin:0;">
            Lihat seluruh laporan penjualan, produk, pengiriman, dan pembayaran toko.
        </p>
    </div>

    <img src="{{ asset('images/aw-logo.jpeg') }}"
    style="
    width:90px;
    height:90px;
    border-radius:50%;
    object-fit:cover;
    border:4px solid #facc15;
    box-shadow:0 0 20px rgba(250,204,21,.6);
    ">

</div>

    
<div style="
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:20px;
margin-top:35px;
">

<!-- Laporan Penjualan -->
<div style="
background:linear-gradient(135deg,#111827,#1e293b);
padding:25px;
border-radius:18px;
border:1px solid #334155;
box-shadow:0 10px 25px rgba(0,0,0,.35);
">

<h1 style="font-size:45px;margin:0;">📄</h1>

<h3 style="color:#22c55e;margin:15px 0 10px;">
Laporan Penjualan
</h3>

<p style="color:#cbd5e1;">
Melihat seluruh laporan hasil penjualan produk AW Store.
</p>

<a href="{{ route('laporan.penjualan') }}"
style="
display:inline-block;
margin-top:18px;
background:#22c55e;
color:white;
padding:10px 18px;
border-radius:10px;
text-decoration:none;
font-weight:bold;">
Lihat Laporan →
</a>

</div>

<!-- Laporan Produk -->
<div style="
background:linear-gradient(135deg,#111827,#1e293b);
padding:25px;
border-radius:18px;
border:1px solid #334155;
box-shadow:0 10px 25px rgba(0,0,0,.35);
">

<h1 style="font-size:45px;margin:0;">📦</h1>

<h3 style="color:#38bdf8;margin:15px 0 10px;">
Laporan Produk
</h3>

<p style="color:#cbd5e1;">
Melihat data produk beserta stok dan harga produk.
</p>

<a href="{{ route('laporan.produk') }}"
style="
display:inline-block;
margin-top:18px;
background:#38bdf8;
color:white;
padding:10px 18px;
border-radius:10px;
text-decoration:none;
font-weight:bold;">
Lihat Laporan →
</a>

</div>

<!-- Laporan Pengiriman -->
<div style="
background:linear-gradient(135deg,#111827,#1e293b);
padding:25px;
border-radius:18px;
border:1px solid #334155;
box-shadow:0 10px 25px rgba(0,0,0,.35);
">

<h1 style="font-size:45px;margin:0;">🚚</h1>

<h3 style="color:#f59e0b;margin:15px 0 10px;">
Laporan Pengiriman
</h3>

<p style="color:#cbd5e1;">
Melihat seluruh status pengiriman pesanan pelanggan.
</p>

<a href="{{ route('laporan.pengiriman') }}"
style="
display:inline-block;
margin-top:18px;
background:#f59e0b;
color:white;
padding:10px 18px;
border-radius:10px;
text-decoration:none;
font-weight:bold;">
Lihat Laporan →
</a>

</div>

<!-- Laporan Pembayaran -->
<div style="
background:linear-gradient(135deg,#111827,#1e293b);
padding:25px;
border-radius:18px;
border:1px solid #334155;
box-shadow:0 10px 25px rgba(0,0,0,.35);
">

<h1 style="font-size:45px;margin:0;">💳</h1>

<h3 style="color:#a855f7;margin:15px 0 10px;">
Laporan Pembayaran
</h3>

<p style="color:#cbd5e1;">
Melihat seluruh riwayat pembayaran pelanggan.
</p>

<a href="{{ route('laporan.pembayaran') }}"
style="
display:inline-block;
margin-top:18px;
background:#a855f7;
color:white;
padding:10px 18px;
border-radius:10px;
text-decoration:none;
font-weight:bold;">
Lihat Laporan →
</a>

</div>

</div>

</body>
</html>