<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Currency;
use App\Models\SearchTrait;
use App\Models\SortTrait;

class Country extends Model
{

	use SearchTrait, SortTrait;

	public $table = 'countries';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'name', 'language', 'currency_id'];

    
    /**
     * Attributes that are for searchers of the model.
     *
     * @var array
     */
    protected $searchableColumns = [
        'code',
    	'name',
        'language',
        'currency' => [
            'table' => 'currencies',
            'name'
        ]
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
    */

    protected $appends = [
        'currency_name'
    ];


    /**
     * ------ Relations ------ 
    */

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     *
     *-------------------- Accessors and Mutators
     *
    */

    public function getCurrencyNameAttribute()
    {
        if($this->currency)
            return $this->currency->name;
        return false;
    }

}
