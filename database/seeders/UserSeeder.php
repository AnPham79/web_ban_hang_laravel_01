<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Staff',
            'avatar' => '',
            'role' => '2',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('123456'),
            'phone' => '0927553664',
            'address' => 'Hồ Chí Minh'
        ];
        User::create($data);

        $data = [
            'name' => 'Admin',
            'avatar' => '',
            'role' => '3',
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('123456'),
            'phone' => '0927553664',
            'address' => 'Hồ Chí Minh'
        ];
        User::create($data);
    }
}
