<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Pengaturan</title>
</head>

<body style="margin:0;background:#020617;color:white;font-family:Arial,sans-serif;">

<div style="max-width:900px;margin:auto;padding:35px;">

<a href="{{ route('admin.pengaturan') }}"
style="
display:inline-block;
padding:12px 20px;
border:2px solid #facc15;
border-radius:10px;
color:white;
text-decoration:none;
font-weight:bold;
margin-bottom:25px;">
← Kembali
</a>

<h1 style="font-size:40px;margin-bottom:10px;">
✏️ Edit Pengaturan Toko
</h1>

<p style="color:#94a3b8;margin-bottom:30px;">
Perbarui informasi toko AW Store.
</p>

<form action="{{ route('admin.pengaturan.update') }}" method="POST">

@csrf

<div style="background:#111827;padding:30px;border-radius:20px;border:1px solid #334155;">

<label>🏪 Nama Toko</label>

<input type="text"
name="nama_toko"
value="{{ $setting->nama_toko }}"
style="width:100%;padding:12px;margin:10px 0 20px;background:#020617;color:white;border:1px solid #334155;border-radius:10px;">

<label>📧 Email Toko</label>

<input type="email"
name="email_toko"
value="{{ $setting->email_toko }}"
style="width:100%;padding:12px;margin:10px 0 20px;background:#020617;color:white;border:1px solid #334155;border-radius:10px;">

<label>📱 Nomor WhatsApp</label>

<input type="text"
name="no_wa"
value="{{ $setting->no_wa }}"
style="width:100%;padding:12px;margin:10px 0 20px;background:#020617;color:white;border:1px solid #334155;border-radius:10px;">

<label>📍 Alamat</label>

<textarea
name="alamat"
rows="3"
style="width:100%;padding:12px;margin:10px 0 20px;background:#020617;color:white;border:1px solid #334155;border-radius:10px;">{{ $setting->alamat }}</textarea>

<label>📝 Deskripsi</label>

<textarea
name="deskripsi"
rows="5"
style="width:100%;padding:12px;margin:10px 0 20px;background:#020617;color:white;border:1px solid #334155;border-radius:10px;">{{ $setting->deskripsi }}</textarea>

<button
type="submit"
style="
background:#facc15;
color:#020617;
padding:14px 25px;
border:none;
border-radius:12px;
font-weight:bold;
cursor:pointer;">
💾 Simpan Perubahan
</button>

</div>

</form>

</div>

</body>
</html>