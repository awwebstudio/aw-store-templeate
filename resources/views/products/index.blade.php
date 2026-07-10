<x-app-layout>

<div style="background:#020617; min-height:100vh; font-family:Arial, sans-serif; color:white;">

    {{-- NAVBAR ADMIN --}}
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

        <section style="background:linear-gradient(135deg,#111827,#1e3a8a); padding:40px; border-radius:24px; margin-bottom:30px; box-shadow:0 12px 35px rgba(0,0,0,.45);">

            <div style="display:flex; justify-content:space-between; align-items:center; gap:20px; flex-wrap:wrap;">

                <div>
                    <p style="color:#facc15; font-weight:bold; letter-spacing:2px; margin:0 0 10px;">
                        ADMIN PANEL
                    </p>

                    <h1 style="font-size:48px; margin:0; color:white;">
                        Kelola Produk AW Store
                    </h1>

                    <p style="color:#cbd5e1; font-size:17px; margin-top:12px;">
                        Tambah, edit, dan hapus produk gitar yang tersedia di toko.
                    </p>
                </div>

                <img src="{{ asset('images/aw-logo.jpeg') }}"
                     style="width:110px; height:110px; border-radius:50%; object-fit:cover; border:3px solid #facc15; box-shadow:0 0 25px rgba(250,204,21,.6);">

            </div>

        </section>

        <div style="display:flex; gap:20px; flex-wrap:wrap; margin-bottom:25px; align-items:center;">

            <div style="background:#0f172a; color:white; padding:20px 25px; border-radius:18px; border:1px solid #1e293b; min-width:220px;">
                <p style="color:#94a3b8; margin:0 0 8px;">
                     Total Produk
                </p>

                <h2 style="font-size:38px; color:#facc15; margin:0;">
                    {{ $products->count() }}
                </h2>
            </div>

            <a href="{{ route('products.create') }}"
               style="display:inline-block; background:#22c55e; color:white; padding:14px 22px; border-radius:12px; text-decoration:none; font-weight:bold;">
                + Tambah Produk
            </a>

        </div>

        <div style="display:flex; flex-wrap:wrap; gap:25px;">

            @foreach($products as $product)

                <div style="width:270px; background:#0f172a; border-radius:20px; padding:18px; border:1px solid #1e293b; box-shadow:0 8px 25px rgba(0,0,0,.35);">

                    @if($product->gambar)
                        <img src="{{ asset('images/' . $product->gambar) }}"
                             style="width:100%; height:210px; object-fit:contain; background:#111827; border-radius:15px;">
                    @endif

                    <h3 style="font-size:20px; margin:18px 0 8px; color:white;">
                        {{ $product->nama_produk }}
                    </h3>

                    <p style="color:#facc15; font-size:23px; font-weight:bold; margin:0 0 10px;">
                        Rp {{ number_format($product->harga,0,',','.') }}
                    </p>

                    <p style="color:#cbd5e1;">
                        <strong>Stok:</strong> {{ $product->stok }}
                    </p>

                    <p style="color:#94a3b8; min-height:55px;">
                        {{ $product->deskripsi }}
                    </p>

                    <div style="display:flex; gap:10px; margin-top:15px;">

                        <a href="{{ route('products.edit', $product->id) }}"
                           style="flex:1; background:#2563eb; color:white; padding:10px; border-radius:10px; text-decoration:none; text-align:center; font-weight:bold;">
                            Edit
                        </a>

                        <form action="{{ route('products.destroy', $product->id) }}"
                              method="POST"
                              style="flex:1;"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    style="width:100%; background:#dc2626; color:white; border:none; padding:10px; border-radius:10px; cursor:pointer; font-weight:bold;">
                                Hapus
                            </button>

                        </form>

                    </div>

                </div>

            @endforeach

        </div>

        
    </div>

    <footer style="text-align:center; padding:25px; color:#94a3b8; border-top:1px solid #1e293b; margin-top:40px;">
        AW Store | Guitar & Music Gear
    </footer>

</div>

</x-app-layout>