<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    protected $toTruncate = ['categories'];
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

        App\Category::query()->create([
            'name'=>'Political Leaders',
        ]);

        App\Category::query()->create([
            'name'=>'Entertainment',
        ]);

        App\Category::query()->create([
            'name'=>'Sports Personalities',
        ]);

        App\Category::query()->create([
            'name'=>'Spiritual Leaders',
        ]);

        App\Category::query()->create([
            'name'=>'Scientists',
        ]);

        App\Category::query()->create([
            'name'=>'Religious',
        ]);

        App\Category::query()->create([
            'name'=>'Freedom Fighters',
        ]);

        App\Category::query()->create([
            'name'=>'Literature',
        ]);

        App\Category::query()->create([
            'name'=>'Kings & Emperors',
        ]);

        App\Category::query()->create([
            'name'=>'Business Tycoons',
        ]);
    }
}
