<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\SearchTrait;
use App\Models\SortTrait;
use App\Models\Municipality;
use App\Models\TypeCommunity;
use App\Models\CommunityPhoto;

class Community extends Model
{
  use SearchTrait, SortTrait;

	public $table = 'communities';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
  */
  protected $fillable = [
    'nit', 
    'name', 
    'home_phone',
    'auxiliary_phone',
    'cell_phone',
    'auxiliary_cell',
    'home_email',
    'auxiliary_email',
    'address',
    'status',
    'opening_date',
    'cancellation_date',
    'reason_retiring',
    'municipality_id',
    'type_community_id'
  ];


    /**
     * Attributes that are for searchers of the model.
     *
     * @var array
     */
    protected $searchableColumns = [
      'nit',
      'name',
      'municipality' => [
        'table' => 'municipalities',
        'name'
      ],
      'typeCommunity' => [
        'table' => 'types_communities',
        'name'
      ]
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
     * ------ Relations ------ 
    */

    public function municipality()
    {
      return $this->belongsTo(Municipality::class);
    }

    public function typeCommunity()
    {
      return $this->belongsTo(TypeCommunity::class);
    }

    public function photos()
    {
      return  $this->hasMany(CommunityPhoto::class);
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

    public function setOpeningDateAttribute($value) {
      $this->attributes['opening_date'] = date('Y-m-d', strtotime($value));
    }

    public function setCancellationDateAttribute($value) {
      $this->attributes['cancellation_date'] = $value ? date('Y-m-d', strtotime($value)) : NULL;
    }

    public function getStatusFormatAttribute()
    {
      return $this->status ? 'Active' : 'Inactive';
    }

    public function getMunicipalityNameAttribute()
    {
      if($this->municipality)
        return $this->municipality->name;
      return false;
    }

    public function getTypeCommunityNameAttribute()
    {
      if($this->typeCommunity)
        return $this->typeCommunity->name;
      return false;
    }

    public function getCountryRelatedAttribute()
    {
      return [
        'text' => $this->municipality->state->country->name, 
        'value' => $this->municipality->state->country->id
      ];
    }

    public function getStateRelatedAttribute()
    {
      return [
        'text' => $this->municipality->state->name, 
        'value' => $this->municipality->state->id
      ];
    }

    public function getMunicipalityRelatedAttribute()
    {
        return [
          'text' => $this->municipality->name, 
          'value' => $this->municipality->id
        ];
    }

    public function getTypeCommunityRelatedAttribute()
    {
        return [
          'text' => $this->typeCommunity->name, 
          'value' => $this->typeCommunity->id
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
