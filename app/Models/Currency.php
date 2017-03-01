<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
	use SearchTrait, SortTrait;

	public $table = 'currencies';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    
    /**
     * Attributes that are for searchers of the model.
     *
     * @var array
     */
    protected $searchableColumns = [
    	'name'
    ];
}
