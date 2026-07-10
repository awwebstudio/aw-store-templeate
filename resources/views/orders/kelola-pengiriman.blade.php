<x-app-layout>

<div style="background:#020617;min-height:100vh;padding:35px;color:white;font-family:Arial,sans-serif;">

<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:25px;">

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

@php
    $belumDiproses = \App\Models\Order::where('status_pengiriman','Belum Diproses')->orWhereNull('status_pengiriman')->count();
    $sedangDikemas = \App\Models\Order::where('status_pengiriman','Sedang Dikemas')->count();
    $sedangDikirim = \App\Models\Order::where('status_pengiriman','Sedang Dikirim')->count();
    $sampaiTujuan = \App\Models\Order::where('status_pengiriman','Sampai di Tujuan')->count();
    $selesai = \App\Models\Order::where('status_pengiriman','Selesai')->count();
@endphp

@if(session('success'))
    <div id="alert-success"
         style="background:#16a34a;color:white;padding:14px 20px;border-radius:10px;margin-bottom:20px;font-weight:bold;">
        ✅ {{ session('success') }}
    </div>

    <script>
        setTimeout(function () {
            let alertBox = document.getElementById('alert-success');
            if (alertBox) {
                alertBox.style.display = 'none';
            }
        }, 3000);
    </script>
@endif

<div style="
background:linear-gradient(135deg,#0f172a,#1e3a8a);
padding:30px;
border-radius:20px;
display:flex;
justify-content:space-between;
align-items:center;
gap:20px;
margin-bottom:30px;
box-shadow:0 12px 30px rgba(0,0,0,.35);
border:1px solid #334155;
">

    <div style="display:flex;align-items:center;gap:35px;">

        <img src="{{ asset('images/aw-logo.jpeg') }}"
             alt="AW Store"
             style="
             width:85px;
             height:85px;
             border-radius:50%;
             object-fit:cover;
             border:3px solid #facc15;
             background:white;
             box-shadow:0 0 20px rgba(250,204,21,.35);
             ">

        <div>

            <h1 style="
            color:white;
            margin:0;
            font-size:36px;
            font-weight:700;">
                Kelola Pengiriman
            </h1>

            <p style="
            color:#cbd5e1;
            margin-top:10px;
            font-size:15px;
            line-height:1.7;">
                Kelola resi, jasa pengiriman, alamat pembeli, serta pantau status seluruh pesanan pelanggan.
            </p>

        </div>

    </div>

    

</div>

<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:15px;margin-bottom:25px;">

    <div style="background:#0f172a;border:1px solid #334155;border-radius:16px;padding:18px;">
        <p style="color:#94a3b8;margin:0;">📦 Belum Diproses</p>
        <h2 style="color:#facc15;margin:8px 0 0;">{{ $belumDiproses }}</h2>
    </div>

    <div style="background:#0f172a;border:1px solid #334155;border-radius:16px;padding:18px;">
        <p style="color:#94a3b8;margin:0;">📦 Sedang Dikemas</p>
        <h2 style="color:#facc15;margin:8px 0 0;">{{ $sedangDikemas }}</h2>
    </div>

    <div style="background:#0f172a;border:1px solid #334155;border-radius:16px;padding:18px;">
        <p style="color:#94a3b8;margin:0;">🚚 Sedang Dikirim</p>
        <h2 style="color:#38bdf8;margin:8px 0 0;">{{ $sedangDikirim }}</h2>
    </div>

    <div style="background:#0f172a;border:1px solid #334155;border-radius:16px;padding:18px;">
        <p style="color:#94a3b8;margin:0;">📍 Sampai Tujuan</p>
        <h2 style="color:#a78bfa;margin:8px 0 0;">{{ $sampaiTujuan }}</h2>
    </div>

    <div style="background:#0f172a;border:1px solid #334155;border-radius:16px;padding:18px;">
        <p style="color:#94a3b8;margin:0;">✅ Selesai</p>
        <h2 style="color:#22c55e;margin:8px 0 0;">{{ $selesai }}</h2>
    </div>

</div>

@php
    $active = request()->route()->getName();
@endphp

<div style="display:flex;gap:10px;flex-wrap:wrap;margin:25px 0;">

    <a href="{{ route('pengiriman.index') }}"
       style="background:{{ $active == 'pengiriman.index' ? '#facc15' : '#0f172a' }};
              color:{{ $active == 'pengiriman.index' ? '#020617' : 'white' }};
              padding:10px 18px;border-radius:8px;text-decoration:none;border:1px solid #334155;font-weight:bold;">
        Semua Pesanan
    </a>

    <a href="{{ route('pengiriman.belum') }}"
       style="background:{{ $active == 'pengiriman.belum' ? '#facc15' : '#0f172a' }};
              color:{{ $active == 'pengiriman.belum' ? '#020617' : 'white' }};
              padding:10px 18px;border-radius:8px;text-decoration:none;border:1px solid #334155;font-weight:bold;">
        Belum Diproses
    </a>

    <a href="{{ route('pengiriman.dikemas') }}"
       style="background:{{ $active == 'pengiriman.dikemas' ? '#facc15' : '#0f172a' }};
              color:{{ $active == 'pengiriman.dikemas' ? '#020617' : 'white' }};
              padding:10px 18px;border-radius:8px;text-decoration:none;border:1px solid #334155;font-weight:bold;">
        Sedang Dikemas
    </a>

    <a href="{{ route('pengiriman.dikirim') }}"
       style="background:{{ $active == 'pengiriman.dikirim' ? '#facc15' : '#0f172a' }};
              color:{{ $active == 'pengiriman.dikirim' ? '#020617' : 'white' }};
              padding:10px 18px;border-radius:8px;text-decoration:none;border:1px solid #334155;font-weight:bold;">
        Sedang Dikirim
    </a>

    <a href="{{ route('pengiriman.sampai') }}"
       style="background:{{ $active == 'pengiriman.sampai' ? '#facc15' : '#0f172a' }};
              color:{{ $active == 'pengiriman.sampai' ? '#020617' : 'white' }};
              padding:10px 18px;border-radius:8px;text-decoration:none;border:1px solid #334155;font-weight:bold;">
        Sampai di Tujuan
    </a>

    <a href="{{ route('pengiriman.selesai') }}"
       style="background:{{ $active == 'pengiriman.selesai' ? '#facc15' : '#0f172a' }};
              color:{{ $active == 'pengiriman.selesai' ? '#020617' : 'white' }};
              padding:10px 18px;border-radius:8px;text-decoration:none;border:1px solid #334155;font-weight:bold;">
        Selesai
    </a>

</div>

@forelse($orders as $order)

<div style="background:linear-gradient(135deg,#0f172a,#1e293b);padding:24px;border-radius:20px;margin-bottom:25px;border:1px solid #334155;box-shadow:0 10px 25px rgba(0,0,0,.35);">

    <div style="display:flex;justify-content:space-between;align-items:flex-start;gap:15px;flex-wrap:wrap;">

        <div>
            <h2 style="color:#facc15;margin:0 0 8px;font-size:26px;">
                {{ $order->nama_produk }}
            </h2>

            <p style="color:#38bdf8;font-weight:bold;margin:0 0 8px;">
                ID Pesanan: #AW{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}
            </p>

            <p style="margin:5px 0;"><b>Jumlah:</b> {{ $order->jumlah }}</p>
            <p style="margin:5px 0;"><b>Total:</b> Rp {{ number_format($order->total,0,',','.') }}</p>
        </div>

    </div>

    <hr style="border:1px solid #334155;margin:20px 0;">

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:18px;">

        <div style="background:#020617;border:1px solid #334155;border-radius:15px;padding:18px;">
            <h3 style="color:#22c55e;margin-top:0;">Informasi Pengiriman</h3>

            <p><b>Jasa:</b> {{ $order->jasa_pengiriman ?? '-' }}</p>
            <p><b>No. Resi:</b> {{ $order->nomor_resi ?? '-' }}</p>
            <b>Status Pengiriman:</b>
    <span style="color:#facc15;font-weight:bold;">
        {{ $order->status_pengiriman ?? 'Belum Diproses' }}
    </span>
</p>
            <p><b>Estimasi:</b> {{ $order->estimasi_tiba ?? '-' }}</p>
            <p>
    <b>Metode:</b>
    <span style="color:#facc15;font-weight:bold;">
        {{ $order->metode }}
    </span>
</p>

<p>
    <b>Status Pembayaran:</b>

    @if($order->status == 'Berhasil Dibayar')
        <span style="color:#22c55e;font-weight:bold;">
            {{ $order->status }}
        </span>
    @else
        <span style="color:#f97316;font-weight:bold;">
            {{ $order->status }}
        </span>
    @endif
</p>
        </div>

        <div style="background:#020617;border:1px solid #334155;border-radius:15px;padding:18px;">
            <h3 style="color:#facc15;margin-top:0;">Data Pembeli</h3>

            <p><b>Nama:</b> {{ $order->user->name ?? '-' }}</p>
            <p><b>Email:</b> {{ $order->user->email ?? '-' }}</p>
            <p><b>No. HP:</b> {{ $order->no_hp ?? '-' }}</p>
        </div>

    </div>

    <div style="background:#020617;border:1px solid #334155;border-radius:15px;padding:18px;margin-top:18px;">
        <h3 style="color:#facc15;margin-top:0;">Alamat Pengiriman</h3>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:10px;">
            <p><b>Provinsi:</b> {{ $order->provinsi ?? '-' }}</p>
            <p><b>Kabupaten / Kota:</b> {{ $order->kabupaten ?? '-' }}</p>
            <p><b>Kecamatan:</b> {{ $order->kecamatan ?? '-' }}</p>
            <p><b>Desa / Kelurahan:</b> {{ $order->desa ?? '-' }}</p>
        </div>

        <div style="background:#0f172a;padding:15px;border-radius:10px;border:1px solid #334155;color:#e5e7eb;margin-top:10px;">
            <b>Alamat Lengkap:</b><br><br>
            {{ $order->alamat_lengkap ?? '-' }}
        </div>

        <div style="margin-top:15px;background:#16a34a;color:white;padding:15px;border-radius:12px;font-weight:bold;">
            Kirim barang ke alamat ini:<br><br>
            {{ $order->alamat_lengkap }},
            {{ $order->desa }},
            {{ $order->kecamatan }},
            {{ $order->kabupaten }},
            {{ $order->provinsi }}
        </div>
    </div>

    <hr style="border:1px solid #334155;margin:22px 0;">

<div style="background:#020617;border:1px solid #334155;border-radius:15px;padding:20px;">

    <h3 style="color:#facc15;margin-top:0;">
        🚚 Form Pengiriman Barang
    </h3>

    <form action="{{ route('orders.kirim',$order->id) }}" method="POST">
        @csrf

        <div style="
display:grid;
grid-template-columns:1fr 1fr;
gap:25px;
margin-top:15px;
">

            <div>

                <label>Status Pengiriman</label>

<select name="status_pengiriman"
style="width:100%;
               height:45px;
               padding:10px;
               margin-top:5px;
               margin-bottom:15px;
               border-radius:8px;
               border:none;
               background:white;
               color:#020617;">

    <option value="" disabled selected>-- Pilih Status Pengiriman --</option>

    <option value="Belum Diproses">Belum Diproses</option>
    <option value="Sedang Dikemas">Sedang Dikemas</option>
    <option value="Sedang Dikirim">Sedang Dikirim</option>
    <option value="Sampai di Tujuan">Sampai di Tujuan</option>
    <option value="Selesai">Selesai</option>

</select>

<p style="color:#94a3b8;font-size:13px;margin-top:5px;">
Pilih status terbaru pesanan pelanggan.
</p>

            </div>

            <div>

                <label>Jasa Pengiriman</label>

<select name="jasa_pengiriman"
style="width:100%;
               height:45px;
               padding:10px;
               margin-top:5px;
               margin-bottom:15px;
               border-radius:8px;
               border:none;
               background:white;
               color:#020617;">

    <option value="" disabled selected>-- Pilih Jasa Pengiriman --</option>

    <option value="JNE">JNE</option>
    <option value="J&T">J&T</option>
    <option value="SiCepat">SiCepat</option>
    <option value="POS Indonesia">POS Indonesia</option>
    <option value="AnterAja">AnterAja</option>

</select>

<p style="color:#94a3b8;font-size:13px;margin-top:5px;">
Pilih ekspedisi yang digunakan.
</p>
            </div>

            <div>

<label>Nomor Resi</label>
<input type="text"
name="nomor_resi"
placeholder="Silakan isi nomor resi..."
style="width:100%;
               height:45px;
               padding:10px;
               margin-top:5px;
               margin-bottom:15px;
               border-radius:8px;
               border:none;
               background:white;
               color:#020617;">

<p style="color:#94a3b8;font-size:13px;margin-top:5px;">
Masukkan nomor resi dari jasa pengiriman.
</p>
            </div>

            <div>

                <label>Estimasi Tiba</label>

<input type="text"
name="estimasi_tiba"
placeholder="Contoh: 3-5 Hari"
style="width:100%;
               height:45px;
               padding:10px;
               margin-top:5px;
               margin-bottom:15px;
               border-radius:8px;
               border:none;
               background:white;
               color:#020617;">
<p style="color:#94a3b8;font-size:13px;margin-top:5px;">
Tentukan estimasi barang sampai ke pembeli.
</p>
            </div>

        </div>

        <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:25px;">

            <button type="submit"
                    style="background:#16a34a;color:white;border:none;padding:13px 28px;border-radius:10px;font-weight:bold;cursor:pointer;">
                🚚 Simpan Pengiriman
            </button>


        </div>

    </form>

</div>

</div>

@empty

<div style="background:#0f172a;padding:30px;border-radius:18px;text-align:center;border:1px solid #334155;">
    <h2 style="color:#facc15;">Belum ada data pengiriman.</h2>
</div>

@endforelse

</div>

</x-app-layout>