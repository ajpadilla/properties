<?php

use Illuminate\Database\Seeder;
use App\Models\EducationalLevel;

class EducationalLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\Eloquent::unguard();

        $educationalLevels = [ 
        	'Preescolar', 
        	'básica', 
        	'media',
        	'tecnica',
        	'universitaria'
        ];

        $length = count($educationalLevels);

        for ($i=0; $i < $length; $i++) { 
        	$educationalLevel = ['name' => $educationalLevels[$i]];
        	EducationalLevel::create($educationalLevel);
        }
    }
}
