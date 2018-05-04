<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CtypesTableSeeder extends Seeder
{
    protected $toTruncate = ['ctypes'];
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
            'name'=>'Gn', // Un-Categorized General Seat
            'description'=>'General Seat'
        ]);

        App\Ctype::query()->create([
            'name'=>'SC',
            'description'=>'Reserved for SC'
        ]);

        App\Ctype::query()->create([
            'name'=>'ST',
            'description'=>'Reserved for ST'
        ]);



    }
}
