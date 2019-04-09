<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariableDecimal extends Model
{
    public function value()
    {
    	return $this->morphOne(\App\Variable::class, 'value');
    }
}
