<!DOCTYPE html>
<html>
<head>
    <title>Update Status Pengiriman</title>
</head>

<body style="background:#020617; color:white; font-family:Arial,sans-serif; margin:0; padding:35px;">

<div style="background:#0f172a; padding:30px; border-radius:18px; max-width:650px; border:1px solid #1e293b;">

    <h1 style="color:#facc15; margin-top:0;">
        Update Status Pengiriman
    </h1>

    <h2 style="color:white;">
        {{ $order->nama_produk }}
    </h2>

    <p>Total: Rp {{ number_format($order->total,0,',','.') }}</p>
    <p>Status Sekarang: <b style="color:#22c55e;">{{ $order->status_pengiriman }}</b></p>

    <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
        @csrf

        <label>Status Pengiriman</label><br>
        <select name="status_pengiriman"
                style="width:100%; padding:12px; margin:10px 0 20px; border-radius:8px;">
            <option value="Belum Diproses" {{ $order->status_pengiriman == 'Belum Diproses' ? 'selected' : '' }}>Belum Diproses</option>
            <option value="Sedang Dikemas" {{ $order->status_pengiriman == 'Sedang Dikemas' ? 'selected' : '' }}>Sedang Dikemas</option>
            <option value="Sedang Dikirim" {{ $order->status_pengiriman == 'Sedang Dikirim' ? 'selected' : '' }}>Sedang Dikirim</option>
            <option value="Sampai di Tujuan" {{ $order->status_pengiriman == 'Sampai di Tujuan' ? 'selected' : '' }}>Sampai di Tujuan</option>
            <option value="Selesai" {{ $order->status_pengiriman == 'Selesai' ? 'selected' : '' }}>Selesai</option>
        </select>

        <button type="submit"
            style="background:#2563eb; color:white; border:none; padding:12px 25px; border-radius:8px; font-weight:bold; cursor:pointer;">
            🔄 Update Status
        </button>

        <a href="{{ route('pengiriman.index') }}"
           style="display:inline-block; margin-left:10px; background:#facc15; color:#020617; padding:12px 25px; border-radius:8px; text-decoration:none; font-weight:bold;">
            Kembali
        </a>
    </form>

</div>

</body>
</html>