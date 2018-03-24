<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PtypesTableSeeder extends Seeder
{
    protected $toTruncate = ['ptypes'];
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

        App\Ctype::query()->create([
            'name'=>'National Party',
            'description'=>'National Party'
        ]);

        App\Ctype::query()->create([
            'name'=>'State Party',
            'description'=>'State party'
        ]);

        App\Ctype::query()->create([
            'name'=>'Unrecognized Registered Party',
            'description'=>'Unrecognized Registered Party'
        ]);
    }
}
