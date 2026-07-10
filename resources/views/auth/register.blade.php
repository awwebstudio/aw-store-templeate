<!DOCTYPE html>
<html>
<head>
    <title>Register Admin - AW Store</title>
</head>

<body style="margin:0; background:linear-gradient(135deg,#020617,#0f172a,#1e3a8a); min-height:100vh; display:flex; justify-content:center; align-items:center; font-family:Arial,sans-serif; padding:30px;">

<div style="width:100%; max-width:500px; background:#0f172a; padding:35px; border-radius:24px; border:1px solid #1e293b; box-shadow:0 15px 40px rgba(0,0,0,.55);">

    <div style="text-align:center; margin-bottom:25px;">
        <img src="{{ asset('images/aw-logo.jpeg') }}"
             style="width:110px; height:110px; border-radius:50%; object-fit:cover; border:3px solid #facc15; box-shadow:0 0 25px rgba(250,204,21,.6);">

        <h1 style="color:#facc15; font-size:32px; margin:15px 0 5px;">
            AW STORE
        </h1>

        <p style="color:#cbd5e1; margin:0;">
            Daftar akun admin baru
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label style="color:#facc15; font-weight:bold;">Nama</label>
        <input id="name"
               type="text"
               name="name"
               value="{{ old('name') }}"
               required
               autofocus
               autocomplete="name"
               style="width:100%; padding:13px; margin-top:8px; margin-bottom:15px; border:1px solid #334155; border-radius:10px; background:#020617; color:white; box-sizing:border-box;">

        <x-input-error :messages="$errors->get('name')" class="mt-2" />

        <label style="color:#facc15; font-weight:bold;">Email</label>
        <input id="email"
               type="email"
               name="email"
               value="{{ old('email') }}"
               required
               autocomplete="username"
               style="width:100%; padding:13px; margin-top:8px; margin-bottom:15px; border:1px solid #334155; border-radius:10px; background:#020617; color:white; box-sizing:border-box;">

        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <label style="color:#facc15; font-weight:bold;">Password</label>
        <input id="password"
               type="password"
               name="password"
               required
               autocomplete="new-password"
               style="width:100%; padding:13px; margin-top:8px; margin-bottom:15px; border:1px solid #334155; border-radius:10px; background:#020617; color:white; box-sizing:border-box;">

        <x-input-error :messages="$errors->get('password')" class="mt-2" />

        <label style="color:#facc15; font-weight:bold;">Konfirmasi Password</label>
        <input id="password_confirmation"
               type="password"
               name="password_confirmation"
               required
               autocomplete="new-password"
               style="width:100%; padding:13px; margin-top:8px; margin-bottom:22px; border:1px solid #334155; border-radius:10px; background:#020617; color:white; box-sizing:border-box;">

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

        <button type="submit"
                style="width:100%; background:#facc15; color:#020617; border:none; padding:14px; border-radius:12px; font-weight:bold; cursor:pointer; font-size:16px;">
            Daftar Sekarang
        </button>

        <div style="display:flex; justify-content:space-between; margin-top:20px; font-size:14px;">
            <a href="{{ route('login') }}"
               style="color:#facc15; text-decoration:none;">
                Sudah punya akun? Login
            </a>

            <a href="{{ route('admin.welcome') }}"
               style="color:#cbd5e1; text-decoration:none;">
                ← Halaman Admin
            </a>
        </div>
    </form>

</div>

</body>
</html>