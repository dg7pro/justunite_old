<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionsTableSeeder extends Seeder
{
    protected $toTruncate = ['professions'];
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

        App\Profession::query()->create([
            'category'=>'Govt. Service'
        ]);

        App\Profession::query()->create([
            'category'=>'Private Job'
        ]);

        App\Profession::query()->create([
            'category'=>'Own Business'
        ]);

        App\Profession::query()->create([
            'category'=>'Unemployed'
        ]);

        App\Profession::query()->create([
            'category'=>'Self Employed'
        ]);
    }
}
