<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

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
        'country_name'
    ];

    /**
     * ------ Relations ------ 
    */

    public function country()
    {
        return $this->belongsTo(Country::class);
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

}
