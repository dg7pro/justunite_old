<?php

use Illuminate\Database\Seeder;

class StypesTableSeeder extends Seeder
{
    protected $toTruncate = ['stypes'];
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

        App\Stype::query()->create([
            'name'=>'State',
        ]);

        App\Stype::query()->create([
            'name'=>'UT',
        ]);
    }
}
