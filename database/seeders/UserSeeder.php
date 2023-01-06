<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User;
        $user->name="Admin";
        $user->email="admin@gmail.com";
        $user->password=Hash::make("admin@123");
        $user->role=1;
        $user->save();

        $user=new User;
        $user->name="User";
        $user->email="user@gmail.com";
        $user->password=Hash::make("user@123");
        $user->save();
    }
}
