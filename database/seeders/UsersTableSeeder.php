<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
        ];
        DB::unprepared('SET IDENTITY_INSERT users ON');
        User::insert($users);
        DB::unprepared('SET IDENTITY_INSERT users OFF');
    }
}
