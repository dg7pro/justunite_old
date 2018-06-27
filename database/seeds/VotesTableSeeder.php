<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VotesTableSeeder extends Seeder
{
    protected $toTruncate = ['votes'];
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

        $users=App\User::all();
        foreach ($users as $user){

            /*$vote = App\User::where('id','<',100)->inRandomOrder()->first();
            $vote->votes()->create(['user_id'=>$user->id,'credits'=>$user->credits]);*/

           /* $option = App\Option::inRandomOrder()->first();
            $option->votes()->create(['user_id'=>$user->id,'credits'=>$user->credits]);*/

            $party = App\Party::inRandomOrder()->first();
            $party->votes()->create(['user_id'=>$user->id,'credits'=>$user->credits]);

            $problem = App\Problem::inRandomOrder()->first();
            $problem->votes()->create(['user_id'=>$user->id,'credits'=>$user->credits]);

        }

    }
}
