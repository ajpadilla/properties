<?php

use Illuminate\Database\Seeder;
use App\Models\TypeProperty;

class TypePropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\Eloquent::unguard();

        $typePropertiesNames = [ 
        	'Finca', 
        	'Hacienda', 
        	'Terreno',
        	'Casa',
        	'Apartamento', 
        	'Local'
        ];

        $length = count($typePropertiesNames);

        for ($i=0; $i < $length; $i++) { 
        	$propertyType = ['name' => $typePropertiesNames[$i]];
        	TypeProperty::create($propertyType);
        }
    }
}
