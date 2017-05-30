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
      'income_level',
      'expenses_level',
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
      'identification_number',
      'first_name',
      'cityBirth' => [
        'table' => 'municipalities',
        'name'
      ],
      'disability' => [
        'table' => 'disabilities',
        'name'
      ],
      'educationalLevel' => [
        'table' => 'educational_levels',
        'name'
      ],
      'typeIdentification' => [
        'table' => 'type_identifications',
        'name'
      ],
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
    */

    protected $appends = [
      'country_related',
      'state_related',
      'city_birth_related',
      'disability_related',
      'educational_level_related',
      'type_identification_related',
      'first_photo'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
    */

    protected $dates = [
        'birth_date',
        'admission_date',
        'cancellation_date'
    ];

    /**
     * ------ Relations ------ 
    */

    public function cityBirth()
    {
      return $this->belongsTo(Municipality::class);
    }

    public function disability()
    {
      return $this->belongsTo(Disability::class);
    }

    public function educationalLevel()
    {
      return $this->belongsTo(EducationalLevel::class);
    }

    public function typeIdentification()
    {
      return $this->belongsTo(TypeIdentification::class);
    }
      
    public function photos()
    {
      return  $this->hasMany(PersonPhoto::class);
    }


    /**
     *  Check if there are photos associated with the model.
    */
    public function hasPhotos()
    {
      return $this->photos->count();
    }

    /**
     *
     * -------Accessors And Mutators------
     *
    */

    public function setAdmissionDateAttribute($value) {
      $this->attributes['admission_date'] = date('Y-m-d', strtotime($value));
    }

    public function setCancellationDateAttribute($value) {
      $this->attributes['cancellation_date'] = $value ? date('Y-m-d', strtotime($value)) : NULL;
    }

    public function setBirthDateAttribute($value) {
      $this->attributes['birth_date'] = date('Y-m-d', strtotime($value));
    }

    public function getCountryRelatedAttribute()
    {
      return [
        'text' => $this->cityBirth->state->country->name, 
        'value' => $this->cityBirth->state->country->id
      ];
    }

    public function getStateRelatedAttribute()
    {
      return [
        'text' => $this->cityBirth->state->name, 
        'value' => $this->cityBirth->state->id
      ];
    }

    public function getCityBirthRelatedAttribute()
    {
        return [
          'text' => $this->cityBirth->name, 
          'value' => $this->cityBirth->id
        ];
    }

    public function getDisabilityRelatedAttribute()
    {
      if(count($this->disability)){
        return [
          'text' => $this->disability->name, 
          'value' => $this->disability->id
        ];
      }else{
        return [
          'text' => '', 
          'value' => ''
        ];

      }
    }

    public function getEducationalLevelRelatedAttribute()
    {
      return [
          'text' => $this->educationalLevel->name, 
          'value' => $this->educationalLevel->id
      ];
    }

    public function getTypeIdentificationRelatedAttribute()
    {
      return [
          'text' => $this->typeIdentification->name, 
          'value' => $this->typeIdentification->id
      ];
    }


    /**
     *  Return the first photo associated with the model.
    */
    public function getFirstPhotoAttribute()
    {
        if ($this->hasPhotos()) {
            foreach ($this->photos as $photo) {
                return $photo;
            }
        }
        return false;
    }

    public function getFullNameAttribute()
    {
      return $this->first_name." ". $this->second_name ." ". $this->first_surname ." ".$this->second_surname;
    }

}
