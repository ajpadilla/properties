<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SearchTrait;
use App\Models\SortTrait;

class Person extends Model
{
  use SearchTrait, SortTrait;

	public $table = 'persons';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
  	*/

  	protected $fillable = [
  		'identification_number',
  		'business_name',
  		'first_name',
  		'second_name',
  		'first_surname',
  		'second_surname',
  		'home_phone',
  		'auxiliary_phone',
  		'cell_phone',
  		'auxiliary_cell',
  		'home_email',
  		'auxiliary_email',
  		'correspondence_address',
  		'city_correspondence',
  		'country_correspondence',
  		'office_address',
  		'city_office',
  		'country_office',
  		'birth_date',
  		'gender',
  		'civil_status',
  		'cod_labor_activity',
  		'admission_date',
  		'cancellation_date',
  		'status',
  		'city_birth_id',
  		'disability_id',
  		'educational_level_id',
  		'type_identification_id',
  	];

    /**
     * Attributes that are for searchers of the model.
     *
     * @var array
     */
    protected $searchableColumns = [
      'name',
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

    public function setOpeningDateAttribute($value) {
      $this->attributes['admission_date'] = date('Y-m-d', strtotime($value));
    }

    public function setCancellationDateAttribute($value) {
      $this->attributes['cancellation_date'] = $value ? date('Y-m-d', strtotime($value)) : NULL;
    }

}
