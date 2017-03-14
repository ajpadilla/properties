<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\State;
use App\Models\SearchTrait;
use App\Models\SortTrait;

class Municipality extends Model
{

	use SearchTrait, SortTrait;

	public $table = 'municipalities';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'name', 'state_id'];

    
    /**
     * Attributes that are for searchers of the model.
     *
     * @var array
     */
    protected $searchableColumns = [
        'code',
    	'name',
        'state' => [
            'table' => 'states',
            'name'
        ]
    ];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
    */

    protected $appends = [
        'state_name'
    ];

    /**
     * ------ Relations ------ 
    */

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    /**
     *
     *-------------------- Accessors and Mutators
     *
    */

    public function getStateNameAttribute()
    {
        if($this->state)
            return $this->state->name;
        return false;
    }

}
