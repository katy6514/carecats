<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AnimalSponsorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # First, create an array of all the books we want to associate tags with
           # The *key* will be the book title, and the *value* will be an array of tags.
        //    $books =[
        //        'The Great Gatsby' => ['novel','fiction','classic','wealth'],
        //        'The Bell Jar' => ['novel','fiction','classic','women'],
        //        'I Know Why the Caged Bird Sings' => ['autobiography','nonfiction','classic','women']
        //    ];

        # First, create an array of all the animals we want to associate sponsors with
        # The *key* will be the animal name, and the *value* will be an array of sponsor first_names.
        $animal_model1 = DB::table('animals')->where('id', '=', 1)->first();
        $animal_model2 = DB::table('animals')->where('id', '=', 2)->first();
        $animal_model3 = DB::table('animals')->where('id', '=', 3)->first();
        $animal_model4 = DB::table('animals')->where('id', '=', 4)->first();
        $animal_model5 = DB::table('animals')->where('id', '=', 5)->first();
        $animal1 = $animal_model1->name;
        $animal2 = $animal_model2->name;
        $animal3 = $animal_model3->name;
        $animal4 = $animal_model4->name;
        $animal5 = $animal_model5->name;

        $sponsor_model1 = DB::table('sponsors')->where('id', '=', 1)->first();
        $sponsor_model2 = DB::table('sponsors')->where('id', '=', 2)->first();
        $sponsor_model3 = DB::table('sponsors')->where('id', '=', 3)->first();
        $sponsor_model4 = DB::table('sponsors')->where('id', '=', 4)->first();
        $sponsor_model5 = DB::table('sponsors')->where('id', '=', 5)->first();
        $sponsor1 = $sponsor_model1->first_name;
        $sponsor2 = $sponsor_model2->first_name;
        $sponsor3 = $sponsor_model3->first_name;
        $sponsor4 = $sponsor_model4->first_name;
        $sponsor5 = $sponsor_model5->first_name;

        $animals =[
            $animal1 => [$sponsor1,$sponsor2,$sponsor3,$sponsor4],
            $animal2 => [$sponsor2,$sponsor3,$sponsor4,$sponsor5],
            $animal3 => [$sponsor3,$sponsor4,$sponsor5,$sponsor1],
            $animal4 => [$sponsor4,$sponsor5,$sponsor1,$sponsor2],
            $animal5 => [$sponsor5,$sponsor1,$sponsor2,$sponsor3]
            // 'Kailyn' =>     ['Dovie','Mary','Tom','Mose'],
            // 'Cristopher' => ['Dovie','Alek','Tom','Rod'],
            // 'Matt' =>       ['Dovie','Mary','Alek','Amber']
        ];

        # Now loop through the above array, creating a new pivot for each book to tag
        // foreach($books as $title => $tags) {
        foreach($animals as $name => $sponsors) {

            # First get the book
            // $book = \App\Book::where('title','like',$title)->first();
            $animal = \CareCats\Animal::where('name','like',$name)->first();

            # Now loop through each tag for this book, adding the pivot
            // foreach($tags as $tagName) {
            foreach($sponsors as $sponsorName) {
                //$tag = \App\Tag::where('name','LIKE',$tagName)->first();
                $sponsor = \CareCats\Sponsor::where('first_name','LIKE',$sponsorName)->first();

                # Connect this tag to this book
                //$book->tags()->save($tag);
                $animal->sponsors()->save($sponsor);
            }

        }
    }
}
