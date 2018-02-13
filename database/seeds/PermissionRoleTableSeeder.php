<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    protected $toTruncate = ['permission_role'];

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

        $role=App\Role::query()->where('name','Admin')->first();

        $permissions_ids=App\Permission::query()->pluck('id');
        foreach ($permissions_ids as $permission_id){

            $role->permissions()->attach($permission_id);

        }

        $roleManager=App\Role::query()->where('name','Manager')->first();

        $permissions_ids=App\Permission::query()->where('id','>=',3)->pluck('id');
        foreach ($permissions_ids as $permission_id){

            $roleManager->permissions()->attach($permission_id);

        }

    }
}
