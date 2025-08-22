<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // ✅ Correct import

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_type')->insert([
            ['type' => 'admin'],
            ['type' => 'manager'],
            ['type' => 'accountant'],
            ['type' => 'vendor'],
        ]);
    }
}
