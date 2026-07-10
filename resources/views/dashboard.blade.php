<x-app-layout>

<div style="background:#020617;min-height:100vh;color:white;font-family:Arial,sans-serif;display:flex;">
    {{-- SIDEBAR ADMIN --}}
<aside style="
width:260px;
background:#020617;
border-right:1px solid #1e293b;
padding:30px 25px;
box-sizing:border-box;
">
<div style="text-align:center;margin-bottom:35px;">
        
    
    </div>

    <a href="{{ route('dashboard') }}"
style="display:block;background:#facc15;color:#020617;padding:14px 18px;border-radius:12px;text-decoration:none;font-weight:bold;margin-bottom:12px;">
🏠 Dashboard
</a>

<a href="{{ route('admin.laporan') }}"
style="
display:block;
color:white;
padding:14px 18px;
text-decoration:none;
font-weight:bold;
margin-bottom:8px;
border-radius:12px;
transition:.3s;
"
onmouseover="this.style.background='#1e293b';this.style.color='#facc15';"
onmouseout="this.style.background='transparent';this.style.color='white';">
    📈 Laporan
</a>

<a href="{{ route('admin.statistik') }}"
style="
display:block;
color:white;
padding:14px 18px;
text-decoration:none;
font-weight:bold;
margin-bottom:8px;
border-radius:12px;
transition:.3s;
"
onmouseover="this.style.background='#1e293b';this.style.color='#facc15';"
onmouseout="this.style.background='transparent';this.style.color='white';">
📊 Statistik
</a>

<a href="{{ route('admin.pengaturan') }}"
style="
display:block;
color:white;
padding:14px 18px;
text-decoration:none;
font-weight:bold;
margin-bottom:8px;
border-radius:12px;
transition:.3s;
"
onmouseover="this.style.background='#1e293b';this.style.color='#facc15';"
onmouseout="this.style.background='transparent';this.style.color='white';">
⚙️ Pengaturan
</a>

<a href="{{ route('profile.edit') }}"
style="
display:block;
color:white;
padding:14px 18px;
text-decoration:none;
font-weight:bold;
margin-bottom:8px;
border-radius:12px;
transition:.3s;
"
onmouseover="this.style.background='#1e293b';this.style.color='#facc15';"
onmouseout="this.style.background='transparent';this.style.color='white';">
👤 Profil Admin
</a>

<form method="POST" action="{{ route('logout') }}" style="margin-top:10px;">
    @csrf
    <button type="submit"
    style="
display:block;
color:white;
padding:14px 18px;
text-decoration:none;
font-weight:bold;
margin-bottom:8px;
border-radius:12px;
transition:.3s;
"
onmouseover="this.style.background='#1e293b';this.style.color='#facc15';"
onmouseout="this.style.background='transparent';this.style.color='white';">
        🚪 Logout
    </button>
</form>

</aside>

<main style="
flex:1;
padding:35px;
box-sizing:border-box;
">

</nav>

    <div style="padding:35px 45px; min-height:calc(100vh - 170px);">

        {{-- DASHBOARD ADMIN --}}
        <section style="
background:linear-gradient(135deg,#081a3a,#1456d4);
border-radius:24px;
padding:50px;
margin-bottom:30px;
box-shadow:0 12px 30px rgba(0,0,0,.4);
">

            <div style="display:flex; justify-content:space-between; align-items:center; gap:20px; flex-wrap:wrap;">

                <div>
                    <p style="
color:#facc15;
font-weight:bold;
letter-spacing:2px;
margin-bottom:15px;
">
ADMIN PANEL
</p>

<div style="
width:70px;
height:4px;
background:#facc15;
border-radius:10px;
margin-bottom:25px;
"></div>

<h1 style="
font-size:60px;
font-weight:900;
margin:0;
color:white;">
    Dashboard <span style="color:#facc15;">Admin</span>
</h1>

<p style="
margin-top:20px;
font-size:24px;
font-weight:bold;
color:white;">
    Selamat datang,
    <span style="color:#facc15;">
        {{ Auth::user()->name }}
    </span>
</p>

<p style="
margin-top:12px;
font-size:17px;
line-height:1.8;
color:#d1d5db;
max-width:650px;">
    Kelola produk gitar, pantau aktivitas toko, dan kelola seluruh sistem AW Store dengan mudah.
</p>
                </div>

                <img src="{{ asset('images/aw-logo.jpeg') }}"
style="
width:220px;
height:220px;
border-radius:50%;
border:4px solid #facc15;
object-fit:cover;
box-shadow:0 0 30px rgba(250,204,21,.6);
transition:.3s;
"
onmouseover="this.style.transform='scale(1.08)'"
onmouseout="this.style.transform='scale(1)'"
">
            </div>

        </section>
        
       @php
$stokHampirHabis = \App\Models\Product::where('stok','<=',5)->count();

$keranjangAktif = \App\Models\Cart::distinct('user_id')->count('user_id');

$pesananBelumDiproses = \App\Models\Order::whereNull('status_pengiriman')
    ->orWhere('status_pengiriman', 'Belum Diproses')
    ->count();

$totalPembeli = \App\Models\User::where('role','pembeli')->count();

$pesanPembeli = 0;
@endphp

<div style="margin-top:35px;margin-bottom:22px;">
    <p style="color:#facc15;font-size:13px;letter-spacing:2px;font-weight:bold;margin:0;">
        ADMIN NOTIFICATION
    </p>

    <h2 style="font-size:34px;color:white;margin:8px 0;font-weight:900;">
        🔔 Notifikasi <span style="color:#facc15;">Admin</span>
    </h2>

    <p style="color:#94a3b8;font-size:15px;margin:0;">
        Pantau informasi penting yang perlu diperhatikan admin.
    </p>
</div>

<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:20px;margin-bottom:35px;">

    <a href="{{ route('admin.stok') }}"
style="
display:block;
background:linear-gradient(135deg,#111827,#1e293b);
border:1px solid #334155;
border-radius:18px;
padding:25px;
text-decoration:none;
color:white;
cursor:pointer;
transition:.3s;
box-shadow:0 10px 25px rgba(0,0,0,.35);
"
onmouseover="
this.style.transform='translateY(-5px)';
this.style.borderColor='#facc15';
this.style.boxShadow='0 0 25px rgba(250,204,21,.35)';
"
onmouseout="
this.style.transform='translateY(0)';
this.style.borderColor='#334155';
this.style.boxShadow='0 10px 25px rgba(0,0,0,.35)';
">

    <h3 style="color:#facc15;margin:0 0 10px;">
        📦 Stok Hampir Habis
    </h3>

    <h1 style="font-size:42px;margin:10px 0;color:white;">
        {{ $stokHampirHabis }}
    </h1>

    <p style="color:#94a3b8;margin:0;line-height:1.6;">
        Produk dengan stok 5 atau kurang.
    </p>

</a>

    <a href="{{ route('admin.keranjang') }}"
style="
display:block;
background:linear-gradient(135deg,#111827,#1e293b);
border:1px solid #334155;
border-radius:18px;
padding:25px;
text-decoration:none;
color:white;
cursor:pointer;
transition:.3s;
box-shadow:0 10px 25px rgba(0,0,0,.35);
"
onmouseover="
this.style.transform='translateY(-5px)';
this.style.borderColor='#facc15';
this.style.boxShadow='0 0 25px rgba(250,204,21,.35)';
"
onmouseout="
this.style.transform='translateY(0)';
this.style.borderColor='#334155';
this.style.boxShadow='0 10px 25px rgba(0,0,0,.35)';
">
        <h3 style="color:#38bdf8;margin-top:0;">🛒 Keranjang Aktif</h3>
        <h1 style="font-size:42px;margin:10px 0;color:white;">{{ $keranjangAktif }}</h1>
        <p style="color:#94a3b8;margin:0;">Pembeli yang masih punya isi keranjang</p>
</a>

    <a href="{{ route('admin.pesan') }}"
style="
display:block;
background:linear-gradient(135deg,#111827,#1e293b);
border:1px solid #334155;
border-radius:18px;
padding:25px;
text-decoration:none;
color:white;
cursor:pointer;
transition:.3s;
box-shadow:0 10px 25px rgba(0,0,0,.35);
"
onmouseover="
this.style.transform='translateY(-5px)';
this.style.borderColor='#facc15';
this.style.boxShadow='0 0 25px rgba(250,204,21,.35)';
"
onmouseout="
this.style.transform='translateY(0)';
this.style.borderColor='#334155';
this.style.boxShadow='0 10px 25px rgba(0,0,0,.35)';
">
        <h3 style="color:#f97316;margin-top:0;">📨 Pesanan Belum Diproses</h3>
        <h1 style="font-size:42px;margin:10px 0;color:white;">{{ $pesananBelumDiproses }}</h1>
        <p style="color:#94a3b8;margin:0;">Pesanan yang menunggu diproses admin</p>
</a>

    <a href="{{ route('admin.pembeli') }}"
style="
display:block;
background:linear-gradient(135deg,#111827,#1e293b);
border:1px solid #334155;
border-radius:18px;
padding:25px;
text-decoration:none;
color:white;
cursor:pointer;
transition:.3s;
box-shadow:0 10px 25px rgba(0,0,0,.35);
"
onmouseover="
this.style.transform='translateY(-5px)';
this.style.borderColor='#facc15';
this.style.boxShadow='0 0 25px rgba(250,204,21,.35)';
"
onmouseout="
this.style.transform='translateY(0)';
this.style.borderColor='#334155';
this.style.boxShadow='0 10px 25px rgba(0,0,0,.35)';
">
        <h3 style="color:#a78bfa;margin-top:0;">👥 Total Pembeli</h3>
        <h1 style="font-size:42px;margin:10px 0;color:white;">{{ $totalPembeli }}</h1>
        <p style="color:#94a3b8;margin:0;">Akun pembeli yang terdaftar</p>
</a>

</div>

<div style="margin-top:35px;margin-bottom:22px;">

    <p style="
    color:#facc15;
    font-size:13px;
    letter-spacing:2px;
    font-weight:bold;
    margin:0;">
        QUICK ACCESS
    </p>

    <h2 style="
    font-size:34px;
    color:white;
    margin:8px 0;
    font-weight:900;">
        Menu <span style="color:#facc15;">Admin</span>
    </h2>

    <p style="
    color:#94a3b8;
    font-size:15px;
    margin:0;">
        Akses cepat untuk mengelola produk, transaksi, dan pengiriman.
    </p>

</div>

<div style="
display:grid;
grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
gap:20px;
margin-bottom:35px;
">

<a href="{{ route('products.index') }}"
style="
background:linear-gradient(135deg,#111827,#1e293b);
border:1px solid #334155;
border-radius:20px;
padding:28px;
text-decoration:none;
color:white;
transition:.3s;
box-shadow:0 10px 25px rgba(0,0,0,.35);
"
onmouseover="this.style.transform='translateY(-5px)';this.style.borderColor='#facc15';"
onmouseout="this.style.transform='translateY(0)';this.style.borderColor='#334155';">

    <div style="font-size:45px;margin-bottom:15px;">📦</div>

    <h3 style="color:#facc15;margin:0 0 10px;">
        Kelola Produk
    </h3>

    <p style="color:#cbd5e1;margin:0;line-height:1.6;">
        Tambah, edit, hapus, dan kelola data produk gitar AW Store.
    </p>

</a>

<a href="{{ route('admin.riwayat') }}"
style="
background:linear-gradient(135deg,#111827,#1e293b);
border:1px solid #334155;
border-radius:20px;
padding:28px;
text-decoration:none;
color:white;
transition:.3s;
box-shadow:0 10px 25px rgba(0,0,0,.35);
"
onmouseover="this.style.transform='translateY(-5px)';this.style.borderColor='#22c55e';"
onmouseout="this.style.transform='translateY(0)';this.style.borderColor='#334155';">

    <div style="font-size:45px;margin-bottom:15px;">🧾</div>

    <h3 style="color:#22c55e;margin:0 0 10px;">
        Riwayat Transaksi
    </h3>

    <p style="color:#cbd5e1;margin:0;line-height:1.6;">
        Lihat seluruh pesanan, metode pembayaran, dan status transaksi.
    </p>

</a>

<a href="{{ route('pengiriman.index') }}"
style="
background:linear-gradient(135deg,#111827,#1e293b);
border:1px solid #334155;
border-radius:20px;
padding:28px;
text-decoration:none;
color:white;
transition:.3s;
box-shadow:0 10px 25px rgba(0,0,0,.35);
"
onmouseover="this.style.transform='translateY(-5px)';this.style.borderColor='#38bdf8';"
onmouseout="this.style.transform='translateY(0)';this.style.borderColor='#334155';">

    <div style="font-size:45px;margin-bottom:15px;">🚚</div>

    <h3 style="color:#38bdf8;margin:0 0 10px;">
        Kelola Pengiriman
    </h3>

    <p style="color:#cbd5e1;margin:0;line-height:1.6;">
        Atur status pengiriman, jasa kirim, nomor resi, dan estimasi tiba.
    </p>

</a>

<!-- Cetak Invoice -->
<a href="{{ route('invoice') }}"
style="
background:linear-gradient(135deg,#111827,#1e293b);
border:1px solid #334155;
border-radius:20px;
padding:28px;
text-decoration:none;
color:white;
transition:.3s;
box-shadow:0 10px 25px rgba(0,0,0,.35);
"
onmouseover="this.style.transform='translateY(-5px)';this.style.borderColor='#facc15';"
onmouseout="this.style.transform='translateY(0)';this.style.borderColor='#334155';">

    <div style="font-size:45px;margin-bottom:15px;">🧾</div>

    <h3 style="color:#facc15;margin:0 0 10px;">
        Cetak Invoice
    </h3>

    <p style="color:#cbd5e1;margin:0;line-height:1.6;">
        Cetak invoice pesanan pelanggan berdasarkan data transaksi yang tersimpan.
    </p>

</a>

</div>

</div>

    <footer style="background:#020617; text-align:center; padding:25px; color:#94a3b8; border-top:1px solid #1e293b;">
        AW Store | Guitar & Musik Gear
    </footer>

</main>

</div>

</x-app-layout>