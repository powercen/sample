<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password', 'remember_token', 'is_admin'])->toArray());

        $user = User::find(1);
        $user->update([
            'name' => 'BruceLee',
            'email' => '3565645@qq.com',
            'password' => bcrypt('123456'),
            'is_admin' => true,
            'activated' => true,
        ]);

    }
}
