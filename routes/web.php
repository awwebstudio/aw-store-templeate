<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;
use App\Models\Order;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\PembeliRegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

// Beranda pembeli
Route::get('/', function () {
    return view('beranda');
})->name('beranda');

// API Wilayah
Route::get('/provinces', 
[WilayahController::class, 'provinces']);

Route::get('/regencies/{kode}', 
[WilayahController::class, 'regencies']);

Route::get('/districts/{kode}', 
[WilayahController::class, 'districts']);

Route::get('/villages/{kode}',
 [WilayahController::class, 'villages']);

// Welcome Admin
Route::get('/admin-welcome', function () {
    return view('admin-welcome');
})->name('admin.welcome');
Route::get('/login-pembeli', function () {
    return view('pembeli.login');
})->name('pembeli.login');
Route::get('/register-pembeli', function () {
    return view('pembeli.register');
})->name('pembeli.register');
Route::post('/register-pembeli', 
[PembeliRegisterController::class, 'store'])
 ->name('pembeli.register.store');
 Route::get('/profil-pembeli', function () {
    return view('pembeli.profil');
})->middleware('auth')->name('pembeli.profil');
Route::patch('/profil-pembeli/update', 
[ProfileController::class, 'updateSimple'])
    ->middleware('auth')
    ->name('profil.pembeli.update');

// Produk pembeli tanpa login
Route::get('/produk-pembeli', 
[ProductController::class, 'produkPembeli'])
    ->name('produk.pembeli');

// Keranjang, checkout, pembayaran, dan riwayat harus login
Route::middleware(['auth'])->group(function () {

    Route::get('/keranjang', [CartController::class, 'index'])->name('carts.index');
    Route::post('/keranjang', [CartController::class, 'store'])->name('carts.store');
    Route::delete('/keranjang/{cart}', [CartController::class, 'destroy'])->name('carts.destroy');
    Route::post('/keranjang/kurang/{cart}', [CartController::class, 'kurang'])->name('carts.kurang');

    Route::get('/riwayat-pembelian', [CartController::class, 'riwayat'])
   ->name('riwayat.pembelian');
   Route::post('/logout-pembeli', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('beranda');
    })->name('logout.pembeli');

    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/checkout-item/{cart}', [CartController::class, 'checkoutItem'])->name('checkout.item');
    Route::post('/beli-langsung', [CartController::class, 'beliLangsung'])->name('beli.langsung');

    Route::get('/pembayaran', [CartController::class, 'pembayaran'])
        ->name('pembayaran');

    Route::post('/bayar', [CartController::class, 'bayar'])
        ->name('bayar');
});

// Tentang Kami
Route::get('/tentang-kami', function () {
    return view('tentang-kami');
})->name('tentang.kami');

// Dashboard admin harus login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Semua fitur admin harus login
Route::middleware(['auth'])->group(function () {

    // Produk Admin
    Route::resource('products', ProductController::class);

    // Riwayat Transaksi Admin
    Route::get('/admin-riwayat', [CartController::class, 'adminRiwayat'])
        ->name('admin.riwayat');

    Route::get('/kelola-pengiriman', function () {
    $orders = \App\Models\Order::latest()->get();
    return view('orders.kelola-pengiriman', compact('orders'));
    })->name('pengiriman.index');

    Route::get('/kelola-pengiriman/belum', function () {
    $orders = \App\Models\Order::where('status_pengiriman', 'Belum Diproses')->latest()->get();
    return view('orders.kelola-pengiriman', compact('orders'));
})->name('pengiriman.belum');

Route::get('/kelola-pengiriman/dikemas', function () {
    $orders = \App\Models\Order::where('status_pengiriman', 'Sedang Dikemas')->latest()->get();
    return view('orders.kelola-pengiriman', compact('orders'));
})->name('pengiriman.dikemas');

Route::get('/kelola-pengiriman/dikirim', function () {
    $orders = \App\Models\Order::where('status_pengiriman', 'Sedang Dikirim')->latest()->get();
    return view('orders.kelola-pengiriman', compact('orders'));
})->name('pengiriman.dikirim');

Route::get('/kelola-pengiriman/sampai', function () {
    $orders = \App\Models\Order::where('status_pengiriman', 'Sampai di Tujuan')->latest()->get();
    return view('orders.kelola-pengiriman', compact('orders'));
})->name('pengiriman.sampai');

Route::get('/kelola-pengiriman/selesai', function () {
    $orders = \App\Models\Order::where('status_pengiriman', 'Selesai')->latest()->get();
    return view('orders.kelola-pengiriman', compact('orders'));
})->name('pengiriman.selesai');

     Route::post('/orders/{order}/kirim', [OrderController::class, 'kirim'])
    ->name('orders.kirim');

    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])
    ->name('orders.edit');
     Route::post('/orders/{order}/update-status', [OrderController::class, 'updateStatus'])
    ->name('orders.updateStatus');

    // Profile Admin
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::view('/statistik', 'admin.statistik')->name('admin.statistik');
    Route::view('/laporan', 'admin.laporan')->name('admin.laporan');
    Route::view('/laporan-penjualan', 'admin.laporan-penjualan')->name('laporan.penjualan');
    Route::view('/laporan-produk', 'admin.laporan-produk')->name('laporan.produk');
    Route::view('/laporan-pengiriman', 'admin.laporan-pengiriman')->name('laporan.pengiriman');
    Route::view('/laporan-pembayaran', 'admin.laporan-pembayaran')->name('laporan.pembayaran');
    Route::get('/pengaturan', [SettingController::class, 'edit'])
    ->name('admin.pengaturan');
    Route::post('/pengaturan', [SettingController::class, 'update'])
    ->name('admin.pengaturan.update');
    Route::get('/pengaturan/edit', [SettingController::class, 'editForm'])
    ->name('admin.pengaturan.edit');
    Route::get('/invoice', [OrderController::class, 'invoice'])
    ->name('invoice');
    Route::view('/stok-hampir-habis', 'admin.stok')->name('admin.stok');
    Route::view('/keranjang-aktif', 'admin.keranjang')->name('admin.keranjang');
    Route::view('/pesan-admin', 'admin.pesan')->name('admin.pesan');
    Route::view('/data-pembeli', 'admin.pembeli')->name('admin.pembeli');
    
});

require __DIR__.'/auth.php';