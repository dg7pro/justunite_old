<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    protected $toTruncate = ['groups'];
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

        App\Group::query()->create([
            'name'=>'Commoners', // Simple Members
            'color'=>'Blue',
            'hex'=>'dodgerblue',
            'description'=>'Commoners are general public who like our Initiative. They are not active members but a just common supporters',
            'votes'=>1
        ]);

        App\Group::query()->create([
            'name'=>'Volunteers', // Elite Task Force
            'color'=>'Violet',
            'hex'=>'slateblue',
            'description'=>'Member who volunteer for our common cause that is to unite Indians, this is the first level of leadership. 
            All great leaders of world had once started their journey as Volunteer. Indian citizen below 25 years (both men and women) can Volunteer for us',
            'votes'=>2
        ]);

        App\Group::query()->create([
            'name'=>'Women Wing', // Research & Analysis Wing
            'color'=>'Pink',
            'hex'=>'pink',
            'description'=>'Women\'s are the another half of us, without whom world is not possible. Indian Women above 18 can join this group',
            'votes'=>2
        ]);

        App\Group::query()->create([
            'name'=>'Youth Wing',
            'color'=>'Green',
            'hex'=>'seagreen',
            'description'=>'The Youth! the power of the country. Men above 18 can join the Youth Wing',
            'votes'=>2
        ]);

        App\Group::query()->create([
            'name'=>'ETF', // Elite Task Force
            'color'=>'Brown',
            'hex'=>'firebrick',
            'description'=>'Elite Task Force, The ETF designed to work in cases of Emergencies on India',
            'votes'=>3
        ]);

        App\Group::query()->create([
            'name'=>'RAW', // Research & Analysis Wing
            'color'=>'midnightblue',
            'hex'=>'midnightblue',
            'description'=>'Wing dedicated for winning Elections',
            'votes'=>3
        ]);

        App\Group::query()->create([
            'name'=>'Guardian',
            'color'=>'darkslategrey',
            'hex'=>'darkslategrey',
            'description'=>'Group of Experienced personalities from different fields to guide us',
            'votes'=>4
        ]);

        App\Group::query()->create([
            'name'=>'Assembly', // Active Members
            'color'=>'coral',
            'hex'=>'coral',
            'description'=>'Larger group of governing body',
            'votes'=>5
        ]);

        App\Group::query()->create([
            'name'=>'Cabinet',
            'color'=>'orangered',
            'hex'=>'orangered',
            'description'=>'Core group of governing body',
            'votes'=>6
        ]);

        App\Group::query()->create([
            'name'=>'President',
            'color'=>'crimson',
            'hex'=>'crimson',
            'description'=>'President selected by all members of Just Unite',
            'votes'=>7
        ]);

    }
}
