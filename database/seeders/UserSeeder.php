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
        $users  =
            [
                "name"     => "admin",
                "username" => "admin",
                "email"    => "admin@cangs.com",
                "nbi"      => "1901001901",
                "email_verified_at" => now(),
                "password" => bcrypt("admin123"),
                "created_at" => now(),
                "updated_at" => now(),
            ];

        $user = User::create($users);
        $user->assignRole('admin');

        $users  =
            [
                "name"     => "user",
                "username" => "user",
                "email"    => "user@gmail.com",
                "nbi"      => "190123001901",
                "email_verified_at" => now(),
                "password" => bcrypt("password"),
                "created_at" => now(),
                "updated_at" => now(),
            ];

        $user = User::create($users);
        $user->assignRole('user');
    }
}
