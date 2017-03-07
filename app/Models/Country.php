<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    	'name'
    ];

}
