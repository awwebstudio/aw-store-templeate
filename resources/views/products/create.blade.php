<x-app-layout>

<div style="background:#020617; min-height:100vh; font-family:Arial, sans-serif; color:white;">

    {{-- NAVBAR ADMIN --}}

    <nav style="
background:#020617;
padding:20px 45px;
display:flex;
justify-content:flex-end;
align-items:center;
border-bottom:1px solid #1e293b;
">

    <a href="{{ route('dashboard') }}"
    style="
    padding:12px 20px;
    border:2px solid #facc15;
    border-radius:10px;
    color:white;
    text-decoration:none;
    font-weight:bold;
    transition:.3s;
    "
    onmouseover="this.style.background='#facc15';this.style.color='#020617';"
    onmouseout="this.style.background='transparent';this.style.color='white';">
        ← Dashboard
    </a>

</nav>

    <div style="padding:35px 45px;">

        <section style="background:linear-gradient(135deg,#111827,#1e3a8a); padding:40px; border-radius:24px; margin-bottom:30px; box-shadow:0 12px 35px rgba(0,0,0,.45); display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px;">

            <div>
                <p style="color:#facc15; font-weight:bold; letter-spacing:2px; margin:0 0 10px;">
                    ADMIN PANEL
                </p>

                <h1 style="font-size:44px; margin:0; color:white;">
                    Tambah Produk Baru
                </h1>

                <p style="color:#cbd5e1; font-size:17px; margin-top:12px;">
                    Masukkan data produk baru untuk ditampilkan di AW Store.
                </p>
            </div>

            <img src="{{ asset('images/aw-logo.jpeg') }}"
                 style="width:110px; height:110px; border-radius:50%; object-fit:cover; border:3px solid #facc15; box-shadow:0 0 25px rgba(250,204,21,.6);">

        </section>

        <div style="max-width:800px; margin:0 auto; background:#0f172a; padding:30px; border-radius:22px; border:1px solid #1e293b; box-shadow:0 8px 25px rgba(0,0,0,.35);">

            <form action="{{ route('products.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <label style="font-weight:bold; color:#facc15;">Nama Produk</label>
                <input type="text"
                       name="nama_produk"
                       required
                       style="width:100%; padding:13px; margin-top:8px; margin-bottom:18px; border:1px solid #334155; border-radius:10px; background:#020617; color:white;">

                <label style="font-weight:bold; color:#facc15;">Harga</label>
                <input type="number"
                       name="harga"
                       required
                       style="width:100%; padding:13px; margin-top:8px; margin-bottom:18px; border:1px solid #334155; border-radius:10px; background:#020617; color:white;">

                <label style="font-weight:bold; color:#facc15;">Stok</label>
                <input type="number"
                       name="stok"
                       required
                       style="width:100%; padding:13px; margin-top:8px; margin-bottom:18px; border:1px solid #334155; border-radius:10px; background:#020617; color:white;">

                <label style="font-weight:bold; color:#facc15;">Deskripsi Produk</label>
                <textarea name="deskripsi"
                          rows="4"
                          required
                          style="width:100%; padding:13px; margin-top:8px; margin-bottom:18px; border:1px solid #334155; border-radius:10px; background:#020617; color:white;"></textarea>

                <label style="font-weight:bold; color:#facc15;">Upload Gambar Produk</label>
                <input type="file"
                       name="gambar"
                       accept="image/*"
                       style="width:100%; padding:13px; margin-top:8px; margin-bottom:22px; border:1px solid #334155; border-radius:10px; background:#020617; color:white;">

                <button type="submit"
                        style="width:100%; background:#22c55e; color:white; border:none; padding:14px; border-radius:12px; font-size:16px; font-weight:bold; cursor:pointer;">
                    💾 Simpan Produk
                </button>

            </form>

            <div style="text-align:center; margin-top:25px;">
                <a href="{{ route('products.index') }}"
                   style="background:#facc15; color:#020617; padding:12px 25px; border-radius:10px; text-decoration:none; font-weight:bold;">
                    ← Kembali ke Kelola Produk
                </a>
            </div>

        </div>

    </div>

    <footer style="text-align:center; padding:25px; color:#94a3b8; border-top:1px solid #1e293b; margin-top:40px;">
        AW Store | Musik & Gear
    </footer>

</div>

</x-app-layout>