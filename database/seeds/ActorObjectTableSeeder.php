<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class ActorObjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $roles = [0 => $faker->jobTitle, 1 => $faker->jobTitle];

        factory('App\Actor', 5)->create();
        $actors = App\Actor::get();

        factory('App\Object', 50)->create();
        $objects = App\Object::get();

        foreach ($objects as $object) {
            $objectActors = $this->getActorsWithRoles($actors, $roles);
            $object->actors()->sync($objectActors);
        }
    }

    private function getActorsWithRoles($actors, $roles)
    {
        $faker = Faker\Factory::create();
        $actorCount = rand(1,3);
        for ($i=0; $i < $actorCount; $i++) {
            $actorId = $faker->randomElement(App\Actor::lists('id')->toArray());
            $objectActors[$actorId] = ['role' => $roles[rand(0,1)]];
        }
        return $objectActors;
    }
}
