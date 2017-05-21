<?php

use Illuminate\Database\Seeder;
use App\Models\TypeInfraction;

class TypeInfractionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\Eloquent::unguard();

        $typeInfractions = [ 
        	'Leve', 
        	'Grave', 
        	'Muy grave',
        	'Sanción',
        	'Por facturas atrasadas', 
        ];

        $length = count($typeInfractions);

        for ($i=0; $i < $length; $i++) { 
        	$typeInfraction = ['name' => $typeInfractions[$i]];
        	TypeInfraction::create($typeInfraction);
        }
    }
}
