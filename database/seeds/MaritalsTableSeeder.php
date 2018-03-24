<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaritalsTableSeeder extends Seeder
{
    protected $toTruncate = ['maritals'];
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

        App\Marital::query()->create([
            'status'=>'unmarried'
        ]);

        App\Marital::query()->create([
            'status'=>'married'
        ]);

        App\Marital::query()->create([
            'status'=>'In Relationship'
        ]);
    }
}
