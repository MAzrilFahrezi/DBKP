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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string("nama_barang");
            $table->string("volume");
            $table->string("manufaktur");
            $table->text("gambar");
            $table->date("date_of_inspection");
            $table->date("next_date_of_inspection");
            $table->boolean("new_supply");
            $table->boolean("inspected");
            $table->boolean("refill");
            $table->boolean("services");
            $table->boolean("pressure_test");
            $table->boolean("check_weight");
            $table->unsignedBigInteger("kapal_id");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_barangs');
    }
};
