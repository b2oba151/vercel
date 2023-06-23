<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Mail;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Mail::fake();
        // Adding an admin user
/*        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);*/

        User::create([
            "id" => 1,
            "name" => 'Bagayogo',
            "firstname" => 'Idrissa',
            "email" => "admin@admin.com",
            'password' => \Hash::make('admin'),
            'location'=>'maroc',
            'compte'=>1500,
            'devise'=>'mad',
        ]);

        User::create([
            "id" => 2,
            "name" => 'Konate',
            "firstname" => 'Oumar',
            "email" => "konate@gmail.com",
            'password' => \Hash::make('admin'),
            'location'=>'mali',
            'compte'=>100000,
            'devise'=>'fcfa',
        ]);
        $this->call(PermissionsSeeder::class);

        $this->call(TransactionSeeder::class);
       // $this->call(UserSeeder::class);
        $this->call(VariationSeeder::class);
    }
}
