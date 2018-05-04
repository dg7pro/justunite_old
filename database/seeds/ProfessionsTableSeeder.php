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
            'category'=>'Govt. Service',
            'details'=>'Some details about profession'
        ]);

        App\Profession::query()->create([
            'category'=>'Private Job',
            'details'=>'Some details about profession'
        ]);

        App\Profession::query()->create([
            'category'=>'Own Business',
            'details'=>'Some details about profession'
        ]);

        App\Profession::query()->create([
            'category'=>'Unemployed',
            'details'=>'Some details about profession'
        ]);

        App\Profession::query()->create([
            'category'=>'Self Employed',
            'details'=>'Some details about profession'
        ]);
    }
}
