<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationsTableSeeder extends Seeder
{
    protected $toTruncate = ['education'];
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

        App\Education::query()->create([
            'level'=>'High School'
        ]);

        App\Education::query()->create([
            'level'=>'Intermediate'
        ]);

        App\Education::query()->create([
            'level'=>'Graduate'
        ]);

        App\Education::query()->create([
            'level'=>'Post Graduate'
        ]);

        App\Education::query()->create([
            'level'=>'Doctorate'
        ]);
    }
}
