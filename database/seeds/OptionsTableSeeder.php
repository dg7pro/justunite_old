<?php

use App\Poll;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    //protected $toTruncate = ['options'];
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

        //1 Who will be your choice of Prime minister in 2019 general elections?

        App\Option::query()->create([
            'poll_id'=>Poll::find(1)->id,
            'answer'=>'Narendra Modi'
        ]);

        App\Option::query()->create([
            'poll_id'=>Poll::find(1)->id,
            'answer'=>'Rahul Gandhi'
        ]);

        App\Option::query()->create([
            'poll_id'=>App\Poll::find(1)->id,
            'answer'=>'Arvind Kejriwal'
        ]);

        App\Option::query()->create([
            'poll_id'=>App\Poll::find(1)->id,
            'answer'=>'Someone else'
        ]);

        App\Option::query()->create([
            'poll_id'=>App\Poll::find(1)->id,
            'answer'=>'No one is appropriate'
        ]);


    }
}
