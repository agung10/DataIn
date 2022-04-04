<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamilyStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('family_statuses')->truncate();

        \App\Models\FamilyStatus::insert([
            [
                'f_status' => 'Kakek',
                'created_at'   => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at'   => \Carbon\Carbon::now('Asia/jakarta')
            ],
            [
                'f_status' => 'Nenek',
                'created_at'   => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at'   => \Carbon\Carbon::now('Asia/jakarta')
            ],
            [
                'f_status' => 'Ayah',
                'created_at'   => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at'   => \Carbon\Carbon::now('Asia/jakarta')
            ],
            [
                'f_status' => 'Ibu',
                'created_at'   => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at'   => \Carbon\Carbon::now('Asia/jakarta')
            ],
            [
                'f_status' => 'Kakak',
                'created_at'   => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at'   => \Carbon\Carbon::now('Asia/jakarta')
            ],
            [
                'f_status' => 'Adik',
                'created_at'   => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at'   => \Carbon\Carbon::now('Asia/jakarta')
            ],
        ]);
    }
}
