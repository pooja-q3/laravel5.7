<?php

use Illuminate\Database\Seeder;

class AssociationSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $authors = factory(App\Author::class, 10)->create();
        $authors->each(function ($author) {
            $author->profile()->save(factory(App\Profile::class)->make());
            $author->posts()->saveMany(factory(App\Post::class, rand(10, 20))->make());
        });
    }

}
