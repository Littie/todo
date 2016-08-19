<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            [
                'name' => 'Birthday my sister',
                'note' => 'Congratulate my sister',
                'due_date' => '2016-09-05 10:00:00',
                'is_delete' => 0,
                'is_check' => 0,
                'is_overdue' => 0,
                'user_id' => 1,
                'group_id' => 1,
                'reminder' => '2016-09-05 09:45:00'
            ],

            [
                'name' => 'Go to supermarket',
                'note' => 'Shopping',
                'due_date' => '2016-08-23 13:00:00',
                'is_delete' => 0,
                'is_check' => 0,
                'is_overdue' => 0,
                'user_id' => 1,
                'group_id' => 2,
                'reminder' => '2016-08-23 12:45:00'
            ],
            
        ]);
    }
}
