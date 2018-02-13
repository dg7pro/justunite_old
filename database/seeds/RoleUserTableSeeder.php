<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    protected $toTruncate = ['role_user'];

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

        $user=App\User::query()->where('email','dg7projects@gmail.com')->get();

        //$user->roles()->attach($role);

        $role->users()->attach($user);
    }
}
