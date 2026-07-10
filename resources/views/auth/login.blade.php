<!DOCTYPE html>
<html>
<head>
    <title>Login Admin - AW Store</title>
</head>

<body style="margin:0; background:linear-gradient(135deg,#020617,#0f172a,#1e3a8a); min-height:100vh; display:flex; justify-content:center; align-items:center; font-family:Arial,sans-serif;">

<div style="width:420px; background:#0f172a; padding:35px; border-radius:22px; border:1px solid #1e293b; box-shadow:0 15px 40px rgba(0,0,0,.55);">

    <div style="text-align:center; margin-bottom:25px;">
        <img src="{{ asset('images/aw-logo.jpeg') }}"
             style="width:105px; height:105px; border-radius:50%; object-fit:cover; border:3px solid #facc15; box-shadow:0 0 25px rgba(250,204,21,.6);">

        <h1 style="color:#facc15; font-size:32px; margin:15px 0 5px;">
            AW STORE
        </h1>

        <p style="color:#cbd5e1; margin:0;">
            Login Admin Panel
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label style="color:#facc15; font-weight:bold;">Email</label>
        <input id="email"
               type="email"
               name="email"
               value="{{ old('email') }}"
               required
               autofocus
               autocomplete="username"
               style="width:100%; padding:13px; margin-top:8px; margin-bottom:18px; border:1px solid #334155; border-radius:10px; background:#020617; color:white; box-sizing:border-box;">

        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <label style="color:#facc15; font-weight:bold;">Password</label>
        <input id="password"
               type="password"
               name="password"
               required
               autocomplete="current-password"
               style="width:100%; padding:13px; margin-top:8px; margin-bottom:15px; border:1px solid #334155; border-radius:10px; background:#020617; color:white; box-sizing:border-box;">

        <x-input-error :messages="$errors->get('password')" class="mt-2" />

        <div style="margin-bottom:20px;">
            <label for="remember_me" style="color:#cbd5e1; font-size:14px;">
                <input id="remember_me" type="checkbox" name="remember">
                Remember me
            </label>
        </div>

        <button type="submit"
                style="width:100%; background:#facc15; color:#020617; border:none; padding:14px; border-radius:12px; font-weight:bold; cursor:pointer; font-size:16px;">
            Login
        </button>

        <div style="display:flex; justify-content:space-between; margin-top:20px; font-size:14px;">
            <a href="{{ route('register') }}" style="color:#facc15; text-decoration:none;">
                Daftar akun
            </a>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" style="color:#cbd5e1; text-decoration:none;">
                    Lupa password?
                </a>
            @endif
        </div>
    </form>

    <div style="text-align:center; margin-top:25px;">
        <a href="{{ route('admin.welcome') }}"
           style="color:#94a3b8; text-decoration:none;">
            ← Kembali ke Halaman Admin
        </a>
    </div>

</div>

</body>
</html>