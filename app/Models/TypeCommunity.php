<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SearchTrait;
use App\Models\SortTrait;

class TypeCommunity extends Model
{
	use SearchTrait, SortTrait;

	public $table = 'types_communities';

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
