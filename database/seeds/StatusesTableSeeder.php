<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_id = [1, 2, 3];
        $faker = app(Faker\Generator::class);
        $statuses = factory(Status::class)->times(100)->make()->each(function($status)  use ($users_id, $faker) {
            $status->user_id = $faker->randomElement($users_id);
        });

        Status::insert($statuses->toArray());
    }
}
