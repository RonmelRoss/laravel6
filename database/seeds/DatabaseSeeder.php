<?php

use App\User;
use Faker\Provider\en_US\Text;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // DB::table('conversations')->insert([
        //     'user_id' => factory(User::class),
        //     'title' => Str::random(10),
        //     'body' => Str::random(10),
        // ]);
    }
}
