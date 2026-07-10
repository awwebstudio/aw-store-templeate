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

        {{-- HEADER --}}
        <section style="background:linear-gradient(135deg,#111827,#1e3a8a); padding:40px; border-radius:24px; margin-bottom:30px; box-shadow:0 12px 35px rgba(0,0,0,.45); display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px;">

            <div>
                <p style="color:#facc15; font-weight:bold; letter-spacing:2px; margin:0 0 10px;">
                    ADMIN PANEL
                </p>

                <h1 style="font-size:44px; margin:0; color:white;">
                    Edit Produk
                </h1>

                <p style="color:#cbd5e1; font-size:17px; margin-top:12px;">
                    Perbarui informasi produk yang tersedia di AW Store.
                </p>
            </div>

            <img src="{{ asset('images/aw-logo.jpeg') }}"
                 style="width:110px; height:110px; border-radius:50%; object-fit:cover; border:3px solid #facc15;">
        </section>

        {{-- FORM --}}
        <div style="max-width:850px; margin:auto; background:#0f172a; padding:30px; border-radius:22px; border:1px solid #1e293b; box-shadow:0 8px 25px rgba(0,0,0,.35);">

            <form action="{{ route('products.update', $product->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <label style="color:#facc15;font-weight:bold;">
                    Nama Produk
                </label>

                <input type="text"
                       name="nama_produk"
                       value="{{ $product->nama_produk }}"
                       required
                       style="width:100%;padding:13px;margin-top:8px;margin-bottom:18px;border:1px solid #334155;border-radius:10px;background:#020617;color:white;">

                <label style="color:#facc15;font-weight:bold;">
                    Harga
                </label>

                <input type="number"
                       name="harga"
                       value="{{ $product->harga }}"
                       required
                       style="width:100%;padding:13px;margin-top:8px;margin-bottom:18px;border:1px solid #334155;border-radius:10px;background:#020617;color:white;">

                <label style="color:#facc15;font-weight:bold;">
                    Stok
                </label>

                <input type="number"
                       name="stok"
                       value="{{ $product->stok }}"
                       required
                       style="width:100%;padding:13px;margin-top:8px;margin-bottom:18px;border:1px solid #334155;border-radius:10px;background:#020617;color:white;">

                <label style="color:#facc15;font-weight:bold;">
                    Deskripsi Produk
                </label>

                <textarea name="deskripsi"
                          rows="4"
                          required
                          style="width:100%;padding:13px;margin-top:8px;margin-bottom:18px;border:1px solid #334155;border-radius:10px;background:#020617;color:white;">{{ $product->deskripsi }}</textarea>

                <label style="color:#facc15;font-weight:bold;">
                    Gambar Saat Ini
                </label>

                <input type="text"
                       value="{{ $product->gambar }}"
                       readonly
                       style="width:100%;padding:13px;margin-top:8px;margin-bottom:12px;border:1px solid #334155;border-radius:10px;background:#020617;color:white;">

                @if($product->gambar)
                    <img src="{{ asset('images/' . $product->gambar) }}"
                         style="width:160px; height:160px; object-fit:contain; background:#111827; border-radius:14px; margin-bottom:18px; border:1px solid #334155;">
                @endif

                <label style="color:#facc15;font-weight:bold;">
                    Ganti Gambar Produk
                </label>

                <input type="file"
                       name="gambar"
                       accept="image/*"
                       style="width:100%;padding:13px;margin-top:8px;margin-bottom:22px;border:1px solid #334155;border-radius:10px;background:#020617;color:white;">

                <button type="submit"
                        style="width:100%;background:#2563eb;color:white;border:none;padding:14px;border-radius:12px;font-size:16px;font-weight:bold;cursor:pointer;">
                    Update Produk
                </button>

            </form>

            <div style="text-align:center;margin-top:20px;">
                <a href="{{ route('products.index') }}"
                   style="background:#facc15;color:#020617;padding:12px 25px;border-radius:10px;text-decoration:none;font-weight:bold;">
                    ← Kembali ke Kelola Produk
                </a>
            </div>

        </div>

    </div>

    <footer style="text-align:center;padding:25px;color:#94a3b8;border-top:1px solid #1e293b;margin-top:40px;">
        AW Store | Musik & Gear
    </footer>

</div>

</x-app-layout>