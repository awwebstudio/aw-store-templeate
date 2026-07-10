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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('status_pengiriman')->default('Belum Diproses');
            $table->string('nomor_resi')->nullable();
            $table->string('jasa_pengiriman')->nullable();
            $table->string('estimasi_tiba')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'status_pengiriman',
                'nomor_resi',
                'jasa_pengiriman',
                'estimasi_tiba',
            ]);
        });
    }
};