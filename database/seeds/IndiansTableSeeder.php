<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndiansTableSeeder extends Seeder
{
    protected $toTruncate = ['indians'];
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

        factory('App\Indian',70)->create();
    }
}
