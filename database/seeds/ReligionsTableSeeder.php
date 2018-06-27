<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionsTableSeeder extends Seeder
{
    protected $toTruncate = ['religions'];
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

        App\Religion::query()->create([
            'name'=>'Hindu'
        ]);

        App\Religion::query()->create([
            'name'=>'Muslim'
        ]);

        App\Religion::query()->create([
            'name'=>'Christan'
        ]);

        App\Religion::query()->create([
            'name'=>'Sikh'
        ]);

        App\Religion::query()->create([
            'name'=>'Buddhist'
        ]);

        App\Religion::query()->create([
            'name'=>'Jain'
        ]);

        App\Religion::query()->create([
            'name'=>'Parsi'
        ]);

        App\Religion::query()->create([
            'name'=>'Atheist'
        ]);



    }
}
