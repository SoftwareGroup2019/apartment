<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Role::factory()->create([
            'rolename' => 'SuperAdmin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \App\Models\Group::factory()->create([
            'groupname' => 'IT',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'super_admin@app.com',
            'password' => Hash::make('123123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => '1',
            'group_id' => '1'
        ]);
    }
}
