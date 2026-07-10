<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pembeli - AW Store</title>
</head>

<body style="margin:0; background:#020617; color:white; font-family:Arial,sans-serif;">

<div style="min-height:100vh; display:flex; align-items:center; justify-content:center; padding:30px;">

    <div style="background:#0f172a; padding:35px; border-radius:22px; width:420px; border:1px solid #1e293b;">

        <h1 style="color:#facc15; text-align:center;">Daftar Pembeli</h1>

        <p style="color:#cbd5e1; text-align:center;">
            Buat akun pembeli untuk melanjutkan pembelian.
        </p>

        <form method="POST" action="/register-pembeli">
            @csrf

            <label>Nama</label>
            <input type="text" name="name" required
                   style="width:100%; padding:12px; margin:8px 0 15px; border-radius:10px; border:none;">

            <label>Email</label>
            <input type="email" name="email" required
                   style="width:100%; padding:12px; margin:8px 0 15px; border-radius:10px; border:none;">

            <label>Password</label>
            <input type="password" name="password" required
                   style="width:100%; padding:12px; margin:8px 0 15px; border-radius:10px; border:none;">

            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required
                   style="width:100%; padding:12px; margin:8px 0 20px; border-radius:10px; border:none;">

            <button type="submit"
                    style="width:100%; background:#facc15; color:#020617; padding:13px; border:none; border-radius:12px; font-weight:bold;">
                Daftar Pembeli
            </button>
        </form>

        <p style="text-align:center; margin-top:20px;">
            Sudah punya akun?
            <a href="{{ route('pembeli.login') }}" style="color:#facc15; font-weight:bold;">
                Login Pembeli
            </a>
        </p>

        <div style="text-align:center;">
            <a href="{{ route('beranda') }}" style="color:#94a3b8; text-decoration:none;">
                ← Kembali ke Beranda
            </a>
        </div>

    </div>

</div>

</body>
</html>