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

            $vote = App\User::where('id','<',1000)->inRandomOrder()->first();
            $vote->votes()->create(['user_id'=>$user->id,'credits'=>$user->credits]);

            $option = App\Option::inRandomOrder()->first();
            $option->votes()->create(['user_id'=>$user->id,'credits'=>$user->credits]);

        }

    }
}
