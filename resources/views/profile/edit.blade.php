<x-app-layout>

<div style="background:#020617; min-height:100vh; font-family:Arial, sans-serif; color:white;">

    {{-- NAVBAR --}}
    <nav style="background:#020617; padding:12px 45px; display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid #1e293b;">
        

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

    </nav>

    <div style="padding:35px 45px;">

        {{-- HERO PROFILE --}}
        <section style="background:linear-gradient(135deg,#111827,#2563eb); padding:40px; border-radius:24px; margin-bottom:35px; box-shadow:0 12px 35px rgba(0,0,0,.45); display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap;">
            
            <div>
                <p style="color:#facc15; font-weight:bold; letter-spacing:2px; margin:0;">
                    PROFIL AKUN
                </p>

                <h1 style="font-size:48px; margin:10px 0; color:white;">
                    Pengaturan Profil
                </h1>

                <p style="color:#cbd5e1; font-size:17px; margin:0;">
                    Kelola informasi akun, ubah password, dan pengaturan akun AW Store.
                </p>
            </div>

            <img src="{{ asset('images/aw-logo.jpeg') }}"
                 style="width:120px; height:120px; border-radius:50%; border:4px solid #facc15; object-fit:cover; box-shadow:0 0 25px rgba(250,204,21,.6);">
        </section>

        <div style="display:grid; gap:25px;">

            {{-- INFORMASI PROFIL --}}
            <div style="background:#0f172a; padding:28px; border-radius:20px; border:1px solid #1e293b; box-shadow:0 8px 25px rgba(0,0,0,.35);">
                <h2 style="font-size:24px; color:#facc15; margin-top:0;">
                    Informasi Profil
                </h2>

                <div style="background:#ffffff; color:#111827; padding:25px; border-radius:18px; border:1px solid #e5e7eb; box-shadow:0 8px 25px rgba(0,0,0,.15);">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- UBAH PASSWORD --}}
            <div style="background:#0f172a; padding:28px; border-radius:20px; border:1px solid #1e293b; box-shadow:0 8px 25px rgba(0,0,0,.35);">
                <h2 style="font-size:24px; color:#facc15; margin-top:0;">
                    Ubah Password
                </h2>

                <div style="background:#ffffff; color:#111827; padding:25px; border-radius:18px; border:1px solid #e5e7eb; box-shadow:0 8px 25px rgba(0,0,0,.15);">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- HAPUS AKUN --}}
            <div style="background:#0f172a; padding:28px; border-radius:20px; border:1px solid #1e293b; box-shadow:0 8px 25px rgba(0,0,0,.35);">
                <h2 style="font-size:24px; color:#facc15; margin-top:0;">
                    Hapus Akun
                </h2>

                <div style="background:#ffffff; color:#111827; padding:25px; border-radius:18px; border:1px solid #e5e7eb; box-shadow:0 8px 25px rgba(0,0,0,.15);">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

    <footer style="text-align:center; padding:25px; color:#94a3b8; border-top:1px solid #1e293b; margin-top:40px;">
        AW Store | Music & Gear
    </footer>

</div>

</x-app-layout>