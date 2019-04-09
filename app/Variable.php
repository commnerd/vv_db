<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    public function value()
    {
    	return $this->morphTo();
    }
}
