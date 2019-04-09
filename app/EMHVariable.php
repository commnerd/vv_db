<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EMHVariable extends Pivot
{
    const LABELS = [
    	'Elementary',
    	'Middle',
    	'High',
    ];

    protected $fillable = ['label'];
}
