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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('departments');
            $table->foreignId('department_users_id')->constrained('department_users');
            $table->date('tanggal_pembelian')->nullable();
            $table->string('specifications');
            $table->string('operating_system');
            $table->string('ket_laptop');
            $table->string('keyboard');
            $table->string('ket_keyboard');
            $table->string('mouse');
            $table->string('ket_mouse');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
