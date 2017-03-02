<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TypePropertyTableSeeder::class);
        $this->call(TypeAnimalTableSeeder::class);
        $this->call(DisabilityTableSeeder::class);
        $this->call(TypeIdentificationTableSeeder::class);
        $this->call(TypeCommunityTableSeeder::class);
        $this->call(EducationalLevelTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
        $this->call(TypePqrTableSeeder::class);
        $this->call(TypeRepresentativeTableSeeder::class);
        $this->call(TypeInfractionTableSeeder::class);
    }
}
