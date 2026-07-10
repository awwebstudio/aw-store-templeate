<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Pembeli</title>
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
👥 Data <span style="color:#facc15;">Pembeli</span>
</h1>

<p style="
color:#cbd5e1;
margin-top:12px;
margin-bottom:0;">
Daftar seluruh akun pembeli yang terdaftar di AW Store.
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
$pembelis = \App\Models\User::where('role','pembeli')->latest()->get();
@endphp

<table style="width:100%;border-collapse:collapse;background:#0f172a;border-radius:15px;overflow:hidden;margin-top:25px;">
<tr style="background:#1e293b;">
    <th style="padding:15px;">No</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Tanggal Daftar</th>
</tr>

@forelse($pembelis as $pembeli)
<tr style="text-align:center;border-top:1px solid #334155;">
    <td style="padding:15px;">{{ $loop->iteration }}</td>
    <td>{{ $pembeli->name }}</td>
    <td>{{ $pembeli->email }}</td>
    <td>{{ $pembeli->created_at->format('d-m-Y') }}</td>
</tr>
@empty
<tr>
    <td colspan="4" style="padding:25px;text-align:center;color:#94a3b8;">
        Belum ada data pembeli.
    </td>
</tr>
@endforelse
</table>

</div>

</body>
</html>