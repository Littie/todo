<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@admin.ad',
                'password' => '$2y$10$b.xG7bT.Bem84RDm50qXPO7Y6H0aXXcs5FNrXtTAk.MHAvfFSZ5m2',
                'role' => 'admin',
                'is_delete' => 0,
                'confirmed' => 1
            ],

            [
                'name' => 'User',
                'email' => 'user@user.us',
                'password' => '$2y$10$b.xG7bT.Bem84RDm50qXPO7Y6H0aXXcs5FNrXtTAk.MHAvfFSZ5m2',
                'role' => 'guest',
                'is_delete' => 0,
                'confirmed' => 1
            ]
        ]);
    }
}
