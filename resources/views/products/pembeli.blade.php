<x-app-layout>

<div style="background:#020617; min-height:100vh; font-family:Arial, sans-serif; color:white;">

    {{-- NAVBAR PEMBELI --}}
<nav style="
background:#020617;
padding:16px 45px;
display:flex;
justify-content:space-between;
align-items:center;
border-bottom:1px solid #1e293b;
">

    <div style="display:flex;align-items:center;gap:12px;">
        <img src="{{ asset('images/aw-logo.jpeg') }}"
             style="width:42px;height:42px;border-radius:50%;object-fit:cover;">

        <span style="font-size:28px;font-weight:bold;color:#facc15;">
            AW STORE
        </span>
    </div>

    <div style="display:flex;align-items:center;gap:14px;">

        <a href="{{ route('dashboard') }}"
           style="color:white;text-decoration:none;font-weight:bold;">
            Home
        </a>

        <a href="{{ route('produk.pembeli') }}"
           style="color:#facc15;text-decoration:none;font-weight:bold;">
            Produk
        </a>

        <a href="{{ route('carts.index') }}"
           style="color:white;text-decoration:none;font-weight:bold;">
            Keranjang
        </a>

        <a href="{{ route('riwayat.pembelian') }}"
           style="color:white;text-decoration:none;font-weight:bold;">
            Riwayat
        </a>

        <a href="{{ route('profile.edit') }}"
           style="color:white;text-decoration:none;font-weight:bold;">
            Profil
        </a>

        <form method="POST" action="{{ route('logout') }}" style="margin:0;">
            @csrf
            <button type="submit"
                style="background:#dc2626;color:white;border:none;padding:10px 18px;border-radius:10px;font-weight:bold;cursor:pointer;">
                Logout
            </button>
        </form>

    </div>

</nav>

    <div style="padding:35px 45px;">

    @if(session('success'))
        <div style="
            background:#16a34a;
            color:white;
            padding:15px;
            border-radius:12px;
            margin-bottom:20px;
            font-weight:bold;
            text-align:center;
        ">
            ✅ {{ session('success') }}
        </div>
    @endif

        {{-- HEADER --}}
        <section style="background:linear-gradient(135deg,#111827,#1e3a8a); padding:35px 40px; border-radius:24px; margin-bottom:25px; box-shadow:0 12px 35px rgba(0,0,0,.45);">

            <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px;">

                <div>
                    <p style="color:#facc15; font-weight:bold; letter-spacing:2px; margin:0 0 10px;">
                        KATALOG PRODUK
                    </p>

                    <h1 style="font-size:46px; margin:0; color:white; font-weight:900;">
                        Produk AW Store
                    </h1>

                    <p style="color:#cbd5e1; font-size:17px; margin-top:12px;">
                        Pilih gitar favoritmu dan tambahkan ke keranjang.
                    </p>
                </div>

                <img src="{{ asset('images/aw-logo.jpeg') }}"
                     style="width:100px; height:100px; border-radius:50%; object-fit:cover; border:3px solid #facc15; box-shadow:0 0 25px rgba(250,204,21,.6);">

            </div>
        </section>

        @if(session('success'))
            <div style="background:#16a34a; color:white; padding:14px 18px; border-radius:12px; margin-bottom:20px; font-weight:bold;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('cart_success'))
            <div style="background:#2563eb; color:white; padding:14px 18px; border-radius:12px; margin-bottom:20px; font-weight:bold;">
                {{ session('cart_success') }}
            </div>
        @endif

        {{-- PRODUK --}}
        <div style="display:flex; gap:18px; flex-wrap:wrap; justify-content:center;">

            @foreach(App\Models\Product::all() as $product)

                <div style="width:240px; background:#0f172a; border-radius:18px; padding:12px; border:1px solid #1e293b; box-shadow:0 8px 20px rgba(0,0,0,.35); position:relative; overflow:hidden;">

                    {{-- DISKON --}}
                    <div style="position:absolute; top:10px; left:10px; background:#ef4444; color:white; padding:5px 10px; border-radius:8px; font-size:11px; font-weight:bold; z-index:2;">
                        DISKON 10%
                    </div>

                    {{-- GAMBAR --}}
                    @if($product->gambar)
                        <img src="{{ asset('images/' . $product->gambar) }}"
                             style="width:100%; height:110px; object-fit:contain; border-radius:12px; background:#111827;">
                    @endif

                    {{-- RATING --}}
                    <div style="margin-top:8px; color:#facc15; font-size:12px;">
                        ⭐⭐⭐⭐⭐
                    </div>

                    {{-- NAMA --}}
                    <h3 style="color:white; font-size:16px; font-weight:900; margin:8px 0;">
                        {{ $product->nama_produk }}
                    </h3>

                    {{-- HARGA CORET --}}
                    <p style="color:#94a3b8; text-decoration:line-through; font-size:13px; margin:0;">
                        Rp {{ number_format($product->harga + 500000,0,',','.') }}
                    </p>

                    {{-- HARGA --}}
                    <p style="color:#facc15; font-size:18px; font-weight:900; margin:4px 0;">
                        Rp {{ number_format($product->harga,0,',','.') }}
                    </p>

                    {{-- STOK --}}
                    <p style="color:#cbd5e1; font-size:13px; margin:4px 0;">
                        Stok: {{ $product->stok }}
                    </p>

                    {{-- DESKRIPSI --}}
                    <p style="color:#94a3b8; font-size:12px; line-height:1.4; height:34px; overflow:hidden; margin:6px 0 10px;">
                        {{ Str::limit($product->deskripsi, 45) }}
                    </p>

                    {{-- TOMBOL --}}
                    <div style="display:flex; gap:8px; margin-top:10px;">

                        {{-- MASUK KERANJANG --}}
                        <form action="{{ route('carts.store') }}" method="POST" style="width:50%;">
                            @csrf

                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <button type="submit"
                                    style="width:100%; background:#22c55e; color:white; padding:10px 5px; border:none; border-radius:10px; font-size:12px; font-weight:bold; cursor:pointer;">
                                Keranjang
                            </button>
                        </form>

                        {{-- BELI --}}
                       <form action="{{ route('beli.langsung') }}" method="POST" style="width:50%;">
    @csrf

    <input type="hidden" name="product_id" value="{{ $product->id }}">

    <button type="submit"
        style="width:100%; height:40px; background:#f97316; color:white; border:none; border-radius:10px; font-size:12px; font-weight:bold; cursor:pointer;">
        Beli
    </button>
</form>

                    </div>

                </div>

            @endforeach

        </div>

        <div style="text-align:center; margin-top:40px;">
            <a href="{{ route('dashboard') }}"
               style="background:#facc15; color:#020617; padding:12px 25px; border-radius:10px; text-decoration:none; font-weight:bold;">
                ← Kembali ke Dashboard
            </a>
        </div>

    </div>

    <footer style="text-align:center; padding:25px; color:#94a3b8; border-top:1px solid #1e293b; margin-top:40px;">
        AW Store | Guitar & Music Gear
    </footer>

</div>

</x-app-layout>