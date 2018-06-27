<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Constant - Not affected by re-seeding
        $this->call(GroupsTableSeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call(PollsTableSeeder::class);
        $this->call(OptionsTableSeeder::class);

        // Constant - Semi-affected by re-seeding
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);

        // Constant - Not affected by re-seeding
        $this->call(GendersTableSeeder::class);
        $this->call(ReligionsTableSeeder::class);
        $this->call(MaritalsTableSeeder::class);
        $this->call(EducationsTableSeeder::class);
        $this->call(AgesTableSeeder::class);
        $this->call(ProfessionsTableSeeder::class);

        $this->call(LinksTableSeeder::class);
        $this->call(ProblemsTableSeeder::class);

        // Constant - Not affected by re-seeding
        $this->call(CtypesTableSeeder::class);
        $this->call(StypesTableSeeder::class);
        $this->call(PtypesTableSeeder::class);

        $this->call(VotesTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
