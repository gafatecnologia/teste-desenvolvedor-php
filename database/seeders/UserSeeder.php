<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'id' => 1,
            'name' => 'Marcos Nobre Castro Silva',
            'email' => 'marcosnobre26@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 2,
            'name' => 'Tatiana Monte Negro',
            'email' => 'tati@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 3,
            'name' => 'Neriel',
            'email' => 'neriel@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 4,
            'name' => 'Luke',
            'email' => 'luke@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 5,
            'name' => 'Cristabela',
            'email' => 'cristabela@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 6,
            'name' => 'PitBull',
            'email' => 'pitbull@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 7,
            'name' => 'Alfonse',
            'email' => 'alfonse@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 8,
            'name' => 'Eduardo',
            'email' => 'eduardo@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 9,
            'name' => 'Laynara',
            'email' => 'laynara@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 10,
            'name' => 'Raynara',
            'email' => 'raynara@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 11,
            'name' => 'Cristiano',
            'email' => 'cristiano@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 12,
            'name' => 'Osvaldo',
            'email' => 'Osvaldo@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 13,
            'name' => 'Rafael',
            'email' => 'rafael@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 14,
            'name' => 'Renato',
            'email' => 'renato@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 15,
            'name' => 'Beatris',
            'email' => 'beatris@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 16,
            'name' => 'Brian',
            'email' => 'brian@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 17,
            'name' => 'Ana',
            'email' => 'ana@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 18,
            'name' => 'Carolina',
            'email' => 'carolina@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 19,
            'name' => 'Zumira',
            'email' => 'zumira@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 20,
            'name' => 'Samara',
            'email' => 'samara@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 21,
            'name' => 'Cesar',
            'email' => 'cesar@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 22,
            'name' => 'Cristina',
            'email' => 'cristina@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 23,
            'name' => 'Leonardo',
            'email' => 'leonardo@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 24,
            'name' => 'Limeira',
            'email' => 'limeira@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 25,
            'name' => 'Livia',
            'email' => 'livia@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 26,
            'name' => 'Rosa Maria',
            'email' => 'rosamaria@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'id' => 27,
            'name' => 'Renan',
            'email' => 'renan@gmail.com',
            'password' => bcrypt('123456'),
        ]);

    }
}
