<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->id = 1;
        $user->name = 'Slamet';
        $user->email = 'slametseptiawan6@gmail.com';
        $user->password = Hash::make('Rahasia123#');
        $user->save();
    }
}
