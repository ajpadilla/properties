<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\SearchTrait;
use App\Models\SortTrait;

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

    public function interests()
    {
    	return $this->belongsToMany(Interest::class, 'briefcase_interest', 'briefcase_id', 'interest_id')->withPivot('percent')->withTimestamps();
    }

    public function dues()
    {
    	return $this->belongsToMany(Due::class, 'briefcase_due', 'briefcase_id', 'due_id')->withPivot('amount')->withTimestamps();
    }

    public function sanctions()
    {
    	return $this->belongsToMany(Sanction::class, 'briefcase_sanction', 'briefcase_id', 'sanction_id')->withPivot('amount')->withTimestamps();
    }


    /**
     *
     * -------Accessors And Mutators------
     *
    */

}
