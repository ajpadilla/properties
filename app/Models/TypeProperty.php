<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SearchTrait;
use App\Models\SortTrait;

class TypeProperty extends Model
{

	use SearchTrait, SortTrait;

	public $table = 'type_properties';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    protected $searchableColumns = [
    	'name'
    ];
}
