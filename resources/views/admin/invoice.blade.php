<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Invoice AW Store</title>
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
    font-weight:bold;">
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
        <p style="color:#facc15;font-weight:bold;letter-spacing:2px;margin:0 0 10px;">
            ADMIN PANEL
        </p>

        <h1 style="font-size:44px;margin:0;color:white;">
            🧾 Invoice <span style="color:#facc15;">AW Store</span>
        </h1>

        <p style="color:#cbd5e1;margin-top:12px;margin-bottom:0;">
            Daftar invoice seluruh transaksi pelanggan.
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

</div>

<table style="
width:calc(100% - 40px);
margin:0 auto;
border-collapse:collapse;
background:#0f172a;
border-radius:15px;
overflow:hidden;
">
    
<thead style="background:#1e293b;">

<tr>

<th style="padding:15px;">No</th>
<th>Nama</th>
<th>Total</th>
<th>Pembayaran</th>
<th>Status</th>
<th>Tanggal</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

@forelse($orders as $order)

<tr style="text-align:center;border-top:1px solid #334155;">

<td style="padding:15px;">
{{ $loop->iteration }}
</td>

<td>
{{ $order->user->name ?? '-' }}
</td>

<td>
Rp {{ number_format($order->total,0,',','.') }}
</td>

<td>
{{ $order->metode ?? '-' }}

@if($order->bank_ewallet)
<br>
<small style="color:#38bdf8;">
{{ $order->bank_ewallet }}
</small>
@endif
</td>

<td>
{{ $order->status }}
</td>

<td>
{{ $order->created_at->format('d-m-Y') }}
</td>

<td>

<button onclick="window.print()"
style="
background:#22c55e;
color:white;
border:none;
padding:8px 15px;
border-radius:8px;
cursor:pointer;">
Cetak
</button>

</td>

</tr>

@empty

<tr>

<td colspan="7" style="padding:30px;text-align:center;color:#94a3b8;">
Belum ada transaksi.
</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</body>
</html>