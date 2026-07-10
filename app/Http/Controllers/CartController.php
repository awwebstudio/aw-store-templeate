<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get()
            ->map(function ($cart) {
                return [
                    'id' => $cart->product_id,
                    'product' => $cart->product,
                    'jumlah' => $cart->jumlah,
                ];
            });

        return view('carts.index', compact('carts'));
    }

    public function store(Request $request)
    {
        $cart = Cart::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cart) {
            $cart->increment('jumlah');
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'jumlah' => 1,
            ]);
        }

        return redirect()->route('carts.index')
            ->with('cart_success', 'Produk berhasil ditambahkan ke keranjang');
    }

    public function destroy($cart)
    {
        Cart::where('user_id', auth()->id())
            ->where('product_id', $cart)
            ->delete();

        return redirect()->route('carts.index')
            ->with('delete_success', 'Produk berhasil dihapus dari keranjang');
    }

    public function kurang($cart)
    {
        $item = Cart::where('user_id', auth()->id())
            ->where('product_id', $cart)
            ->first();

        if ($item) {
            if ($item->jumlah > 1) {
                $item->decrement('jumlah');
            } else {
                $item->delete();
            }
        }

        return redirect()->route('carts.index');
    }

    public function checkout()
    {
        return redirect()->route('pembayaran');
    }

    public function riwayat()
    {
        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function adminRiwayat()
    {
        $orders = Order::latest()->get();

        return view('admin-riwayat', compact('orders'));
    }

    public function checkoutItem($cart)
    {
        session()->put('checkout_item', $cart);

        return redirect()->route('pembayaran');
    }

    public function beliLangsung(Request $request)
    {
        Cart::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
            ],
            [
                'jumlah' => 1,
            ]
        );

        session()->put('checkout_item', $request->product_id);

        return redirect()->route('pembayaran');
    }

    public function pembayaran()
    {
        $checkoutItem = session()->get('checkout_item');

        $query = Cart::with('product')
            ->where('user_id', auth()->id());

        if ($checkoutItem) {
            $query->where('product_id', $checkoutItem);
        }

        $carts = $query->get();

        if ($carts->count() == 0) {
            return redirect()->route('carts.index')
                ->with('success', 'Keranjang masih kosong.');
        }

        $total = 0;

        foreach ($carts as $cart) {
            if ($cart->product) {
                $total += $cart->product->harga * $cart->jumlah;
            }
        }

        return view('pembayaran', compact('total'));
    }

    public function bayar(Request $request)
    {
        $checkoutItem = session()->get('checkout_item');

        $query = Cart::with('product')
            ->where('user_id', auth()->id());

        if ($checkoutItem) {
            $query->where('product_id', $checkoutItem);
        }

        $carts = $query->get();

        $metode = $request->metode;
        $bankEwallet = null;
        $status = 'Berhasil Dibayar';

        if ($metode == 'Transfer Bank') {
            $bankEwallet = $request->bank;
        }

        if ($metode == 'E-Wallet') {
            $bankEwallet = $request->ewallet;
        }

        if ($metode == 'COD') {
            $status = 'Belum Dibayar';
        }

        foreach ($carts as $cart) {
            $product = $cart->product;

            if ($product) {

    if ($product->stok < $cart->jumlah) {
        return redirect()->route('carts.index')
            ->with('error', 'Stok produk ' . $product->nama_produk . ' tidak cukup.');
    }

    Order::create([
        'user_id' => auth()->id(),
        'nama_produk' => $product->nama_produk,
        'jumlah' => $cart->jumlah,
        'harga' => $product->harga,
        'total' => $product->harga * $cart->jumlah,
        'metode' => $metode,
        'bank_ewallet' => $bankEwallet,
        'status' => $status,
        'no_hp' => $request->no_hp,
        'provinsi' => $request->provinsi,
        'kabupaten' => $request->kabupaten,
        'kecamatan' => $request->kecamatan,
        'desa' => $request->desa,
        'alamat_lengkap' => $request->alamat_lengkap,
    ]);
    $product->decrement('stok', $cart->jumlah);
}
        }

        if ($checkoutItem) {
            Cart::where('user_id', auth()->id())
                ->where('product_id', $checkoutItem)
                ->delete();
        } else {
            Cart::where('user_id', auth()->id())->delete();
        }

        session()->forget('checkout_item');

        return redirect()->route('riwayat.pembelian')
            ->with('success', 'Pembayaran berhasil!');
    }
}