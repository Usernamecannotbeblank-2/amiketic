<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "admin";
        $user->email = "admin@pwa.rs";
        $user->role_id = 1;
        $user->password = Hash::make('admin@pwa.rs');
        $user->save();

        $user = new User();
        $user->name = "editor";
        $user->email = "editor@pwa.rs";
        $user->role_id = 2;
        $user->password = Hash::make('editor@pwa.rs');
        $user->save();

        $user = new User();
        $user->name = "user";
        $user->email = "user@pwa.rs";
        $user->role_id = 3;
        $user->password = Hash::make('user@pwa.rs');
        $user->save();

    }
}



// $table->string('name');
//             $table->string('email')->unique();
//             $table->timestamp('email_verified_at')->nullable();
//             $table->string('password');
