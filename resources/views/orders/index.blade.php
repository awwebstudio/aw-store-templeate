<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Pembelian - AW Store</title>
</head>

<body style="margin:0; background:#020617; color:white; font-family:Arial,sans-serif;">

<div style="background:#020617; min-height:100vh; padding:35px 45px;">

    <div style="display:flex; align-items:center; gap:12px; margin-bottom:35px;">
        <img src="{{ asset('images/aw-logo.jpeg') }}"
             style="width:45px; height:45px; border-radius:50%; object-fit:cover;">

        <h1 style="color:#facc15; margin:0;">
            Riwayat Pembelian
        </h1>
    </div>

    <a href="{{ route('beranda') }}"
       style="display:inline-block; background:#facc15; color:#020617; padding:12px 22px; border-radius:10px; text-decoration:none; font-weight:bold; margin-bottom:25px;">
        ← Kembali ke Beranda
    </a>
    
    @if(session('success'))
<div id="success-alert"
     style="background:#16a34a;color:white;padding:15px 20px;border-radius:10px;margin:20px 0;font-weight:bold;">
    ✅ {{ session('success') }}
</div>

<script>
    setTimeout(function () {
        document.getElementById('success-alert').style.display = 'none';
    }, 3000);
</script>
@endif

    @if($orders->count() > 0)

        @foreach($orders as $order)
            <div style="background:#0f172a; border:1px solid #1e293b; padding:25px; border-radius:18px; margin-bottom:18px;">

                <h2 style="color:#facc15; margin-top:0;">
                    {{ $order->nama_produk }}
                </h2>

                <p>Jumlah: {{ $order->jumlah }}</p>

<p>Harga: Rp {{ number_format($order->harga,0,',','.') }}</p>

<p style="font-size:20px; font-weight:bold;">
    Total: Rp {{ number_format($order->total,0,',','.') }}
</p>

<p>
    Metode Pembayaran:
    <span style="color:#facc15;">
        {{ $order->metode }}
    </span>
</p>

@if($order->bank_ewallet)
<p>
    Bank / E-Wallet:
    <span style="color:#38bdf8;">
        {{ $order->bank_ewallet }}
    </span>
</p>
@endif

<p>
    Status:
    @if($order->status == 'Berhasil Dibayar')
        <span style="color:#22c55e; font-weight:bold;">
            {{ $order->status }}
        </span>
    @else
        <span style="color:#f97316; font-weight:bold;">
            {{ $order->status }}
        </span>
    @endif
</p>

<hr style="border:1px solid #334155; margin:18px 0;">

<h3 style="color:#22c55e;">Status Pengiriman</h3>

<p>
    Status Pengiriman:
    <span style="color:#facc15; font-weight:bold;">
        {{ $order->status_pengiriman ?? 'Belum Diproses' }}
    </span>
</p>

<p>Jasa Pengiriman: {{ $order->jasa_pengiriman ?? '-' }}</p>

<p>
    Nomor Resi:
    <span style="color:#38bdf8; font-weight:bold;">
        {{ $order->nomor_resi ?? '-' }}
    </span>
</p>

<p>Estimasi Tiba: {{ $order->estimasi_tiba ?? '-' }}</p>

<p style="color:#94a3b8;">
    Tanggal Pembelian: {{ $order->created_at->format('d-m-Y H:i') }}
</p>

            </div>
        @endforeach

    @else

        <div style="background:#0f172a; padding:30px; border-radius:18px;">
            <h2>Belum ada riwayat pembelian.</h2>
            <p style="color:#cbd5e1;">Silakan beli produk terlebih dahulu.</p>
        </div>

    @endif

</div>

</body>
</html>