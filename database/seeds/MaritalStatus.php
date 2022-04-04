<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaritalStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marital_statuses')->truncate();

        \App\Models\MaritalStatus::insert([
            [
                'w_status'       => 'Belum Kawin',
                'created_at' => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at' => \Carbon\Carbon::now('Asia/jakarta')
            ],
            [
                'w_status'       => 'Kawin',
                'created_at' => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at' => \Carbon\Carbon::now('Asia/jakarta')
            ],
            [
                'w_status'       => 'Cerai Hidup',
                'created_at' => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at' => \Carbon\Carbon::now('Asia/jakarta')
            ],
            [
                'w_status'       => 'Cerai Mati',
                'created_at' => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at' => \Carbon\Carbon::now('Asia/jakarta')
            ],
        ]);
    }
}
