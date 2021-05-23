<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users  = [
            [
                "name"     => "admin",
                "username" => "admin",
                "email"    => "admin@cangs.com",
                "nbi"      => "1901001901",
                "password" => bcrypt("admin123"),
                "created_at" => now(),
                "updated_at" => now(),            ]
        ];

        User::insert($users);
    }
}
