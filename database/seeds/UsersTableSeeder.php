<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    protected $toTruncate = ['users'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->toTruncate as $table){
            DB::table($table)->truncate();
        }

        // Correct method 2nd
        App\User::query()->create([
            'uuid'=> '8b127f10-f20a-11e7-9ee2-e1f2f243742a',
            'name'=>'Dhananjay Gupta',
            'email'=>'dg7projects@gmail.com',
            'password'=>bcrypt('Venus*27'),
            //'remember_token' => str_random(10),
        ]);

        App\User::query()->create([
            'uuid'=> '8b127f10-f20a-11e7-9ee2-e1f2f243742e',
            'name'=>'Kusum Rai',
            'email'=>'kusumrai@gmail.com',
            'password'=>bcrypt('Venus*27'),
            //'remember_token' => str_random(10),
        ]);

        // Correct method 1st
        /*DB::table('users')->insert([
            'uuid'=> '8c127f10-f20a-11e7-9ee2-e1f2f243742e',
            'name'=>'Kusum Rai',
            'email'=>'kusumrai@gmail.com',
            'password'=>bcrypt('Venus*27'),
            // commented before present comment
            'group_id' => rand(1,10),
            'state_id' => 7,
            'constituency_id' => 27,
            'credits' => rand(1,7),
            'verified' => rand(0,1),
            'email_token' => base64_encode('email'),
            'remember_token' => str_random(10),
        ]);*/

        factory('App\User',2000)->create();
    }
}
