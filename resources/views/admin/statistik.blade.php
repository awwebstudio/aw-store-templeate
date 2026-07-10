<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Statistik AW Store</title>
</head>

<body style="margin:0;background:#020617;color:white;font-family:Arial,sans-serif;">

<div style="
padding:35px;
padding-top:20px;
">

<div style="
display:flex;
justify-content:flex-end;
margin-top:40px;
margin-right:35px;
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

    <section style="
background:linear-gradient(135deg,#111827,#1e3a8a);
padding:40px;
border-radius:24px;
margin-bottom:35px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 12px 35px rgba(0,0,0,.45);
">

    <div>
        <p style="color:#facc15;font-weight:bold;letter-spacing:2px;margin:0 0 10px;">
            STATISTIK DETAIL
        </p>

        <h1 style="font-size:44px;margin:0;color:white;">
            📊 Statistik <span style="color:#facc15;">Penjualan</span>
        </h1>

        <p style="color:#cbd5e1;margin-top:12px;">
            Analisis pesanan, pembayaran, dan aktivitas toko AW Store.
        </p>
    </div>

    <img src="{{ asset('images/aw-logo.jpeg') }}"
    style="
    width:100px;
    height:100px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid #facc15;
    box-shadow:0 0 25px rgba(250,204,21,.6);
    ">

</section>
 
    @php
        $pesananHariIni = \App\Models\Order::whereDate('created_at', today())->count();
        $pendapatanHariIni = \App\Models\Order::whereDate('created_at', today())
            ->where('status','Berhasil Dibayar')
            ->sum('total');

        $pesananBulanIni = \App\Models\Order::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $pendapatanBulanIni = \App\Models\Order::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('status','Berhasil Dibayar')
            ->sum('total');

        $cod = \App\Models\Order::where('metode','COD')->count();
        $berhasilBayar = \App\Models\Order::where('status','Berhasil Dibayar')->count();
        $selesai = \App\Models\Order::where('status_pengiriman','Selesai')->count();
        $belumDiproses = \App\Models\Order::whereNull('status_pengiriman')->orWhere('status_pengiriman','Belum Diproses')->count();
    @endphp

<h2 style="
font-size:28px;
font-weight:bold;
color:#facc15;
margin:35px 0 10px;">
📦 Statistik Pesanan
</h2>

<p style="
color:#94a3b8;
margin-bottom:20px;">
Ringkasan pesanan dan pendapatan toko.
</p>

<div style="
display:grid;
grid-template-columns:repeat(auto-fit,minmax(230px,1fr));
gap:20px;
margin-top:0;
">

        <div style="background:#111827;padding:25px;border-radius:18px;border:1px solid #334155;">
            <h3 style="color:#38bdf8;">📅 Pesanan Hari Ini</h3>
            <h1>{{ $pesananHariIni }}</h1>
        </div>

        <div style="background:#111827;padding:25px;border-radius:18px;border:1px solid #334155;">
            <h3 style="color:#22c55e;">💰 Pendapatan Hari Ini</h3>
            <h2>Rp {{ number_format($pendapatanHariIni,0,',','.') }}</h2>
        </div>

        <div style="background:#111827;padding:25px;border-radius:18px;border:1px solid #334155;">
            <h3 style="color:#facc15;">📆 Pesanan Bulan Ini</h3>
            <h1>{{ $pesananBulanIni }}</h1>
        </div>

        <div style="background:#111827;padding:25px;border-radius:18px;border:1px solid #334155;">
            <h3 style="color:#a78bfa;">🏦 Pendapatan Bulan Ini</h3>
            <h2>Rp {{ number_format($pendapatanBulanIni,0,',','.') }}</h2>
        </div>

    </div>

    <h2 style="color:#facc15;margin-top:35px;">📌 Status Transaksi</h2>
    <p style="
color:#94a3b8;
margin-bottom:20px;">
Lihat Status Transaksi Pelanggan 
</p>


    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(230px,1fr));gap:20px;margin-top:20px;">

        <div style="background:#0f172a;padding:22px;border-radius:16px;border:1px solid #334155;">
            <h3>💵 COD</h3>
            <h1 style="color:#facc15;">{{ $cod }}</h1>
        </div>

        <div style="background:#0f172a;padding:22px;border-radius:16px;border:1px solid #334155;">
            <h3>✅ Berhasil Dibayar</h3>
            <h1 style="color:#22c55e;">{{ $berhasilBayar }}</h1>
        </div>

        <div style="background:#0f172a;padding:22px;border-radius:16px;border:1px solid #334155;">
            <h3>🚚 Pengiriman Selesai</h3>
            <h1 style="color:#38bdf8;">{{ $selesai }}</h1>
        </div>

        <div style="background:#0f172a;padding:22px;border-radius:16px;border:1px solid #334155;">
            <h3>📦 Belum Diproses</h3>
            <h1 style="color:#f97316;">{{ $belumDiproses }}</h1>
        </div>

    </div>

</div>

</body>
</html>