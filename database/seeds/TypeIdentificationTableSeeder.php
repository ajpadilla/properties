<?php

use Illuminate\Database\Seeder;
use App\Models\TypeIdentification;

class TypeIdentificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \Eloquent::unguard();

        $typeIdentifications = [ 
        	'Credencial para votar (IFE)', 
        	'Pasaporte', 
        	'Cédula',
        	'Cartilla del servicio militar',
        	'Tarjeta de identidad militar', 
        	'Licencia de conducir'
        ];

        $length = count($typeIdentifications);

        for ($i=0; $i < $length; $i++) { 
        	$typeIdentification = ['name' => $typeIdentifications[$i]];
        	TypeIdentification::create($typeIdentification);
        }
    }
}
