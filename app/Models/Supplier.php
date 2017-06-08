<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SearchTrait;
use App\Models\SortTrait;

class Supplier extends Model
{
 
 	use SearchTrait, SortTrait;

	public $table = 'suppliers';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
  	*/

  	protected $fillable = [
  		'identification_number',
  		'supplier_regime',
  		'business_name',
  		'legal_representative',
  		'economic_activity',
  		'admission_date',
  		'address',
  		'home_phone',
  		'auxiliary_phone',
  		'cell_phone',
  		'auxiliary_cell',
  		'home_email',
  		'auxiliary_email',
  		'type_identification_id'
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
      'type_identification_related'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
    */

    protected $dates = [
        'admission_date',
    ];

    /**
     * ------ Relations ------ 
    */

    public function typeIdentification()
    {
      return $this->belongsTo(TypeIdentification::class);
    }
      
    /**
     *
     * -------Accessors And Mutators------
     *
    */

    public function setAdmissionDateAttribute($value) {
      $this->attributes['admission_date'] = date('Y-m-d', strtotime($value));
    }

    public function getTypeIdentificationRelatedAttribute()
    {
        return [
          'text' => $this->typeIdentification->name, 
          'value' => $this->typeIdentification->id
        ];
    }

}
