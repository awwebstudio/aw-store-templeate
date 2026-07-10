<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pengaturan AW Store</title>
</head>

<body style="margin:0;background:#020617;color:white;font-family:Arial,sans-serif;">

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

        <p style="
        color:#facc15;
        font-weight:bold;
        letter-spacing:3px;
        margin:0;
        font-size:13px;">
        PENGATURAN TOKO
        </p>

        <h1 style="
        font-size:46px;
        margin:10px 0;
        color:white;">
        ⚙️ Pengaturan <span style="color:#facc15;">AW Store</span>
        </h1>

        <p style="
        color:#cbd5e1;
        margin:0;">
        Kelola informasi utama toko AW Store.
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
background:#111827;
padding:30px;
border-radius:20px;
border:1px solid #334155;
box-shadow:0 10px 25px rgba(0,0,0,.35);
">

<h2 style="color:#facc15;margin-top:0;">
📋 Informasi Toko
</h2>

<hr style="border:1px solid #334155;">

<p><b>🏪 Nama Toko</b></p>
<p style="color:#cbd5e1;">{{ $setting->nama_toko }}</p>

<hr style="border:1px solid #334155;">

<p><b>📧 Email Toko</b></p>
<p style="color:#cbd5e1;">{{ $setting->email_toko }}</p>

<hr style="border:1px solid #334155;">

<p><b>📱 Nomor WhatsApp</b></p>
<p style="color:#cbd5e1;">{{ $setting->no_wa }}</p>

<hr style="border:1px solid #334155;">

<p><b>📍 Alamat Toko</b></p>
<p style="color:#cbd5e1;">{{ $setting->alamat }}</p>

<hr style="border:1px solid #334155;">

<p><b>📝 Deskripsi Toko</b></p>

<div style="
background:#020617;
padding:18px;
border-radius:12px;
border:1px solid #334155;
color:#cbd5e1;
line-height:1.7;">
{{ $setting->deskripsi }}
</div>

<div style="margin-top:30px;">

<a href="{{ route('admin.pengaturan.edit') }}"
style="
display:inline-block;
background:#facc15;
color:#020617;
padding:14px 22px;
border-radius:12px;
font-weight:bold;
text-decoration:none;
transition:.3s;"
onmouseover="this.style.background='#fde047'"
onmouseout="this.style.background='#facc15'">

✏️ Ubah Pengaturan Toko

</a>

</div>

</div>

</div>

</body>
</html>