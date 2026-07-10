<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            $table->string('nama_produk');
            $table->integer('jumlah');
            $table->bigInteger('harga');
            $table->bigInteger('total');
            $table->string('metode')->nullable();
            $table->string('bank_ewallet')->nullable();
            $table->string('status')->default('Menunggu Pembayaran');

            $table->string('no_hp')->nullable();
           $table->string('provinsi')->nullable();
           $table->string('kabupaten')->nullable();
           $table->string('kecamatan')->nullable();
           $table->string('desa')->nullable();
           $table->text('alamat_lengkap')->nullable();
           $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
