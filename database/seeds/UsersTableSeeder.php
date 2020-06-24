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
      $user = \BrainApp\User::create([
            'name' => 'User Admin',
            'email' => 'useradmin@gmail.com',
            'password' => Hash::make('password'),
            'status' => 'admin'
        ]);
        
      $users = factory(BrainApp\User::class, 2)->create([
            'status' => 'researcher'
        ]);

      $patients = factory(BrainApp\Patient::class, 7)->create();
      
    }
}
