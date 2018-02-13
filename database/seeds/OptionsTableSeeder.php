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

        //1 Does India needs to do more to improve gender equality?

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
            'answer'=>'Someone Other'
        ]);

        //1 Does India needs to do more to improve gender equality?

        App\Option::query()->create([
            'poll_id'=>Poll::find(2)->id,
            'answer'=>'Bhartiya Janata Party'
        ]);

        App\Option::query()->create([
            'poll_id'=>Poll::find(2)->id,
            'answer'=>'Indian National Congress'
        ]);

        App\Option::query()->create([
            'poll_id'=>App\Poll::find(2)->id,
            'answer'=>'Aam Aadmi Party'
        ]);

        App\Option::query()->create([
            'poll_id'=>App\Poll::find(2)->id,
            'answer'=>'Just Unite'
        ]);
    }
}
