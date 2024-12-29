<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\User;
Use App\Models\UserDetail;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@egsa-solar.com',
            'password' => bcrypt('password'),
        ])->assignRole('Super Admin');

        UserDetail::create([
            'user_id' => $user->id,
            'phone' => '1234567890'
        ]);
    }
}
