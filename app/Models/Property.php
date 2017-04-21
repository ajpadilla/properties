<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SearchTrait;
use App\Models\SortTrait;

class Property extends Model
{
	use SearchTrait, SortTrait;

	public $table = 'properties';

  	protected $fillable = [
		'description',
		'number',
		'area',
		'number_habitants',
		'number_pets',
		'address',
		'registration_number',
		'date_construction',
		'status',
		'reside_property',
		'type_contract',
		'start_date_lease',
		'end_date_lease',
		'type_property_id',
		'community_id',
		'person_id'
	];

	/**
     * Attributes that are for searchers of the model.
     *
     * @var array
    */
    protected $searchableColumns = [

    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
    */

    protected $appends = [
      
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
    */

    protected $dates = [
       
    ];

    /**
     * ------ Relations ------ 
    */


    /**
     *
     * -------Accessors And Mutators------
     *
    */

}
