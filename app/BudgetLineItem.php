<?php

namespace App;

class BudgetLineItem extends Base
{
    protected $fillable = [
    	'fund_id',
    	'funding_source',
    	'activity_category',
    	'program_code',
    	'object_code',
    	'salary_position',
    	'fte',
    	'amount',
    ];
}
