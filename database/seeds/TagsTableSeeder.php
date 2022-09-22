<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = [
            '#funny',
            '#sad',
            '#depressed',
            '#food',
            '#foodporn',
            '#cars',
            '#foodlovers',
            '#nopainnogain',
            '#growth',
            '#historypills',
        ];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->save();
        }
    }
}
