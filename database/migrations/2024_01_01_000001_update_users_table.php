<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nomor_hp', 20)->nullable()->after('email');
            $table->enum('role', ['admin', 'dokter', 'pasien'])->default('pasien')->after('nomor_hp');
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable()->after('role');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nomor_hp', 'role', 'jenis_kelamin']);
        });
    }
};
