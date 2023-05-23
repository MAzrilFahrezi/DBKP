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
        Schema::create('table_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("kapal_id");
            $table->unsignedBigInteger("barang_id");
            $table->String("aksi");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("kapal_id")->references("id")->on("kapals")->onDelete("cascade");
            $table->foreign("barang_id")->references("id")->on("barangs")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_history');
    }
};
