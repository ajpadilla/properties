<?php

use Illuminate\Database\Seeder;
use App\Models\Disability;

class DisabilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\Eloquent::unguard();

        $disabilities = [ 
        	'Autismo', 
        	'Enfermedad crónica', 
        	'Deficiencia visual',
        	'Discapacidad fisica',
        	'Discapacidad sensorial'
        ];

        $length = count($disabilities);

        for ($i=0; $i < $length; $i++) { 
        	$disability = ['name' => $disabilities[$i]];
        	Disability::create($disability);
        }
    }
}
