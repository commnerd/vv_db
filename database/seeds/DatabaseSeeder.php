<?php

use Illuminate\Database\Seeder;

use App\Title1Narrative;
use App\Application;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

	    factory(Application::class, rand(10, 50))->create()->each(function($app) {
            $id = $app->getKey();
		    $t1 = factory(Title1Narrative::class)->create([
                'application' => $id,
            ]);
        });
    }
}
