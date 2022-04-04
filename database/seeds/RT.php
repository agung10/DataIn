<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RT extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('r_t_s')->truncate();

        \App\Models\RT::insert([
            [
                'number' => 1,
                'created_at' => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at' => \Carbon\Carbon::now('Asia/jakarta')
            ],
            [
                'number' => 2,
                'created_at' => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at' => \Carbon\Carbon::now('Asia/jakarta')
            ],
            [
                'number' => 3,
                'created_at' => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at' => \Carbon\Carbon::now('Asia/jakarta')
            ],
            [
                'number' => 4,
                'created_at' => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at' => \Carbon\Carbon::now('Asia/jakarta')
            ],
            [
                'number' => 5,
                'created_at' => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at' => \Carbon\Carbon::now('Asia/jakarta')
            ],
        ]);
    }
}
