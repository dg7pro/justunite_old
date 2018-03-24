<?php

use Illuminate\Database\Seeder;

class PollsTableSeeder extends Seeder
{
    //protected $toTruncate = ['polls'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*foreach($this->toTruncate as $table){
            DB::table($table)->truncate();
        }*/

        App\Poll::query()->create([
            'question'=>'Who will be next Prime Minister of India ?',
            'description'=>'Who will be your choice of Prime Minister in 2019 General Elections?'
        ]);
    }
}
