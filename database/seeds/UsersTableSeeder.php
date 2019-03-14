<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'    => 'Administrador',
            'email'    => 'dinv@puce.edu.ec',
            'password'   =>  Hash::make('administradordinv'),
            'remember_token' =>  str_random(10),
        ]);

        
    }
}
