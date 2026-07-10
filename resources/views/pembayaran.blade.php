<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran AW Store</title>

    <style>
        input[type="radio"] {
            accent-color: #facc15;
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .metode:hover {
            border-color: #facc15 !important;
            box-shadow: 0 0 18px rgba(250,204,21,0.25);
        }

        select {
            outline: none;
        }
    </style>
</head>

<body style="margin:0; background:#020617; color:white; font-family:Arial,sans-serif;">

<div style="min-height:100vh; padding:35px 45px; background:linear-gradient(135deg,#020617,#0f172a,#1e3a8a);">

    <div style="display:flex; align-items:center; gap:12px; margin-bottom:35px;">
        <img src="{{ asset('images/aw-logo.jpeg') }}"
             style="width:48px; height:48px; border-radius:50%; object-fit:cover; border:2px solid #facc15;">

        <h1 style="color:#facc15; margin:0;">
            Pembayaran AW Store
        </h1>
    </div>

    <div style="background:#0f172a; padding:35px; border-radius:22px; max-width:720px; box-shadow:0 12px 35px rgba(0,0,0,.45); border:1px solid #1e293b;">

        <p style="color:#facc15; font-weight:bold; letter-spacing:2px; margin-top:0;">
             PAYMENT GATEWAY
        </p>

        <h2 style="font-size:36px; margin:0 0 15px;">
            Pilih Metode Pembayaran
        </h2>

        <div style="background:#111827; padding:20px; border-radius:15px; margin-bottom:25px; border:1px solid #334155;">
            <p style="color:#94a3b8; margin:0 0 8px;">Kode Invoice</p>
            <h3 style="color:white; margin:0 0 18px;">
                INV-{{ date('YmdHis') }}
            </h3>

            <p style="color:#94a3b8; margin:0 0 8px;">Total Pembayaran</p>
            <h2 style="color:#facc15; margin:0 0 18px;">
                Rp {{ number_format($total,0,',','.') }}
            </h2>

            <p style="color:#94a3b8; margin:0 0 8px;">Status Pembayaran</p>
            <span style="background:#facc15; color:#020617; padding:8px 14px; border-radius:20px; font-weight:bold;">
                Menunggu Pembayaran
            </span>
        </div>

        <form action="{{ route('bayar') }}" method="POST">
            @csrf

            <label class="metode" style="display:flex; align-items:center; gap:12px; background:#111827; padding:18px; border-radius:15px; margin-bottom:15px; cursor:pointer; border:1px solid #334155;">
                <input type="radio" name="metode" value="Transfer Bank" required onclick="tampilMetode()">
                <span style="font-size:18px; font-weight:bold;">Transfer Bank</span>
            </label>

            <label class="metode" style="display:flex; align-items:center; gap:12px; background:#111827; padding:18px; border-radius:15px; margin-bottom:15px; cursor:pointer; border:1px solid #334155;">
                <input type="radio" name="metode" value="QRIS" onclick="tampilMetode()">
                <span style="font-size:18px; font-weight:bold;">QRIS</span>
            </label>

            <label class="metode" style="display:flex; align-items:center; gap:12px; background:#111827; padding:18px; border-radius:15px; margin-bottom:15px; cursor:pointer; border:1px solid #334155;">
                <input type="radio" name="metode" value="E-Wallet" onclick="tampilMetode()">
                <span style="font-size:18px; font-weight:bold;">E-Wallet</span>
            </label>

            <label class="metode" style="display:flex; align-items:center; gap:12px; background:#111827; padding:18px; border-radius:15px; margin-bottom:18px; cursor:pointer; border:1px solid #334155;">
                <input type="radio" name="metode" value="COD" onclick="tampilMetode()">
                <span style="font-size:18px; font-weight:bold;">COD / Bayar di Tempat</span>
            </label>

            <div id="bank-info" style="display:none; background:#020617; border:1px solid #334155; border-radius:15px; padding:18px; margin-bottom:18px;">
                <h3 style="color:#facc15; margin-top:0;">Transfer Bank</h3>

                <label style="color:#cbd5e1; font-weight:bold;">
                    Pilih Bank
                </label>

                <select id="pilih-bank" name="bank" onchange="tampilBankDetail()"
                        style="width:100%; margin-top:10px; padding:13px; border-radius:10px; border:1px solid #334155; background:#111827; color:white; font-weight:bold;">
                    <option value="">-- Pilih Bank --</option>
                    <option value="BRI">BRI</option>
                    <option value="BCA">BCA</option>
                    <option value="Mandiri">Mandiri</option>
                    <option value="BNI">BNI</option>
                </select>

                <div id="detail-bank" style="display:none; margin-top:18px; background:#111827; padding:15px; border-radius:12px; border:1px solid #334155;">
                    <p style="color:#94a3b8; margin:0 0 8px;">Bank Tujuan</p>
                    <h3 id="nama-bank" style="color:#facc15; margin:0 0 12px;"></h3>

                    <p style="color:#94a3b8; margin:0 0 8px;">Nomor Rekening</p>
                    <h3 id="nomor-rekening" style="color:white; margin:0 0 12px;"></h3>

                    <p style="color:#94a3b8; margin:0 0 8px;">Atas Nama</p>
                    <h3 style="color:white; margin:0;">AW Store</h3>
                </div>
            </div>

            <div id="qris-info" style="display:none; background:#020617; border:1px solid #334155; border-radius:15px; padding:18px; margin-bottom:18px;">
                <h3 style="color:#facc15; margin-top:0;">QRIS Payment</h3>

                <p style="color:#94a3b8; margin:0 0 8px;">Merchant</p>
                <h3 style="color:white; margin:0 0 12px;">AW Store</h3>

                <p style="color:#94a3b8; margin:0 0 8px;">Nominal</p>
                <h3 style="color:#facc15; margin:0 0 15px;">
                    Rp {{ number_format($total,0,',','.') }}
                </h3>

                <div style="width:170px; height:170px; background:white; color:#020617; display:flex; align-items:center; justify-content:center; border-radius:12px; font-weight:bold; margin-bottom:12px;">
                    QRIS
                </div>

                <p style="color:#cbd5e1; margin:0;">
                    Scan QRIS untuk melakukan pembayaran.
                </p>
            </div>

            <div id="ewallet-info" style="display:none; background:#020617; border:1px solid #334155; border-radius:15px; padding:18px; margin-bottom:18px;">
                <h3 style="color:#facc15; margin-top:0;">E-Wallet</h3>

                <label style="color:#cbd5e1; font-weight:bold;">
                    Pilih E-Wallet
                </label>

                <select id="pilih-ewallet" name="ewallet" onchange="tampilEwalletDetail()"
                        style="width:100%; margin-top:10px; padding:13px; border-radius:10px; border:1px solid #334155; background:#111827; color:white; font-weight:bold;">
                    <option value="">-- Pilih E-Wallet --</option>
                    <option value="DANA">DANA</option>
                    <option value="OVO">OVO</option>
                    <option value="GoPay">GoPay</option>
                    <option value="ShopeePay">ShopeePay</option>
                </select>

                <div id="detail-ewallet" style="display:none; margin-top:18px; background:#111827; padding:15px; border-radius:12px; border:1px solid #334155;">
                    <p style="color:#94a3b8; margin:0 0 8px;">E-Wallet Tujuan</p>
                    <h3 id="nama-ewallet" style="color:#facc15; margin:0 0 12px;"></h3>

                    <p style="color:#94a3b8; margin:0 0 8px;">Nomor Tujuan</p>
                    <h3 id="nomor-ewallet" style="color:white; margin:0 0 12px;"></h3>

                    <p style="color:#94a3b8; margin:0 0 8px;">Atas Nama</p>
                    <h3 style="color:white; margin:0;">AW Store</h3>
                </div>
            </div>

            <div id="cod-info" style="display:none; background:#020617; border:1px solid #334155; border-radius:15px; padding:18px; margin-bottom:18px;">

    <h3 style="color:#facc15; margin-top:0;">
        Instruksi COD
    </h3>

    <p style="color:#cbd5e1;">
        Silakan siapkan uang tunai sebesar:
    </p>

    <h2 style="color:#facc15;">
        Rp {{ number_format($total,0,',','.') }}
    </h2>

    <p style="color:#cbd5e1;">
        Pembayaran dilakukan saat barang diterima oleh pembeli.
        Pastikan nominal pembayaran sesuai dengan total transaksi.
    </p>

</div>

<div style="margin-bottom:25px;">

    <h3 style="color:#facc15;">Alamat Pengiriman</h3>
    
    <label>Nomor HP Pembeli</label>
     <input type="text"
       name="no_hp"
       placeholder="08xxxxxxxxx"
       required
       style="width:100%;padding:12px;margin-bottom:12px;">

    <label>Provinsi</label>
    <select id="provinsi" name="provinsi" style="width:100%;padding:12px;margin-bottom:12px;">
        <option value="">Pilih Provinsi</option>
    </select>

    <label>Kabupaten / Kota</label>
    <select id="kabupaten" name="kabupaten" style="width:100%;padding:12px;margin-bottom:12px;">
        <option value="">Pilih Kabupaten</option>
    </select>

    <label>Kecamatan</label>
    <select id="kecamatan" name="kecamatan" style="width:100%;padding:12px;margin-bottom:12px;">
        <option value="">Pilih Kecamatan</option>
    </select>

    <label>Desa / Kelurahan</label>
    <select id="desa" name="desa" style="width:100%;padding:12px;margin-bottom:12px;">
        <option value="">Pilih Desa</option>
    </select>

    <label>Alamat Lengkap</label>
    <textarea
        name="alamat_lengkap"
        style="width:100%;height:90px;padding:12px;"
        placeholder="Jalan, RT/RW, Nomor Rumah"></textarea>

</div>

            <button type="submit"
                    style="background:#facc15; color:#020617; border:none; padding:15px 30px; border-radius:12px; font-size:17px; font-weight:bold; cursor:pointer;">
                Konfirmasi Pembayaran
            </button>

            <a href="{{ route('carts.index') }}"
               style="display:inline-block; margin-left:15px; color:white; text-decoration:none; font-weight:bold;">
                Kembali ke Keranjang
            </a>
        </form>

    </div>

</div>

<script>
function tampilMetode() {
    document.getElementById('bank-info').style.display = 'none';
    document.getElementById('qris-info').style.display = 'none';
    document.getElementById('ewallet-info').style.display = 'none';
    document.getElementById('cod-info').style.display = 'none';

    document.getElementById('detail-bank').style.display = 'none';
    document.getElementById('detail-ewallet').style.display = 'none';

    document.getElementById('pilih-bank').value = '';
    document.getElementById('pilih-ewallet').value = '';

    let metode = document.querySelector('input[name="metode"]:checked');

    if (!metode) return;

    if (metode.value === 'Transfer Bank') {
        document.getElementById('bank-info').style.display = 'block';
    }

    if (metode.value === 'QRIS') {
        document.getElementById('qris-info').style.display = 'block';
    }

    if (metode.value === 'E-Wallet') {
        document.getElementById('ewallet-info').style.display = 'block';
    }

    if (metode.value === 'COD') {
        document.getElementById('cod-info').style.display = 'block';
    }
}

function tampilBankDetail() {
    let bank = document.getElementById('pilih-bank').value;
    let detail = document.getElementById('detail-bank');
    let namaBank = document.getElementById('nama-bank');
    let nomorRekening = document.getElementById('nomor-rekening');

    if (bank === '') {
        detail.style.display = 'none';
        return;
    }

    let rekening = {
        'BRI': '1234567890',
        'BCA': '9876543210',
        'Mandiri': '111222333',
        'BNI': '444555666'
    };

    namaBank.innerText = bank;
    nomorRekening.innerText = rekening[bank];

    detail.style.display = 'block';
}

function tampilEwalletDetail() {
    let ewallet = document.getElementById('pilih-ewallet').value;
    let detail = document.getElementById('detail-ewallet');
    let nama = document.getElementById('nama-ewallet');
    let nomor = document.getElementById('nomor-ewallet');

    if (ewallet === '') {
        detail.style.display = 'none';
        return;
    }

    let data = {
        'DANA': '081234567890',
        'OVO': '081234567891',
        'GoPay': '081234567892',
        'ShopeePay': '081234567893'
    };

    nama.innerText = ewallet;
    nomor.innerText = data[ewallet];

    detail.style.display = 'block';
}

document.addEventListener('DOMContentLoaded', function () {
    let provinsi = document.getElementById('provinsi');
    let kabupaten = document.getElementById('kabupaten');
    let kecamatan = document.getElementById('kecamatan');
    let desa = document.getElementById('desa');

    fetch('/provinces')
        .then(res => res.json())
        .then(data => {
            data.forEach(item => {
              provinsi.innerHTML += "<option value='" + item.nama + "' data-kode='" + item.kode + "'>" + item.nama + "</option>";
            });
        });

    provinsi.onchange = function () {
        let kode = this.options[this.selectedIndex].dataset.kode;

        kabupaten.innerHTML = '<option value="">Pilih Kabupaten</option>';
        kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
        desa.innerHTML = '<option value="">Pilih Desa</option>';

        if (!kode) return;

        fetch('/regencies/' + kode)
            .then(res => res.json())
            .then(data => {
                data.forEach(item => {
                    kabupaten.innerHTML += "<option value='" + item.nama + "' data-kode='" + item.kode + "'>" + item.nama + "</option>";
                });
            });
    };

    kabupaten.onchange = function () {
        let kode = this.options[this.selectedIndex].dataset.kode;

        kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
        desa.innerHTML = '<option value="">Pilih Desa</option>';

        if (!kode) return;

        fetch('/districts/' + kode)
            .then(res => res.json())
            .then(data => {
                data.forEach(item => {
                    kecamatan.innerHTML += "<option value='" + item.nama + "' data-kode='" + item.kode + "'>" + item.nama + "</option>";
                });
            });
    };

    kecamatan.onchange = function () {
        let kode = this.options[this.selectedIndex].dataset.kode;

        desa.innerHTML = '<option value="">Pilih Desa</option>';

        if (!kode) return;

        fetch('/villages/' + kode)
            .then(res => res.json())
            .then(data => {
                data.forEach(item => {
                    desa.innerHTML += "<option value='" + item.nama + "'>" + item.nama + "</option>";
                });
            });
    };
});
</script>

</body>
</html>