<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $users = [
           [
               'name' => 'admin',
               'role' => 'admin',
               'email' => 'admin@gmail.com',
               'password' => bcrypt('1234'),
           ],
           [
               'name' => 'user',
               'role' => 'user',
               'email' => 'user@gmail.com',
               'password' => bcrypt('12341234'),
           ],
           [
               'name' => 'user02',
               'role' => 'user',
               'email' => 'user02@gmail.com',
               'password' => bcrypt('12341234'),
           ],
];

        foreach ($users as $user) {
            User::factory()->create($user);
        }

        $this->call([
            ProductSeeder::class,
        ]);
    }
}
