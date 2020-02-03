<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\User;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Factory::create();

    	for ($i=0; $i < 50; $i++) { 
	        $user = User::create([
	            'first_name' => $faker->firstname,
	            'last_name' => $faker->lastname, 
                'is_active' => mt_rand(0, 1),
                'role' => Constant::USER_ROLES['admin'],
                'ppr_number' => mt_rand(10000, 70000),
            ]);

            Admin::create([
	            'email' => $faker->unique()->safeEmail, 
	            'password' => bcrypt('123456789'),
	            'visible_password' => '123456789',
                'user_id' => $user->id, 
                'picture' => null, 
            ]);
    	}
    }
}
