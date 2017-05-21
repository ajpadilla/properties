<?php

use Illuminate\Database\Seeder;
use App\Models\TypeRepresentative;

class TypeRepresentativeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\Eloquent::unguard();

        $typeRepresentatives = [ 
        	'Asamblea de Ciudadanos', 
        	'Coordinación Comunitaria', 
        	'Unidad Administrativa',
        	'Unidad de contraloría Social',
        	'Unidad Ejecutiva', 
        ];

        $length = count($typeRepresentatives);

        for ($i=0; $i < $length; $i++) { 
        	$typeRepresentative = ['name' => $typeRepresentatives[$i]];
        	TypeRepresentative::create($typeRepresentative);
        }
    }
}
