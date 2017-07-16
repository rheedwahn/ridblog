<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
        	'name' => 'ridwan busari',
        	'email' => 'rabusari@gmail.com',
        	'password' => bcrypt('adeshina'),
            'admin' => 1,
        	]);

        App\Profile::create([
            'user_id' => $user->id,
            'avater' => 'uploads/profile/admin.jpg',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'facebook' => 'www.facebook.com',
            'youtube' => 'www.youtube.com',
            ]);
    }
}
