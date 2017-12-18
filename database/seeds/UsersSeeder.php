<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name' => 'Moises',
                'username' => 'moises',
                'email' => 'moi_estrello@hotmail.com',
                'password' => bcrypt('MOISES_ADMIN_POWER'),
            ],[
                'name' => 'Axel G',
                'username' => 'axel',
                'email' => 'axel@hanami.ninja',
                'password' => bcrypt('AXEL_ADMIN_POWER'),
            ]
        ]);
    }
}
