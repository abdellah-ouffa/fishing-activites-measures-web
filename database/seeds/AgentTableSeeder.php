<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\User;
use App\Models\Agent;

class AgentTableSeeder extends Seeder
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
                'role' => Constant::USER_ROLES['agent'],
                'ppr_number' => mt_rand(10000, 70000),
            ]);

            Agent::create([
                'user_id' => $user->id, 
            ]);
    	}
    }
}
