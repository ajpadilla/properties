<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\Municipality;
use App\Models\SearchTrait;
use App\Models\SortTrait;

class State extends Model
{
	use SearchTrait, SortTrait;

	public $table = 'states';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'name', 'area_code', 'country_id'];

    
    /**
     * Attributes that are for searchers of the model.
     *
     * @var array
     */
    protected $searchableColumns = [
        'code',
    	'name',
        'area_code',
        'country' => [
            'table' => 'countries',
            'name'
        ]
    ];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
    */

    protected $appends = [
        'country_name',
        'country_related'
    ];

    /**
     * ------ Relations ------ 
    */

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }

    /**
     *
     *-------------------- Accessors and Mutators
     *
    */

    public function getCountryNameAttribute()
    {
        if($this->country)
            return $this->country->name;
        return false;
    }

    public function getCountryRelatedAttribute()
    {
        return ['text' => $this->country->name, 'value' => $this->country->id];
    }

}
