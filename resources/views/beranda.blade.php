<!DOCTYPE html>
<html>
<head>
    <title>Beranda AW Store</title>
</head>

<body style="margin:0; background:#020617; color:white; font-family:Arial,sans-serif;">

<nav style="
background:#020617;
padding:16px 45px;
display:flex;
justify-content:space-between;
align-items:center;
border-bottom:1px solid #1e293b;
position:sticky;
top:0;
z-index:999;
">

    {{-- Logo --}}
    <div style="display:flex;align-items:center;gap:12px;">

        <img src="{{ asset('images/aw-logo.jpeg') }}"
             style="
             width:46px;
             height:46px;
             border-radius:50%;
             border:2px solid #facc15;
             object-fit:cover;">

        <span style="
        font-size:30px;
        font-weight:900;
        color:#facc15;
        letter-spacing:1px;">
            AW STORE
        </span>

    </div>

    {{-- Search --}}
    <form action="{{ route('produk.pembeli') }}"
          method="GET"
          style="
          display:flex;
          align-items:center;
          width:420px;
          ">

        <input
            type="text"
            name="search"
            placeholder="Cari produk..."
            style="
            flex:1;
            background:#0f172a;
            color:white;
            border:1px solid #334155;
            padding:13px 18px;
            border-radius:12px 0 0 12px;
            outline:none;
            ">

        <button
            type="submit"
            style="
            background:#facc15;
            color:#020617;
            border:none;
            padding:13px 22px;
            border-radius:0 12px 12px 0;
            font-weight:bold;
            cursor:pointer;">
            🔍
        </button>

    </form>

    {{-- Menu --}}
    <div style="
    display:flex;
    align-items:center;
    gap:12px;
    ">

        @guest

            <a href="{{ route('pembeli.login') }}"
            style="
background:transparent;
border:2px solid #facc15;
color:white;
padding:14px 18px;
border-radius:10px;
font-weight:bold;
text-decoration:none;
            transition:.3s;
"
onmouseover="this.style.transform='scale(1.08)'"
onmouseout="this.style.transform='scale(1)'"
">
                Masuk
            </a>

            <a href="{{ route('pembeli.register') }}"
            style="
            background:#facc15;
            color:#020617;
            padding:14px 18px;
            border-radius:10px;
            font-weight:bold;
            text-decoration:none;
            transition:.3s;
"
onmouseover="this.style.transform='scale(1.08)'"
onmouseout="this.style.transform='scale(1)'"
">
                Daftar
            </a>

        @else

            <a href="{{ route('carts.index') }}"
           style="
background:transparent;
border:2px solid #facc15;
color:white;
padding:14px 28px;
border-radius:12px;
font-weight:bold;
text-decoration:none;
             transition:.3s;
"
onmouseover="this.style.background='#facc15';this.style.color='#020617';"
onmouseout="this.style.background='transparent';this.style.color='white';">
                🛒 Keranjang

            </a>

            <a href="{{ route('riwayat.pembelian') }}"
            style="
background:transparent;
border:2px solid #facc15;
color:white;
padding:14px 28px;
border-radius:12px;
font-weight:bold;
text-decoration:none;
             transition:.3s;
"
onmouseover="this.style.background='#facc15';this.style.color='#020617';"
onmouseout="this.style.background='transparent';this.style.color='white';">
                🧾 Riwayat
            </a>

            <a href="{{ route('pembeli.profil') }}"
            style="
background:transparent;
border:2px solid #facc15;
color:white;
padding:14px 28px;
border-radius:12px;
font-weight:bold;
text-decoration:none;
             transition:.3s;
"
onmouseover="this.style.background='#facc15';this.style.color='#020617';"
onmouseout="this.style.background='transparent';this.style.color='white';">
                👤 Profil
            </a>

            <form method="POST"
                  action="{{ route('logout.pembeli') }}"
                  style="margin:0;">
                @csrf

                <button
                    type="submit"
                    style="
                    background:#dc2626;
                    color:white;
                    border:none;
                    padding:10px 18px;
                    border-radius:10px;
                    font-weight:bold;
                    cursor:pointer;
                    transition:.3s;
"
onmouseover="this.style.transform='scale(1.08)'"
onmouseout="this.style.transform='scale(1)'"
">
                    Logout
                </button>

            </form>

        @endguest

    </div>

</nav>

<section style="
margin:35px 45px;
background:linear-gradient(135deg,#0f172a,#1d4ed8);
padding:55px;
border-radius:28px;
box-shadow:0 15px 40px rgba(0,0,0,.45);
">

<div style="display:flex;justify-content:space-between;align-items:center;gap:35px;flex-wrap:wrap;">

<div style="max-width:650px;">

<p style="
color:#facc15;
font-weight:bold;
letter-spacing:3px;
margin-bottom:12px;">
TOKO GITAR ONLINE
</p>

<h1 style="
font-size:56px;
margin:0;
line-height:1.15;
font-weight:900;">
Temukan Gitar <br>
<span style="color:#facc15;">Impianmu</span>
</h1>

<p style="
margin-top:20px;
color:#cbd5e1;
font-size:18px;
line-height:1.8;">
AW Store menyediakan gitar akustik, gitar elektrik, bass, ukulele, dan perlengkapan musik berkualitas dengan harga terbaik.
</p>

<div style="display:flex;gap:15px;margin-top:30px;">

<a href="{{ route('produk.pembeli') }}"
style="
background:#facc15;
color:#020617;
padding:14px 28px;
border-radius:12px;
font-weight:bold;
text-decoration:none;
transition:.3s;
"
onmouseover="this.style.transform='scale(1.08)'"
onmouseout="this.style.transform='scale(1)'"
">

🛒 Belanja Sekarang
</a>

<a href="{{ route('tentang.kami') }}"
style="
background:transparent;
border:2px solid #facc15;
color:white;
padding:14px 28px;
border-radius:12px;
font-weight:bold;
text-decoration:none;
transition:.3s;
"
onmouseover="this.style.background='#facc15';this.style.color='#020617';"
onmouseout="this.style.background='transparent';this.style.color='white';">
Tentang Kami
</a>

</div>

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

<div style="
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:18px;
margin-top:45px;
">

<div
style="background:#111827;padding:20px;border-radius:16px;transition:0.3s;cursor:pointer;"
onmouseover="this.style.transform='translateY(-8px)'"
onmouseout="this.style.transform='translateY(0)'">

<h3 style="margin:0;color:#22c55e;">🛡️ Produk Original</h3>
<p style="color:#cbd5e1;">Produk berkualitas dan terpercaya.</p>

</div>

<div
style="background:#111827;padding:20px;border-radius:16px;transition:0.3s;cursor:pointer;"
onmouseover="this.style.transform='translateY(-8px)'"
onmouseout="this.style.transform='translateY(0)'">
<h3 style="margin:0;color:#38bdf8;">🚚 Pengiriman Cepat</h3>
<p style="color:#cbd5e1;">Pengiriman ke seluruh Indonesia.</p>
</div>

<div
style="background:#111827;padding:20px;border-radius:16px;transition:0.3s;cursor:pointer;"
onmouseover="this.style.transform='translateY(-8px)'"
onmouseout="this.style.transform='translateY(0)'">
<h3 style="margin:0;color:#facc15;">💳 Pembayaran Aman</h3>
<p style="color:#cbd5e1;">Transfer bank dan COD tersedia.</p>
</div>

<div
style="background:#111827;padding:20px;border-radius:16px;transition:0.3s;cursor:pointer;"
onmouseover="this.style.transform='translateY(-8px)'"
onmouseout="this.style.transform='translateY(0)'">
<h3 style="margin:0;color:#a78bfa;">⭐ Rating Tinggi</h3>
<p style="color:#cbd5e1;">Dipercaya oleh banyak pelanggan.</p>
</div>

</div>

</section>

<section style="padding:25px 45px 60px;">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:25px;">
        <div>
            <p style="color:#facc15;font-weight:bold;letter-spacing:2px;margin:0 0 8px;">
                PRODUK TERLARIS
            </p>

            <h2 style="color:white;font-size:30px;margin:0;">
                Pilihan Favorit Pelanggan AW Store
            </h2>
        </div>

        
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:20px;">

    <a href="{{ route('produk.pembeli') }}" style="text-decoration:none;color:inherit;">
    <div
style="background:#0f172a;border:1px solid #334155;border-radius:18px;padding:28px;transition:.3s;cursor:pointer;"
onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 15px 30px rgba(250,204,21,.25)';this.style.borderColor='#facc15';"
onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none';this.style.borderColor='#334155';">
        <h3 style="color:#facc15;margin-top:0;">Yamaha F310</h3>
        <p style="color:#facc15;">⭐⭐⭐⭐⭐ 4.8</p>
        <p style="color:#cbd5e1;">Gitar akustik populer dengan suara jernih dan nyaman dimainkan.</p>
        <h2 style="color:#facc15;">Rp 1.500.000</h2>
    </div>
</a>

    <a href="{{ route('produk.pembeli') }}" style="text-decoration:none;color:inherit;">
        <div
style="background:#0f172a;border:1px solid #334155;border-radius:18px;padding:28px;transition:.3s;cursor:pointer;"
onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 15px 30px rgba(250,204,21,.25)';this.style.borderColor='#facc15';"
onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none';this.style.borderColor='#334155';">
            <h3 style="color:#facc15;margin-top:0;">Gibson Les Paul</h3>
            <p style="color:#facc15;">⭐⭐⭐⭐⭐ 4.9</p>
            <p style="color:#cbd5e1;">Gitar premium dengan karakter suara tebal dan powerful.</p>
            <h2 style="color:#facc15;">Rp 7.500.000</h2>
        </div>
    </a>

    <a href="{{ route('produk.pembeli') }}" style="text-decoration:none;color:inherit;">
       <div
style="background:#0f172a;border:1px solid #334155;border-radius:18px;padding:28px;transition:.3s;cursor:pointer;"
onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 15px 30px rgba(250,204,21,.25)';this.style.borderColor='#facc15';"
onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none';this.style.borderColor='#334155';">
            <h3 style="color:#facc15;margin-top:0;">Fender Stratocaster</h3>
            <p style="color:#facc15;">⭐⭐⭐⭐⭐ 4.8</p>
            <p style="color:#cbd5e1;">Gitar ikonik yang cocok untuk berbagai genre musik.</p>
            <h2 style="color:#facc15;">Rp 5.000.000</h2>
        </div>
    </a>

</div>

    </div>

</section>

<footer style="text-align:center; padding:25px; color:#94a3b8; border-top:1px solid #1e293b;">
    AW Store | Guitar & Music Gear
</footer>

</body>
</html>