<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaInformation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('area_information')->truncate();

        \App\Models\AreaInformation::insert([
            [
                'name' => 'Rukun Warga 001',
                'address_details' => 'Jalan HM Sabar RT003 RW001, Kelurahan Rambutan, Kecamatan Ciracas, Jakarta Timur',
                'phone' => '(021) 8091773',
                'postal_code' => 13830,
                'description' => "Aplikasi Pendataan Warga RW 001",
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
                'updated_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
