<?php

use Illuminate\Database\Seeder;

use app\Scaffolding\Instantiation;
use App\Title1Fund;
use App\Title1Narrative;
use App\Application;
use App\BudgetLineItem;

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
		    factory(Title1Narrative::class)->create([
                'application' => $id,
            ]);
            $fund = factory(Title1Fund::class)->create([
                'application' => $id,
            ]);

            factory(BudgetLineItem::class, rand(10, 50))->create([
                'fund_id' => $fund->getKey(),
            ]);
        });
    }
}
