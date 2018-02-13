<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    protected $toTruncate = ['roles'];

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

        App\Role::query()->create([
            'name'=>'Admin',
            'label'=>'Site Administrator'
        ]);

        App\Role::query()->create([
            'name'=>'Manager',
            'label'=>'Site Manager'
        ]);

    }
}
