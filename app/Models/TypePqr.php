<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SearchTrait;
use App\Models\SortTrait;

class TypePqr extends Model
{
	use SearchTrait, SortTrait;

	public $table = 'type_pqr';

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
