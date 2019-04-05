<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Scaffolding\Instantiation;
use App\Scaffolding\Variable;
use App\Scaffolding\Entity;

class Base
{
	const YEAR = '2019/2020';

	private $_label;

	protected $entity;
	protected $instantiation;
	protected $attributes= [];

	public static function newCollection() {
		return new Collection();
	}
	
	public static function create(array $arr)
	{
		$var = new self();
		foreach($arr as $key => $val) {
			$var->{$key} = $val;
		}
		$var->save();
	}

	public function __construct()
	{
		$this->_label = (new \ReflectionClass($this))->getShortName();
		$this->entity = Entity::where(['year' => self::YEAR, 'label' => $this->_label])->first();
		$exists = !!$this->entity;
		if(!$exists) {
			Entity::create([
				'year' => self::YEAR,
				'label' => $this->_label,
			]);
		}
	}

	public function __get($label)
       	{
		return $this->attributes[$label];
	}

	public function __set($label, $value)
       	{
		$this->attributes[$label] = $value;
	}

	public function save(): self
       	{
		if(is_null($this->instantiation)) {
			$this->instantiation = Instantiation::create(['entity_id' => $this->entity->id]);
		}

		foreach($this->attributes as $key => $val) {
			Variable::create([
				'instantiation_id' => $this->instantiation->id,
				'key' => $key,
				'val' => $val,
			]);
		}
	}
}
