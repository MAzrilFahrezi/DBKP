<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Barang;
use App\Models\Kapal;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Kapal::create([
            "nama_kapal" => "dummy kapal",
            "nama_pt" => "dummy PT",
            "port_registration" => "dummy port regis",
            "gambar" => "dummy gambar",
        ]);

        Barang::create([
            "nama_barang" => "dummy barang",
            "volume" => "10",
            "manufaktur" => "dummy manufaktur",
            "gambar" => "dummy gambar",
            "date_of_inspection" => "2002-10-10",
            "next_date_of_inspection" => "2002-10-10",
            "new_supply" => 0,
            "inspected" => 0,
            "refill" => 0,
            "services" => 0,
            "pressure_test" => 0,
            "check_weight" => 0,
            "kapal_id" => 1,
        ]);
       
    }
}
