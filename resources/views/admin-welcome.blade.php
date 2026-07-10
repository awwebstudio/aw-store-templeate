<!DOCTYPE html>
<html>
<head>
    <title>AW Store Admin</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial,sans-serif;
        }

        body{
            background:#020617;
            color:white;
        }

        .navbar{
            padding:18px 70px;
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
            font-size:32px;
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
            margin:35px 70px;
            min-height:470px;
            padding:55px;
            border-radius:28px;
            background:linear-gradient(135deg,#020617,#0f172a,#1d4ed8);
            display:flex;
            align-items:center;
            justify-content:space-between;
            border:1px solid #1e293b;
            box-shadow:0 15px 40px rgba(0,0,0,.5);
        }

        .hero-left{
            width:55%;
        }

        .hero-logo{
            width:100px;
            height:100px;
            border-radius:50%;
            border:3px solid #facc15;
            box-shadow:0 0 22px rgba(250,204,21,.75);
            margin-bottom:25px;
            object-fit:cover;
        }

        .hero h1{
            font-size:52px;
            line-height:1.2;
            margin-bottom:18px;
        }

        .hero h1 span{
            color:#facc15;
        }

        .hero p{
            color:#cbd5e1;
            line-height:1.7;
            margin-bottom:28px;
            font-size:17px;
            max-width:620px;
        }

        .btn{
            display:inline-block;
            padding:14px 32px;
            border-radius:12px;
            text-decoration:none;
            font-weight:bold;
            margin-right:12px;
        }

        .login{
            background:#facc15;
            color:#020617;
        }

        .register{
            background:#2563eb;
            color:white;
        }

        .hero-right img{
            width:260px;
            height:260px;
            border-radius:50%;
            object-fit:cover;
            border:4px solid #facc15;
            box-shadow:0 0 35px rgba(250,204,21,.55);
        }

        footer{
            text-align:center;
            padding:25px;
            border-top:1px solid #1e293b;
            color:#94a3b8;
        }
    </style>
</head>

<body>



</div>

<div class="hero">

    <div class="hero-left">

        <h1>
            Selamat Datang di
            <span>AW Store Admin</span>
        </h1>

        <p>
            Halaman administrator AW Store untuk mengelola produk gitar,
            data toko, dan kebutuhan sistem e-commerce penjualan alat musik.
        </p>

        <a href="{{ route('login') }}" class="btn login">
            Login Sekarang →
        </a>

        <a href="{{ route('register') }}" class="btn register">
            Daftar Akun →
        </a>

    </div>

    <div class="hero-right">
        <img src="{{ asset('images/aw-logo.jpeg') }}">
    </div>

</div>

<footer>
    AW Store | Admin Panel
</footer>

</body>
</html>