<?php

use Illuminate\Support\Str;
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
        $admin = new Metrocinemas\User();
        $admin->username = 'El mero mero';
        $admin->email = 'admin@test.com';
        $admin->email_verified_at = now();
        $admin->password = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm';
        $admin->role = 'admin';
        $admin->remember_token = Str::random(10);
        $admin->save();

        factory(Metrocinemas\User::class, 1)->create();
    }
}
