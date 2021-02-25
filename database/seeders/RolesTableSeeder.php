<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
            ],
            [
                'id'    => 2,
                'title' => 'User',
            ],
        ];
        DB::unprepared('SET IDENTITY_INSERT test_table ON');
        Role::insert($roles);
        DB::unprepared('SET IDENTITY_INSERT test_table OFF');
    }
}
