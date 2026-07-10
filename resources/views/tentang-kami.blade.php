<!DOCTYPE html>
<html>
<head>
    <title>Tentang Kami - AW Store</title>
</head>

<body style="margin:0;background:#020617;color:white;font-family:Arial,sans-serif;">

<nav style="background:#020617;padding:14px 45px;display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid #1e293b;">
    <div style="display:flex;align-items:center;gap:14px;">
        <img src="{{ asset('images/aw-logo.jpeg') }}"
             style="width:55px;height:55px;border-radius:50%;object-fit:cover;border:2px solid #facc15;box-shadow:0 0 18px rgba(250,204,21,.5);">
        <span style="font-size:30px;font-weight:bold;color:#facc15;">AW STORE</span>
    </div>

    <a href="{{ route('beranda') }}"
       style="
padding:12px 22px;
border:2px solid #facc15;
border-radius:12px;
color:white;
text-decoration:none;
font-weight:bold;
transition:.3s;
"
onmouseover="this.style.background='#facc15';this.style.color='#020617';"
onmouseout="this.style.background='transparent';this.style.color='white';">
       ← Kembali ke Beranda
    </a>
</nav>

<div style="padding:45px;">

    <!-- HERO -->
    <section style="background:linear-gradient(135deg,#111827,#1e3a8a);padding:45px;border-radius:28px;box-shadow:0 15px 40px rgba(0,0,0,.55);display:flex;align-items:center;justify-content:space-between;gap:35px;flex-wrap:wrap;">

        <div style="flex:1;min-width:280px;">
            <p style="color:#facc15;font-weight:bold;letter-spacing:2px;margin:0 0 10px;">
                TENTANG KAMI
            </p>

            <h1 style="font-size:46px;margin:0 0 18px;color:white;">
                Tentang <span style="color:#facc15;">AW Store</span>
            </h1>

            <p style="line-height:1.8;color:#dbeafe;font-size:18px;margin-bottom:14px;">
                AW Store adalah toko online yang menyediakan gitar, bass,
                aksesoris musik, dan perlengkapan musik berkualitas dengan
                harga terjangkau.
            </p>

            <p style="line-height:1.8;color:#cbd5e1;font-size:17px;">
                Kami berkomitmen memberikan produk terbaik, pelayanan yang mudah,
                serta pengalaman belanja yang nyaman bagi seluruh pelanggan.
            </p>
        </div>

        <div style="width:260px;height:260px;border-radius:50%;background:#020617;display:flex;align-items:center;justify-content:center;border:4px solid #facc15;box-shadow:0 0 35px rgba(250,204,21,.6);">
            <img src="{{ asset('images/aw-logo.jpeg') }}"
                 style="width:220px;height:220px;border-radius:50%;object-fit:cover;
transition:.3s;
"
onmouseover="this.style.transform='scale(1.08)'"
onmouseout="this.style.transform='scale(1)'"
">
        </div>

    </section>

   <!-- KEUNGGULAN -->
<section style="margin-top:45px;text-align:center;">

    <p style="color:#facc15;font-weight:bold;letter-spacing:2px;margin-bottom:8px;">
        KENAPA MEMILIH AW STORE?
    </p>

    <h2 style="font-size:34px;margin:0 0 30px;">
        Kualitas Terbaik Untuk Musisi Sejati
    </h2>

    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;">

        <div
style="background:#0f172a;border:1px solid #334155;border-radius:18px;padding:28px;transition:.3s;cursor:pointer;"
onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 15px 30px rgba(250,204,21,.25)';this.style.borderColor='#facc15';"
onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none';this.style.borderColor='#334155';">

    <div style="font-size:38px;margin-bottom:12px;">🎸</div>
    <h3 style="color:#facc15;margin:0 0 10px;">Produk Berkualitas</h3>
    <p style="color:#cbd5e1;line-height:1.6;margin:0;">
        Produk original dengan kualitas terbaik.
    </p>

</div>

        
        <div
style="background:#0f172a;border:1px solid #334155;border-radius:18px;padding:28px;transition:.3s;cursor:pointer;"
onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 15px 30px rgba(250,204,21,.25)';this.style.borderColor='#facc15';"
onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none';this.style.borderColor='#334155';">

            <div style="font-size:38px;margin-bottom:12px;">💰</div>
            <h3 style="color:#facc15;margin:0 0 10px;">Harga Terjangkau</h3>
            <p style="color:#cbd5e1;line-height:1.6;margin:0;">Harga terbaik untuk semua kalangan.</p>
        </div>

        
        <div
style="background:#0f172a;border:1px solid #334155;border-radius:18px;padding:28px;transition:.3s;cursor:pointer;"
onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 15px 30px rgba(250,204,21,.25)';this.style.borderColor='#facc15';"
onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none';this.style.borderColor='#334155';">

            <div style="font-size:38px;margin-bottom:12px;">🚚</div>
            <h3 style="color:#facc15;margin:0 0 10px;">Pengiriman Cepat</h3>
            <p style="color:#cbd5e1;line-height:1.6;margin:0;">Pengiriman aman, cepat, dan rapi.</p>
        </div>

       
        <div
style="background:#0f172a;border:1px solid #334155;border-radius:18px;padding:28px;transition:.3s;cursor:pointer;"
onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 15px 30px rgba(250,204,21,.25)';this.style.borderColor='#facc15';"
onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none';this.style.borderColor='#334155';">

            <div style="font-size:38px;margin-bottom:12px;">🎧</div>
            <h3 style="color:#facc15;margin:0 0 10px;">Layanan Terpercaya</h3>
            <p style="color:#cbd5e1;line-height:1.6;margin:0;">Customer service siap membantu pelanggan.</p>
        </div>

    </div>
</section>


<!-- VISI MISI -->
<section style="margin-top:45px;background:#0f172a;border:1px solid #334155;border-radius:22px;padding:38px;box-shadow:0 10px 25px rgba(0,0,0,.35);">

    <p style="color:#facc15;font-weight:bold;letter-spacing:2px;text-align:center;margin:0 0 8px;">
        VISI & MISI
    </p>

    <h2 style="font-size:34px;text-align:center;margin:0 0 30px;">
        AW Store
    </h2>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:35px;">

        
        <div
style="background:#0f172a;border:1px solid #334155;border-radius:18px;padding:28px;transition:.3s;cursor:pointer;"
onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 15px 30px rgba(250,204,21,.25)';this.style.borderColor='#facc15';"
onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none';this.style.borderColor='#334155';">

            <h3 style="color:#facc15;font-size:24px;margin:0 0 15px;">🎯 Visi</h3>
            <p style="color:#cbd5e1;line-height:1.8;margin:0;">
                Menjadi toko alat musik online terpercaya yang menyediakan
                produk berkualitas dengan harga terbaik untuk seluruh pelanggan.
            </p>
        </div>

        
        <div
style="background:#0f172a;border:1px solid #334155;border-radius:18px;padding:28px;transition:.3s;cursor:pointer;"
onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 15px 30px rgba(250,204,21,.25)';this.style.borderColor='#facc15';"
onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none';this.style.borderColor='#334155';">

            <h3 style="color:#facc15;font-size:24px;margin:0 0 15px;">🚀 Misi</h3>
            <ul style="color:#cbd5e1;line-height:2;margin:0;padding-left:20px;">
                <li>Menyediakan produk original dan berkualitas.</li>
                <li>Memberikan pelayanan yang ramah dan profesional.</li>
                <li>Menawarkan harga yang kompetitif.</li>
                <li>Memberikan pengalaman belanja yang mudah, aman, dan nyaman.</li>
            </ul>
        </div>

    </div>

</section>

</div>

<footer style="text-align:center;padding:25px;color:#94a3b8;border-top:1px solid #1e293b;">
    © 2026 AW Store | Guitar & Music Gear
</footer>

</body>
</html>