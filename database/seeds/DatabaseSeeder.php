<?php

use Illuminate\Database\Seeder;
use App\models\Users;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        if(Users::all()->count() <= 0)
        {
            Users::create([
                "email"=>"admin@hotmail.com",
                "name"=>"admin",
                "password"=>Hash::make("admin123")
            ]);
        }
    }
}
