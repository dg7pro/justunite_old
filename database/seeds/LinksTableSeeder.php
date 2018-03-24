<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinksTableSeeder extends Seeder
{
    protected $toTruncate = ['links'];
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

        App\Link::query()->create([
            'name'=>'whatsapp',
            'link'=>'https://chat.whatsapp.com/4nD0uXNoBHd8MvgfNYQPQN'
        ]);


    }
}
