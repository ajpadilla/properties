<?php

use Illuminate\Database\Seeder;
use App\Models\TypeCommunity;

class TypeCommunityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\Eloquent::unguard();

        $typeCommunities = [ 
        	'Comunidad urbana', 
        	'Comunidad rural', 
        	'Comunidad liberal',
        	'suburbanas',
        ];

        $length = count($typeCommunities);

        for ($i=0; $i < $length; $i++) { 
        	$typeCommunity = ['name' => $typeCommunities[$i]];
        	TypeCommunity::create($typeCommunity);
        }
    }
}
