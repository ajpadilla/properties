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
      ''
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
    */

    protected $appends = [
      'status_format',
      'type_property_related',
      'community_related',
      'person_related',
      'first_photo'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
    */

    protected $dates = [
       'date_construction',
       'start_date_lease',
       'end_date_lease'
    ];

    /**
     * ------ Relations ------ 
    */

    public function typeProperty()
    {
   		return $this->belongsTo(TypeProperty::class);
    }

    public function community()
    {
   		return $this->belongsTo(Community::class);
    }

    public function person()
    {
   		return $this->belongsTo(Person::class);
    }

    public function photos()
    {
      return  $this->hasMany(PropertyPhoto::class);
    }

    /**
     *  Check if there are photos associated with the model.
    */
    public function hasPhotos()
    {
      return $this->photos->count();
    }

    public function briefcases()
    {
      return  $this->hasMany(Briefcase::class);
    }


    /**
     *
     * -------Accessors And Mutators------
     *
    */

    public function setDateConstructionAttribute($value) {
      $this->attributes['date_construction'] = date('Y-m-d', strtotime($value));
    }

    public function setStartDateLeaseAttribute($value) {
      $this->attributes['start_date_lease'] = date('Y-m-d', strtotime($value));
    }

    public function setEndDateLeaseAttribute($value) {
      $this->attributes['end_date_lease'] = date('Y-m-d', strtotime($value));
    }

    public function getStatusFormatAttribute()
    {
      return $this->status ? 'Active' : 'Inactive';
    }

    public function getTypePropertyRelatedAttribute()
    {
      return [
        'text' => $this->typeProperty->name,
        'value' => $this->typeProperty->id
      ];
    }

    public function getCommunityRelatedAttribute()
    {
      return [
        'text' => $this->community->name,
        'value' => $this->community->id
      ];
    }

    public function getPersonRelatedAttribute()
    {
      return [
        'text' => $this->person->first_name,
        'value' => $this->person->id
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
}
