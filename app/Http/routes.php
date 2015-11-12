<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/cats','CatController@getIndex');
Route::post('/cats','CatController@postIndex');


Route::get('/createCat', function() {
    $animal = new \CareCats\Animal();

    $animal->name = "Tabula";
    $animal->enclosure = "F";

    $animal->save();

    echo "Added: ".$animal->name;

});
Route::get('/readCat', function() {
    // $animals = \CareCats\Animal::first();
    //
    // dump($animals);


    $animals = \CareCats\Animal::all();
    # Make sure we have results before trying to print them...
    if(!$animals->isEmpty()) {

        // Output the books
        foreach($animals as $animal) {
            echo $animal->name.'<br>';
        }
    }
    else {
        echo 'No animals found';
    }
});

Route::get('/updateCat', function() {
});


Route::get('/deleteCat', function() {
});


Route::get('/practice', function() {

    // $data = Array('foo' => 'bar');
    // Debugbar::info($data);
    // Debugbar::error('Error!');
    // Debugbar::warning('Watch out…');
    // Debugbar::addMessage('Another message', 'mylabel');
    //
    // return 'Practice';
    // Use the QueryBuilder to get all the books
    $animals = DB::table('animals')->get();

    // Output the results
    foreach ($animals as $animal) {
        echo $animal->name;
    }
});

Route::get('/faker', function () {
    $faker = Faker\Factory::create();

    $dates = array();

    for ($i=0; $i < 3; $i++) {
        array_push($dates, $faker->date($format = 'Y-m-d', $max = 'now'));
    }

    sort($dates);
    dump($dates[0]);
    dump($dates[1]);
    dump($dates[2]);

    // echo min($dates);
    // echo "<br />";
    // echo max($dates);

    // generate data by accessing properties
    // echo $faker->name;
    //   // 'Lucy Cechtelar';
    // echo $faker->address;
    //   // "426 Jordy Lodge
    //   // Cartwrightshire, SC 88120-6700"
    // echo $faker->text;
    // echo $faker->date($format = 'm-d-Y', $max = 'now');
    // echo "<br />";
    // echo $faker->date($format = 'm-d-Y', $max = 'now');
});


Route::get('/drop', function() {

    if(App::environment('local')) {

        DB::statement('DROP database carecats');
        DB::statement('CREATE database carecats');

        return 'Dropped carecats; created carecats.';
    };
});


Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});
