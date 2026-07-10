<!DOCTYPE html>  <html>  
<head>  
    <title>Riwayat Transaksi Admin</title>  
</head>  <body style="background:#020617; color:white; font-family:Arial,sans-serif; margin:0;">

<!-- NAVBAR -->
<div style="
width:100%;
display:flex;
justify-content:flex-end;
align-items:center;
padding:20px 45px;
margin-bottom:20px;
box-sizing:border-box;
">
    <a href="{{ route('dashboard') }}"
       style="
       padding:12px 20px;
       border:2px solid #facc15;
       border-radius:10px;
       color:white;
       text-decoration:none;
       font-weight:bold;
       transition:.3s;"
       onmouseover="this.style.background='#facc15';this.style.color='#020617';"
       onmouseout="this.style.background='transparent';this.style.color='white';">
        ← Kembali ke Dashboard
    </a>
</div>

</div>

<!-- HEADER -->
<div style="
background:linear-gradient(135deg,#111827,#1e3a8a);
padding:35px;
border-radius:22px;
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:30px;
box-shadow:0 10px 25px rgba(0,0,0,.4);
">

<div>
    <p style="color:#facc15;font-weight:bold;letter-spacing:2px;margin:0 0 10px;">
        ADMIN PANEL
    </p>

    <h1 style="margin:0;font-size:42px;color:white;">
        Riwayat Transaksi
    </h1>

    <p style="margin-top:12px;color:#cbd5e1;">
        Halaman ini menampilkan seluruh transaksi pembeli AW Store.
    </p>
</div>

<img src="{{ asset('images/aw-logo.jpeg') }}"
style="
width:95px;
height:95px;
border-radius:50%;
border:3px solid #facc15;
object-fit:cover;
box-shadow:0 0 20px rgba(250,204,21,.6);
">

</div>

@php
$totalTransaksi = $orders->count();
$totalPendapatan = $orders->where('status','Berhasil Dibayar')->sum('total');
@endphp

<div style="
display:grid;
grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
gap:20px;
margin-bottom:30px;
">

<div style="
background:linear-gradient(135deg,#111827,#1d4ed8);
padding:25px;
border-radius:18px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 8px 20px rgba(0,0,0,.3);
">

<div>
<p style="margin:0;color:#cbd5e1;"> Total Transaksi</p>
<h1 style="margin-top:10px;color:#facc15;">
{{ $totalTransaksi }}
</h1>
</div>


</div>

<div style="
background:linear-gradient(135deg,#111827,#1d4ed8);
padding:25px;
border-radius:18px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 8px 20px rgba(0,0,0,.3);
">

<div>
<p style="margin:0;color:#cbd5e1;"> Total Pendapatan</p>
<h2 style="margin-top:10px;color:#22c55e;">
Rp {{ number_format($totalPendapatan,0,',','.') }}
</h2>
</div>

</div>

</div> 
 @forelse($orders as $order)

<div style="background:#0f172a; padding:22px; border-radius:18px; margin-bottom:20px; border:1px solid #1e293b;">  <h2 style="color:#facc15; margin-top:0;">  
    {{ $order->nama_produk }}  
</h2>  

<p style="color:#38bdf8; font-weight:bold;">  
    ID Pesanan: #AW{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}  
</p>  

<p>Jumlah: {{ $order->jumlah }}</p>  

<p>Harga: Rp {{ number_format($order->harga,0,',','.') }}</p>  

<p style="font-size:18px; font-weight:bold;">  
    Total: Rp {{ number_format($order->total,0,',','.') }}  
</p>  

<p>  
    Metode Pembayaran:  
    <span style="color:#facc15; font-weight:bold;">  
        {{ $order->metode ?? 'Belum dipilih' }}  
    </span>  
</p>  

@if($order->bank_ewallet)  
    <p>  
        Bank / E-Wallet:  
        <span style="color:#38bdf8; font-weight:bold;">  
            {{ $order->bank_ewallet }}  
        </span>  
    </p>  
@endif  

<p>
    <b>Status Pembayaran:</b>

    @if($order->status == 'Berhasil Dibayar')
        <span style="color:#22c55e;font-weight:bold;">
            Berhasil Dibayar
        </span>
    @else
        <span style="color:#facc15;font-weight:bold;">
            Siapkan Uang Tunai
        </span>
    @endif
</p>

@if($order->metode == 'COD')  
    <p style="color:#facc15;">  
        Catatan: Pembeli harus menyiapkan uang tunai sebesar  
        Rp {{ number_format($order->total,0,',','.') }} saat barang diterima.  
    </p>  
@endif  

<p style="color:#94a3b8;">  
    <b>📅 Tanggal Pembelian:</b><br>  
    {{ $order->created_at->format('d F Y') }}<br>  
    🕒 {{ $order->created_at->format('H:i') }} WITA  
</p>  

<hr style="border:1px solid #334155; margin:18px 0;">  

<h3 style="color:#22c55e;">Informasi Pengiriman</h3>  

<p>  
    <b>Status Pengiriman:</b>  
    <span style="color:#facc15;font-weight:bold;">  
        {{ $order->status_pengiriman ?? 'Belum Diproses' }}  
    </span>  
</p>  

<p><b>Jasa:</b> {{ $order->jasa_pengiriman ?? '-' }}</p>  
<p><b>No. Resi:</b> {{ $order->nomor_resi ?? '-' }}</p>  
<p><b>Estimasi:</b> {{ $order->estimasi_tiba ?? '-' }}</p>  

<hr style="border:1px solid #334155; margin:18px 0;">  

<h3 style="color:#facc15; margin-bottom:10px;">  
    Data Pengiriman  
</h3>  

<p><b>Provinsi:</b> {{ $order->provinsi ?? '-' }}</p>  
<p><b>Kabupaten / Kota:</b> {{ $order->kabupaten ?? '-' }}</p>  
<p><b>Kecamatan:</b> {{ $order->kecamatan ?? '-' }}</p>  
<p><b>Desa / Kelurahan:</b> {{ $order->desa ?? '-' }}</p>  

<p><b>Alamat Lengkap:</b></p>  

<div style="background:#020617; padding:15px; border-radius:10px; border:1px solid #334155; color:#e5e7eb;">  
    {{ $order->alamat_lengkap ?? '-' }}  
</div>  

<h3 style="color:#facc15;">Data Pembeli</h3>  
<p><b>Nama Pembeli:</b> {{ $order->user->name ?? '-' }}</p>  
<p><b>Email:</b> {{ $order->user->email ?? '-' }}</p>  
<p><b>No. HP:</b> {{ $order->no_hp ?? '-' }}</p>  

<div style="margin-top:15px; background:#16a34a; color:white; padding:14px; border-radius:10px; font-weight:bold;">  
    Kirim barang ke alamat ini:<br><br>  

    {{ $order->alamat_lengkap }},  
    {{ $order->desa }},  
    {{ $order->kecamatan }},  
    {{ $order->kabupaten }},  
    {{ $order->provinsi }}  
</div>  

<hr style="border:1px solid #334155; margin:20px 0;">  



</div>  @empty

<div style="background:#0f172a; padding:25px; border-radius:15px;">  
    <h3>Belum ada transaksi.</h3>  
</div>  @endforelse

</body>  
</html> 