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
        factory(\Finlaravel\User::class,1)
            ->states('admin')
            ->create([
            'name' => 'Eduardo Couto',
            'email' => 'eduardo.lcouto@gmail.com'
        ]);
    }
}
