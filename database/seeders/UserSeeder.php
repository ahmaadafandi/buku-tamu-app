<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
      
        $super_admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@sumutprov.go.id',
            'password' => bcrypt('123456')
        ]);

        $super_admin->assignRole('administrator');
    }
}
