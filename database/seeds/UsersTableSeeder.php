<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ibrahem Tantawy',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
