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

    </nav>

    <div style="padding:35px 45px;">

        @if(session('cart_success'))
            <div id="notif-cart"
                 style="background:#16a34a;color:white;padding:15px;border-radius:12px;margin-bottom:20px;">
                {{ session('cart_success') }}
            </div>

            <script>
                setTimeout(function() {
                    let notif = document.getElementById('notif-cart');
                    if(notif){
                        notif.remove();
                    }
                }, 3000);
            </script>
        @endif

        @if(session('delete_success'))
            <div id="notif-delete"
                 style="background:#dc2626;color:white;padding:15px;border-radius:12px;margin-bottom:20px;">
                {{ session('delete_success') }}
            </div>

            <script>
                setTimeout(function() {
                    let notif = document.getElementById('notif-delete');
                    if(notif){
                        notif.remove();
                    }
                }, 3000);
            </script>
        @endif

        @if(session('success'))
            <div id="notif-success"
                 style="background:#16a34a;color:white;padding:15px;border-radius:12px;margin-bottom:15px;font-weight:bold;">
                ✅ {{ session('success') }}
            </div>

            <script>
                setTimeout(function() {
                    let notif = document.getElementById('notif-success');
                    if(notif){
                        notif.remove();
                    }
                }, 3000);
            </script>
        @endif

        <section style="background:linear-gradient(135deg,#111827,#1e3a8a); padding:40px; border-radius:24px; margin-bottom:35px; box-shadow:0 12px 35px rgba(0,0,0,.45);">

            <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px;">

                <div>
                    <p style="color:#facc15; font-weight:bold; letter-spacing:2px; margin:0 0 10px;">
                        KERANJANG BELANJA
                    </p>

                    <h1 style="font-size:48px; margin:0; color:white;">
                        Keranjang AW Store
                    </h1>

                    <p style="color:#cbd5e1; font-size:17px; margin-top:12px;">
                        Lihat produk yang sudah kamu tambahkan
                        ke Keranjang sebelum melakukan pembelian.
                    </p>
                    <a href="{{ route('beranda') }}"
                     style="
                     display:inline-block;
                     margin-top:15px;
                     background:#facc15;
                     color:#020617;
                     padding:10px 20px;
                     border-radius:10px;
                     text-decoration:none;
                     font-weight:bold;">
                   ← Kembali ke Beranda
                </a>

                </div>

                <img src="{{ asset('images/aw-logo.jpeg') }}"
                     style="width:110px; height:110px; border-radius:50%; object-fit:cover; border:3px solid #facc15; box-shadow:0 0 25px rgba(250,204,21,.6);">

            </div>

        </section>

        @php
            $total = 0;
        @endphp

        @forelse($carts as $cart)

            @php
                $product = $cart['product'];
                $jumlah = $cart['jumlah'];
                $cartId = $cart['id'];

                $subtotal = $product->harga * $jumlah;
                $total += $subtotal;
            @endphp

            <div style="background:#0f172a; padding:20px; margin-bottom:18px; border-radius:18px; border:1px solid #1e293b; box-shadow:0 8px 25px rgba(0,0,0,.35); display:flex; gap:22px; align-items:center;">

                @if($product->gambar)
                    <img src="{{ asset('images/' . $product->gambar) }}"
                         style="width:130px; height:130px; object-fit:contain; background:#111827; border-radius:14px;">
                @else
                    <div style="width:130px; height:130px; background:#111827; border-radius:14px; display:flex; align-items:center; justify-content:center; color:#94a3b8;">
                        Tidak ada gambar
                    </div>
                @endif

                <div style="flex:1;">
                    <h3 style="font-size:24px; margin:0 0 8px; color:white;">
                        {{ $product->nama_produk }}
                    </h3>

                    <p style="color:#cbd5e1; margin:5px 0;">
                        Harga: Rp {{ number_format($product->harga,0,',','.') }}
                    </p>

                    <p style="color:#cbd5e1; margin:5px 0;">
                        Jumlah: {{ $jumlah }}
                    </p>

                    <p style="color:#facc15; font-size:20px; font-weight:bold; margin:8px 0;">
                        Subtotal: Rp {{ number_format($subtotal,0,',','.') }}
                    </p>
                </div>

                <form action="{{ route('checkout.item', $cartId) }}" method="POST" style="display:inline;">
                    @csrf

                    <button type="submit"
                            style="background:#22c55e;color:white;border:none;padding:11px 16px;border-radius:10px;cursor:pointer;font-weight:bold;margin-right:8px;">
                        Beli
                    </button>
                </form>

                <form action="{{ route('checkout.item', $cartId) }}" method="POST">
    @csrf

    

<form action="/keranjang/kurang/{{ $cartId }}" method="POST">
    @csrf

    <button type="submit"
        style="background:#facc15;color:black;border:none;padding:10px 15px;border-radius:10px;">
        -1
    </button>
</form>

<form action="{{ route('carts.destroy', $cartId) }}"
      method="POST"
      onsubmit="return confirm('Hapus produk dari keranjang?')">
    @csrf
    @method('DELETE')

    <button type="submit"
        style="background:#dc2626;color:white;border:none;padding:10px 15px;border-radius:10px;">
        Hapus
    </button>
</form>

            </div>

        @empty

            <div style="background:#0f172a; padding:30px; border-radius:18px; border:1px solid #1e293b; box-shadow:0 8px 25px rgba(0,0,0,.35); margin-bottom:25px;">
                <h3 style="font-size:26px; margin:0 0 10px; color:white;">
                    Keranjang masih kosong.
                </h3>

                <p style="color:#cbd5e1;">
                    Silakan kembali ke katalog produk dan tambahkan produk terlebih dahulu.
                </p>

                <a href="/produk-pembeli"
                   style="display:inline-block; margin-top:18px; background:#facc15;color:#020617;padding:12px 22px;border-radius:10px;text-decoration:none;font-weight:bold;">
                    Lihat Produk
                </a>
            </div>

        @endforelse

        <div style="background:#0f172a; padding:25px; border-radius:18px; border:1px solid #1e293b; box-shadow:0 8px 25px rgba(0,0,0,.35); margin-top:25px;">

            <h2 style="margin:0; font-size:30px; color:white;">
                Total Belanja:
                <span style="color:#facc15;">
                    Rp {{ number_format($total,0,',','.') }}
                </span>
            </h2>

            @if($total > 0)
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf

                    <button type="submit"
                            style="background:#22c55e;color:white;border:none;padding:13px 22px;border-radius:12px;font-size:16px;cursor:pointer;margin-top:18px;font-weight:bold;">
                        Beli / Checkout
                    </button>
                </form>

          <a href="/produk-pembeli"
           style="
           display:inline-block;
           margin-top:15px;
           margin-bottom:20px;
           background:#facc15;
           color:#020617;
           padding:12px 25px;
           border-radius:10px;
           text-decoration:none;
           font-weight:bold;">
           Tambahkan Produk Lain ke Keranjang
        </a> 
            @endif

        </div>

    </div>

    <footer style="text-align:center; padding:25px; color:#94a3b8; border-top:1px solid #1e293b; margin-top:40px;">
        AW Store | Music & Gear
    </footer>

</div>