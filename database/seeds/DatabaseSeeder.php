<?php

use Illuminate\Database\Seeder;
use App\Application;
use App\District;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	foreach([
    		'0010' => 'Mapleton 1',
    		'1570' => 'Estes Park R-3',
    	] as $code => $name) {
    		$district = District::create(['code' => $code, 'name' => $name]);
    		foreach(['2017', '2018', '2019'] as $year) {
	    		factory(Application::class, rand(5, 15))->create(['district_id' => $district->getKey(), 'year' => $year])->each(function($app) {

	        	});
	    	}
    	}
    }
}
