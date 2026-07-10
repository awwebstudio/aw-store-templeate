<!DOCTYPE html>
<html>
<head>
    <title>Profil Pembeli</title>
</head>

<body style="margin:0; background:#020617; font-family:Arial,sans-serif; color:white;">

<div style="max-width:850px; margin:50px auto; background:#111827; padding:35px; border-radius:22px;">

    <div style="text-align:center;">
        <div style="font-size:75px;">👤</div>
        <h1 style="color:#facc15; margin-bottom:5px;">{{ Auth::user()->name }}</h1>
        <p style="color:#cbd5e1;">{{ Auth::user()->email }}</p>
        <p style="color:#94a3b8;">Akun Pembeli AW Store</p>
    </div>

   
<h2 style="color:#facc15; margin-bottom:20px;">
    Informasi Akun
</h2>

<form action="{{ route('profil.pembeli.update') }}" method="POST">
    @csrf
    @method('PATCH')

    <label style="color:white;">Nama</label>
    <input type="text"
           name="name"
           value="{{ Auth::user()->name }}"
           style="width:100%;
                  padding:12px;
                  margin:8px 0 18px;
                  border:none;
                  border-radius:10px;">

    <label style="color:white;">Email</label>
    <input type="email"
           name="email"
           value="{{ Auth::user()->email }}"
           style="width:100%;
                  padding:12px;
                  margin:8px 0 25px;
                  border:none;
                  border-radius:10px;">

    <button type="submit"
            style="background:#facc15;
                   color:#020617;
                   padding:12px 28px;
                   border:none;
                   border-radius:10px;
                   font-weight:bold;
                   cursor:pointer;">
        Simpan Perubahan
    </button>
</form>

    <hr style="margin:35px 0; border-color:#334155;">
<h2 style="color:#facc15;">Ubah Password</h2>

<div>
    <label>Password Lama</label><br>
    <input type="password"
           style="width:100%;padding:12px;margin:10px 0;border-radius:10px;border:none;"><br>

    <label>Password Baru</label><br>
    <input type="password"
           style="width:100%;padding:12px;margin:10px 0;border-radius:10px;border:none;"><br>

    <label>Konfirmasi Password Baru</label><br>
    <input type="password"
           style="width:100%;padding:12px;margin:10px 0;border-radius:10px;border:none;"><br>

    <button type="button"
        onclick="alert('Fitur ubah password sedang dalam pengembangan.')"
        style="background:#2563eb;color:white;padding:12px 25px;border:none;border-radius:10px;font-weight:bold;cursor:pointer;">
        Ubah Password
    </button>


</div>

<hr style="border-color:#334155; margin:30px 0;">

<a href="{{ route('beranda') }}"
   style="display:block; text-align:center; background:#facc15; color:#020617; text-decoration:none; padding:13px; border-radius:12px; font-weight:bold;">
    ← Kembali ke Beranda
</a>

</body>
</html>