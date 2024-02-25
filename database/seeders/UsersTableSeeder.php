<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Illuminate\Support\Str;

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
            [
                'name' => 'suzuki',
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => new DateTime(),
                'remember_token' => 'null',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'postal_code' => '012-3456',
                'address' => '東京都港区',
                'nickname' => 'tarou',
            ], [
                'name' => 'satou',
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => new DateTime(),
                'remember_token' => 'null',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'postal_code' => '012-3456',
                'address' => '東京都港区',
                'nickname' => 'mamoru',
            ], [
                'name' => 'yamada',
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => new DateTime(),
                'remember_token' => 'null',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'postal_code' => '012-3456',
                'address' => '東京都港区',
                'nickname' => 'yuich',
            ],
        ]);
    }
}
