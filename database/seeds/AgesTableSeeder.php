<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgesTableSeeder extends Seeder
{
    protected $toTruncate = ['ages'];
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

        App\Age::query()->create([
            'group'=>'Below 18'
        ]);

        App\Age::query()->create([
            'group'=>'18 to 25'
        ]);

        App\Age::query()->create([
            'group'=>'26 to 35'
        ]);

        App\Age::query()->create([
            'group'=>'36 to 45'
        ]);

        App\Age::query()->create([
            'group'=>'46 to 55'
        ]);

        App\Age::query()->create([
            'group'=>'56 to 65'
        ]);

        App\Age::query()->create([
            'group'=>'Above 65'
        ]);
    }
}
