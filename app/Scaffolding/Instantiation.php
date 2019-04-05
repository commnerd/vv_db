<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instantiation extends Model
{
    public $timestamps = false;
    protected $table = "objects";
}

<?php

namespace App\Scaffolding;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
	        public $timestamps = false;
}

