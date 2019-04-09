<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariableText extends Model
{
    public function value()
    {
    	return $this->morphOne(\App\Variable::class, 'value');
    }
}
