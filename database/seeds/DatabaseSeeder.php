<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(User::class);
        $this->call(FamilyStatus::class);
        $this->call(MaritalStatus::class);
        $this->call(FamilyCStatus::class);
        $this->call(RT::class);
        $this->call(AreaInformation::class);
    }
}
