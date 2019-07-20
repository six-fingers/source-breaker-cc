<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


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
            'name' => 'Sal',
            'email' => 'sal@sal.com',
            'password' => Hash::make('aaaaaaaa'),
            'api_token' => 'LJxXJlMMTAjwTbWx3LlD9KnTyBq2GeWpD3VFYCOYw1QWiia3p789nzoLXtir',
        ]);

        DB::table('users')->insert([
            'name' => 'Jack',
            'email' => 'jack@jack.com',
            'password' => Hash::make('password'),
            'api_token' => '38KK39KHCzYdUczdXi1OxDEaDYH1v7pvpaPkvwKZRmbVvuaoaDvUcKgpAupg',
        ]);
    }
}
