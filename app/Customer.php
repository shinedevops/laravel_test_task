<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Customer extends Model
{

	use Sortable;
    public $timestamps = true;
    protected $fillable = [
    	'name',
        'contact_person',
        'email',
        'mobile',
        'number_of_sites',
		'status',
		'created_at',
		'updated_at',
    ];
	public $sortable = [ 
		'id',
    	'name',
        'contact_person',
        'email',
        'mobile',
        'number_of_sites',
		'status',
		'created_at',
		'updated_at',
    ];
    public static $createRules = [
        'name' => 'required|unique:customers',
        'email' => 'required|unique:customers',
        'mobile' => 'required|unique:customers',
        'contact_person' => 'required',
        'status' => 'required|numeric|in:0,1',
        'number_of_sites' => 'required|numeric',
    ];
}
