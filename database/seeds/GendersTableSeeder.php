<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GendersTableSeeder extends Seeder
{
    protected $toTruncate = ['genders'];
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

        App\Gender::query()->create([
            'name'=>'Male'
        ]);

        App\Gender::query()->create([
            'name'=>'Female'
        ]);

        App\Gender::query()->create([
            'name'=>'Others'
        ]);
    }
}
