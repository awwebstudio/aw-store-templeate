<div style="background:#020617; min-height:100vh; font-family:Arial, sans-serif; color:white;">

    {{-- NAVBAR PEMBELI --}}
    <nav style="background:#020617; padding:12px 45px; display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid #1e293b;">


        <div style="display:flex; align-items:center; gap:12px;">
            <img src="{{ asset('images/aw-logo.jpeg') }}"
                 style="width:42px; height:42px; border-radius:50%; object-fit:cover;">

            <span style="font-size:28px; font-weight:bold; color:#facc15;">
                AW STORE
            </span>
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

    <div style="padding:35px 45px;">


        @if(session('success'))
            <div id="notif-success"
                 style="background:#16a34a; color:white; padding:15px; border-radius:12px; margin-bottom:20px; font-weight:bold; text-align:center;">
                ✅ {{ session('success') }}
            </div>

            <script>
                setTimeout(() => {
                    const notif = document.getElementById('notif-success');
                    if (notif) notif.remove();
                }, 3000);
            </script>
        @endif

        {{-- HEADER --}}
        <section style="background:linear-gradient(135deg,#111827,#1e3a8a); padding:35px 40px; border-radius:24px; margin-bottom:35px; box-shadow:0 12px 35px rgba(0,0,0,.45);">

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

        {{-- PRODUK --}}
        <div style="display:flex; gap:20px; flex-wrap:wrap; justify-content:center; align-items:stretch;">

           @foreach($products as $product)

                <div style="width:250px; background:#0f172a; border-radius:18px; padding:14px; border:1px solid #1e293b; box-shadow:0 8px 20px rgba(0,0,0,.35); position:relative; overflow:hidden; display:flex; flex-direction:column;">

                    <div style="position:absolute; top:10px; left:10px; background:#ef4444; color:white; padding:5px 10px; border-radius:8px; font-size:11px; font-weight:bold; z-index:2;">
                        DISKON 10%
                    </div>

                    @if($product->gambar)
                        <img src="{{ asset('images/' . $product->gambar) }}"
                             style="width:100%; height:120px; object-fit:contain; border-radius:12px; background:#111827;">
                    @else
                        <div style="width:100%; height:120px; border-radius:12px; background:#111827; display:flex; align-items:center; justify-content:center; color:#94a3b8; font-size:13px;">
                            Tidak ada gambar
                        </div>
                    @endif

                    <div style="margin-top:8px; color:#facc15; font-size:12px;">
                        ⭐⭐⭐⭐⭐ (4,9)
                    </div>

                    <h3 style="color:white; font-size:17px; font-weight:900; margin:8px 0; min-height:42px;">
                        {{ $product->nama_produk }}
                    </h3>

                    <p style="color:#94a3b8; text-decoration:line-through; font-size:13px; margin:0;">
                        Rp {{ number_format($product->harga + 500000,0,',','.') }}
                    </p>

                    <p style="color:#facc15; font-size:20px; font-weight:900; margin:4px 0;">
                        Rp {{ number_format($product->harga,0,',','.') }}
                    </p>

                    <p style="color:#cbd5e1; font-size:13px; margin:4px 0;">
                        Stok: {{ $product->stok }}
                    </p>

                    <p style="color:#94a3b8; font-size:12px; line-height:1.4; height:36px; overflow:hidden; margin:6px 0 12px;">
                        {{ Str::limit($product->deskripsi, 45) }}
                    </p>


                    <div style="display:flex; gap:10px; margin-top:auto;">

    @auth

        <form action="{{ route('carts.store') }}" method="POST" style="width:60%; margin:0;">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <button type="submit"
                    style="width:100%; height:45px; background:#22c55e; color:white; border:none; border-radius:12px; font-size:13px; font-weight:bold; cursor:pointer;">
                Keranjang
            </button>
        </form>

        <form action="{{ route('beli.langsung') }}" method="POST" style="width:40%; margin:0;">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <button type="submit"
                    style="width:100%; height:45px; background:#f97316; color:white; border:none; border-radius:12px; font-size:13px; font-weight:bold; cursor:pointer;">
                Beli
            </button>
        </form>

    @else

        <a href="{{ route('pembeli.login') }}" style="width:60%;">
            <button type="button"
                    style="width:100%; height:45px; background:#22c55e; color:white; border:none; border-radius:12px; font-size:13px; font-weight:bold; cursor:pointer;">
                Keranjang
            </button>
        </a>

        <a href="{{ route('pembeli.login') }}" style="width:40%;">
            <button type="button"
                    style="width:100%; height:45px; background:#f97316; color:white; border:none; border-radius:12px; font-size:13px; font-weight:bold; cursor:pointer;">
                Beli
            </button>
        </a>

   @endauth

</div>

                </div>

            @endforeach

        </div>

    </div>

    <footer style="text-align:center; padding:25px; color:#94a3b8; border-top:1px solid #1e293b; margin-top:40px;">
        AW Store | Guitar & Music Gear
    </footer>

</div>