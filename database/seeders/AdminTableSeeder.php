<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert default admin

        // Check that admins table must be empty
        $adminExists = DB::table('admins')->count();

        if (!$adminExists) {
            DB::table('admins')->insert([
                'first_name' => 'super',
                'last_name'  => 'admin',
                'email'      => 'admin@cms.com',
                'password'   => Hash::make('admin@123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
