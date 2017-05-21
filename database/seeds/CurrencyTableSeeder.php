<?php

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\Eloquent::unguard();

        $currencies = [ 
        	'Bolivares', 
        	'Pesos Colombianos', 
        	'Pesos Mexicanos',
        	'Dolares',
        	'Euros'
        ];

        $length = count($currencies);

        for ($i=0; $i < $length; $i++) { 
        	$currency = ['name' => $currencies[$i]];
        	Currency::create($currency);
        }
    }
}
