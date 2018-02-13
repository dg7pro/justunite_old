<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    protected $toTruncate = ['permissions'];

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

        App\Permission::query()->create([
            'name'=>'manage_roles',
            'label'=>'Manage User Roles'
        ]);

        App\Permission::query()->create([
            'name'=>'manage_permissions',
            'label'=>'Manage Site Permissions'
        ]);

        App\Permission::query()->create([
            'name'=>'manage_site',
            'label'=>'Manage Website'
        ]);

        App\Permission::query()->create([
            'name'=>'manage_users',
            'label'=>'Manage Users'
        ]);

        App\Permission::query()->create([
            'name'=>'view_stats',
            'label'=>'View Statistics'
        ]);

        App\Permission::query()->create([
            'name'=>'view_notes',
            'label'=>'View Notes'
        ]);
    }
}
