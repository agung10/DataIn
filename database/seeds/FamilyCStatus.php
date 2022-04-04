<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamilyCStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('family_c_statuses')->truncate();

        \App\Models\FamilyCStatus::insert([
            [
                'relationship'       => 'Kepala Keluarga',
                'created_at' => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at' => \Carbon\Carbon::now('Asia/jakarta')
            ],
            [
                'relationship'       => 'Istri',
                'created_at' => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at' => \Carbon\Carbon::now('Asia/jakarta')
            ],
            [
                'relationship'       => 'Anak',
                'created_at' => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at' => \Carbon\Carbon::now('Asia/jakarta')
            ],
        ]);
    }
}
