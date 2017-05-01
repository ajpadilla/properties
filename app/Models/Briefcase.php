<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\SearchTrait;
use App\Models\SortTrait;

class Briefcase extends Model
{	
	use SearchTrait, SortTrait;

	public $table = 'briefcases';

  /**
     * The attributes that are mass assignable.
     *
     * @var array
  */
  protected $fillable = [
    'date_cut', 
    'publication_date', 
    'honorarium',
    'total_capital',
    'total_sanction',
    'total_interest',
    'total_debt',
    'debt_indicator',
    'sms_indicator',
    'positive_balance',
    'application_code',
    'debt_height',
    'property_id'
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
      'municipality_name',
      'type_community_name',
      'country_related',
      'state_related',
      'municipality_related',
      'type_community_related',
      'status_format',
      'first_photo'
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
    */

     protected $dates = [
        'opening_date', 
        'cancellation_date'
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
