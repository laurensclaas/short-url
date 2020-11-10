<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::all()->where('email','admin@test.com')->isEmpty()) 
        {
            $admin = User::firstOrNew(['email' => 'admin@test.com']);
            $admin->password = bcrypt('password');
            $admin->name = "Admin Test";
            $admin->save();
        }

        User::factory(10)->create();
    }
}
