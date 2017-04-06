<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
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

}
