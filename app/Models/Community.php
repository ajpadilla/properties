<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\SearchTrait;
use App\Models\SortTrait;
use App\Models\Municipality;
use App\Models\TypeCommunity;

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
      'municipality_related',
      'type_community_related',
      'status_format'
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

    public function getMunicipalityRelatedAttribute()
    {
        return ['text' => $this->municipality->name, 'value' => $this->municipality->id];
    }

    public function getTypeCommunityRelatedAttribute()
    {
        return ['text' => $this->typeCommunity->name, 'value' => $this->typeCommunity->id];
    }

}