<?php

namespace App\Scaffolding;

use Illuminate\Database\Eloquent\Model;

class Instantiation extends Model
{
    public $timestamps = false;

    protected $fillable = ['entity_id'];
}
