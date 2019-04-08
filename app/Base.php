<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Scaffolding\Instantiation;
use App\Scaffolding\Variable;
use App\Scaffolding\Entity;

abstract class Base extends Model
{
	const YEAR = '2019/2020';

	private $_label;

	protected $entity;
	protected $instantiation;

	public function save(array $options = [])
    {
    	$this->_label = (new \ReflectionClass($this))->getShortName();
		$this->entity = Entity::where(['year' => self::YEAR, 'label' => $this->_label])->first();
		$exists = !!$this->entity;
		if(!$exists) {
			$this->entity = Entity::create([
				'year' => self::YEAR,
				'label' => $this->_label,
			]);
		}

		if(!isset($this->instantiation)) {
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

	public function getKey() {
		if(!is_null($this->instantiation)) {
			return $this->instantiation->getKey();
		}
		return null;
	}
}
