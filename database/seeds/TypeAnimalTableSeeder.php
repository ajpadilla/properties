<?php

use Illuminate\Database\Seeder;
use App\Models\TypeAnimal;


class TypeAnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\Eloquent::unguard();

        $typeAnimalsNames = [ 
        	'Perro', 
        	'Gato', 
        	'Pajaro',
        	'Pez',
        	'Reptil'
        ];

        $length = count($typeAnimalsNames);

        for ($i=0; $i < $length; $i++) { 
        	$typeAnimal = ['name' => $typeAnimalsNames[$i]];
        	TypeAnimal::create($typeAnimal);
        }
    }
}
