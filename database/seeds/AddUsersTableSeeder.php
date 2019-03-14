<?php

use Illuminate\Database\Seeder;
use App\User;

class AddUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
           'name'    => 'Docentes',
            'email'    => 'postulantes@puce.edu.ec',
            'password'   =>  Hash::make('docInnovacion'),
            'remember_token' =>  str_random(10),
        ]);
    }
}
