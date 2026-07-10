<!DOCTYPE html>
<html>
<head>
    <title>AW Store</title>

    <style>
        *{ margin:0; padding:0; box-sizing:border-box; font-family:Arial,sans-serif; }

        body{
            background:#020617;
            color:white;
        }

        .navbar{
            height:78px;
            padding:0 70px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            background:#020617;
            border-bottom:1px solid #1e293b;
        }

        .brand{
            display:flex;
            align-items:center;
            gap:12px;
        }

        .brand img{
            width:42px;
            height:42px;
            border-radius:50%;
            object-fit:cover;
        }

        .brand span{
            color:#facc15;
            font-size:30px;
            font-weight:bold;
        }

        .menu a{
            color:white;
            text-decoration:none;
            margin-left:30px;
            font-weight:bold;
            font-size:16px;
        }

        .menu a:hover{
            color:#facc15;
        }

        .hero{
            margin:22px 55px;
            min-height:420px;
            padding:35px 60px;
            border-radius:25px;
            background:linear-gradient(135deg,#020617,#0f172a,#1d4ed8);
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:35px;
            border:1px solid #1e293b;
            box-shadow:0 12px 35px rgba(0,0,0,.45);
        }

        .hero-left{ width:55%; }

        .hero-logo{
            width:90px;
            height:90px;
            border-radius:50%;
            border:3px solid #facc15;
            box-shadow:0 0 22px rgba(250,204,21,.75);
            margin-bottom:18px;
            object-fit:cover;
        }

        .hero h1{
            font-size:48px;
            line-height:1.2;
            margin-bottom:15px;
        }

        .hero h1 span{ color:#facc15; }

        .hero p{
            color:#cbd5e1;
            line-height:1.7;
            margin-bottom:25px;
            font-size:16px;
        }

        .btn{
            display:inline-block;
            padding:13px 28px;
            border-radius:12px;
            text-decoration:none;
            font-weight:bold;
            margin-right:10px;
        }

        .btn-produk{
            background:#facc15;
            color:#020617;
        }

        .btn-keranjang{
            background:#2563eb;
            color:white;
        }

        .hero-right img{
            width:320px;
            max-width:100%;
        }

        .section{
            padding:20px 70px 40px;
            text-align:center;
        }

        .section h2{
            margin-bottom:25px;
            color:#facc15;
        }

        .cards{
            display:flex;
            justify-content:center;
            gap:20px;
            flex-wrap:wrap;
        }

        .card{
            width:250px;
            background:#0f172a;
            border:1px solid #1e293b;
            border-radius:18px;
            padding:20px;
        }

        .card h3{
            color:#facc15;
            margin-bottom:10px;
        }

        .card p{
            color:#cbd5e1;
            line-height:1.6;
        }

        footer{
            text-align:center;
            padding:20px;
            border-top:1px solid #1e293b;
            color:#94a3b8;
        }
    </style>
</head>

<body>

<div class="navbar">
    <div class="brand">
        <img src="{{ asset('images/aw-logo.jpeg') }}">
        <span>AW STORE</span>
    </div>

    <div class="menu">
        <a href="/produk-pembeli">Produk</a>
        <a href="/keranjang">Keranjang</a>
        <a href="/tentang-kami">Tentang Kami</a>
    </div>
</div>

<div class="hero">
    <div class="hero-left">
        <img src="{{ asset('images/aw-logo.jpeg') }}" class="hero-logo">

        <h1>
            Selamat Datang di
            <span>AW Store</span>
        </h1>

        <p>
            AW Store adalah toko gitar dan perlengkapan musik online yang
            menyediakan berbagai produk berkualitas seperti gitar akustik,
            gitar elektrik, bass, senar, capo, dan aksesoris musik lainnya
            dengan harga terbaik.
        </p>

        <a href="/produk-pembeli" class="btn btn-produk">Lihat Produk →</a>
        <a href="/keranjang" class="btn btn-keranjang">Keranjang →</a>
    </div>

    <div class="hero-right">
        <img src="{{ asset('images/aw-logo.jpeg') }}">
    </div>
</div>

<div class="section">
    <h2>Mengapa Memilih AW Store?</h2>

    <div class="cards">
        <div class="card">
            <h3>Produk Berkualitas</h3>
            <p>Menyediakan gitar dan perlengkapan musik terbaik untuk pemula maupun profesional.</p>
        </div>

        <div class="card">
            <h3>Harga Terjangkau</h3>
            <p>Produk berkualitas dengan harga yang ramah di kantong.</p>
        </div>

        <div class="card">
            <h3>Belanja Mudah</h3>
            <p>Pemesanan cepat dan mudah langsung dari website.</p>
        </div>
    </div>
</div>

<footer>
    © 2026 AW Store | Guitar & Music Gear
</footer>

</body>
</html>