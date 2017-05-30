<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\SearchTrait;
use App\Models\SortTrait;
use App\Models\Property;
use App\Models\Interest;
use App\Models\Due;
use App\Models\Sanction;

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
        'property_name',
        'property_related',
        'community_related'
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

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function interests()
    {
    	return $this->belongsToMany(Interest::class, 'briefcase_interest', 'briefcase_id', 'interest_id')->withPivot('percent')->withTimestamps();
    }

    public function dues()
    {
    	return $this->belongsToMany(Due::class, 'briefcase_due', 'briefcase_id', 'due_id')
        ->withPivot('amount')->withTimestamps();
    }

    public function sanctions()
    {
    	return $this->belongsToMany(Sanction::class, 'briefcase_sanction', 'briefcase_id', 'sanction_id')
        ->withPivot('amount')->withTimestamps();
    }


    /**
     *
     * -------Accessors And Mutators------
     *
    */

    public function setDateCutAttribute($value) {
      $this->attributes['date_cut'] = date('Y-m-d', strtotime($value));
    }

    public function setPublicationDateAttribute($value) {
      $this->attributes['publication_date'] = date('Y-m-d', strtotime($value));
    }

    public function getPropertyNameAttribute()
    {
      if($this->property)
        return $this->property->number;
      return false;
    }

    public function getCommunityRelatedAttribute()
    {
      return [
        'text' => $this->property->community->name, 
        'value' => $this->property->community->id
      ];
    }

    public function getPropertyRelatedAttribute()
    {
      return [
        'text' => $this->property->number, 
        'value' => $this->property->id
      ];
    }

    public function scopeAvailableInterests($query, $id)
    {
        $interestsId = $query->findOrFail($id)->interests->pluck('id');
        return Interest::whereNotIn('id', $interestsId)->pluck('name', 'id');
    }

    public function scopeAvailableSanctions($query, $id)
    {
        $sanctionsId = $query->findOrFail($id)->sanctions->pluck('id');
        return Sanction::whereNotIn('id', $sanctionsId)->pluck('name', 'id');
    }



}
