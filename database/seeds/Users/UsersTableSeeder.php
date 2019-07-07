<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminEmail = 'yaroslav.georgitsa@gmail.com';

        $admin = \App\Models\User::whereEmail($adminEmail)->first();

        if (!$admin) {
            \App\Models\User::create([
                'first_name' => 'Yaroslav',
                'last_name' => 'Georgitsa',
                'email' => $adminEmail,
                'email_verified_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('ch@ngeMeP1ease'),
            ]);
        }
    }
}
