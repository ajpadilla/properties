<?php

namespace App\Models;

use App\Models\SearchTrait;
use App\Models\SortTrait;

use Illuminate\Database\Eloquent\Model;

class Sanction extends Model
{
 
 	use SearchTrait, SortTrait;

	public $table = 'sanctions';

	/**
	     * The attributes that are mass assignable.
	     *
	     * @var array
	  */
	protected $fillable = [
		'name', 
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
