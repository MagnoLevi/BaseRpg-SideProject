<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => env('USER_EMAIL_TEST')],
            [
                'name' => env('USER_NAME_TEST'),
                'password' => env('USER_PASS_TEST'),
                'type' => 'admin'
            ]
        );
    }
}
