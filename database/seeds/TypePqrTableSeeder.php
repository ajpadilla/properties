<?php

use Illuminate\Database\Seeder;
use App\Models\TypePqr;

class TypePqrTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\Eloquent::unguard();

        $typePqr = [ 
        	'Mala atención al usuario', 
        	'Pérdida de documentos', 
        	'Mal funcionamiento',
        	'Reclamos por robo',
        	'Mejor servicio', 
        	'Mejor trato'
        ];

        $length = count($typePqr);

        for ($i=0; $i < $length; $i++) { 
        	$pqr = ['name' => $typePqr[$i]];
        	TypePqr::create($pqr);
        }
    }
}
