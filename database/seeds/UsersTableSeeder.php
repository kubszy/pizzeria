<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRole = config('roles.models.role')::where('name', '=', 'User')->first();
        $adminRole = config('roles.models.role')::where('name', '=', 'Admin')->first();
        $permissions = config('roles.models.permission')::all();

        /*
         * Add Users
         *
         */
        if (config('roles.models.defaultUser')::where('email', '=', 'admin@admin.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Admin',
                'surname'     => 'Admin',
                'email'    => 'admin@admin.com',
                'password' => bcrypt('passw'),
                'city' => 'xyz',
                'number' => '666',
            ]);

            $newUser->attachRole($adminRole);
            foreach ($permissions as $permission) {
                $newUser->attachPermission($permission);
            }
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'user@user.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'User',
                'surname'     => 'User',
                'email'    => 'user@user.com',
                'password' => bcrypt('passw'),
                'city' => 'xyz',
                'number' => '666',
            ]);

            $newUser;
            $newUser->attachRole($userRole);
        }

        $faker = Faker\Factory::create('pl_PL');

         for($i = 1; $i <= 10; $i ++)
         {
             $user = new User();
             $user->name = $faker->firstName;
             $user->surname = $faker->lastName;
             $user->email = strtolower($user->name) . '.' . strtolower($user->surname) . '@'. $faker->freeEmailDomain;
             $user->password =  bcrypt('passw');
             $user->city = $faker->city;
             $user->street = $faker->streetName;
             $user->number = $faker->numberBetween($min = 1000, $max = 9000);
             $user->apartment_number = $faker->numberBetween($min = 1000, $max = 9000);
             $user->save();
             $user->attachRole($userRole);
         }
    }
}
