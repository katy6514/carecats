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


Route::get('/animals/{sub_species?}', 'AnimalController@getIndex');


Route::get('/animal/edit/{id?}', 'AnimalController@getEdit');
Route::post('/animal/edit', 'AnimalController@postEdit');

Route::get('/animal/create', 'AnimalController@getCreate');
Route::post('/animal/create', 'AnimalController@postCreate');

Route::get('/animals/show/{id?}', 'AnimalController@getShow');







Route::get('/test', function(){

    // $animal1 = DB::table('animals')->where('id', '=', 1)->first();
    // dump($animal1->name);
});

Route::get('/createCat', function() {

    $faker = Faker\Factory::create();

    $animal = new \CareCats\Animal();

    $dates = array();
    for ($j=0; $j < 3; $j++) {
        array_push($dates, $faker->date($format = 'Y-m-d', $max = 'now'));
    }
    sort($dates);

    $animal->name = "Tabula";
    $animal->sex = "female";
    $animal->sub_species = "lion";
    $animal->enclosure = "F";
    $animal->birth_date = $dates[0];
    $animal->care_date = $dates[1];
    $animal->rainbow_date = $dates[2];

    $animal->save();

    echo "Added: ".$animal->name;

});

// Route::get('/readCat', function() {
//     // $animals = \CareCats\Animal::first();
//     //
//     // dump($animals);
//
//
//     $animals = \CareCats\Animal::where('sub_species', 'LIKE', '%tiger%')->get();
//     # Make sure we have results before trying to print them...
//     if(!$animals->isEmpty()) {
//
//         // Output the procedures
//         foreach($animals as $animal) {
//             echo $animal->name.' : '.$animal->sub_species.'<br>';
//         }
//     }
//     else {
//         echo 'No animals found';
//     }
// });



Route::get('/updateCat', function() {
    # First get a procedure to update
    $animals = \CareCats\Animal::where('sub_species', 'LIKE', '%tiger%')->get();

    # If we found the procedure, update it
    if($animals) {

        foreach($animals as $animal) {
            # Give it a different title
            $animal->sub_species = 'lion';

            # Save the changes
            $animal->save();
        }

        echo "Update complete; check the database to see if your update worked...";
    }
    else {
        echo "Animals not found, can't update.";
    }

});

Route::get('/modelCat', function() {

    $animal = new \CareCats\Animal;
    $animal->name = 'Ace';
    $animal->sex = 'male';
    $animal->sub_species = 'jaguar';
    $animal->enclosure = 'J';

    $animal->save();
    dump($animal->toArray());

    $procedure = new \CareCats\Procedure;
    $procedure->title = "Hates Derek";
    $procedure->symptoms = "grumpy around derek";
    $procedure->comments = "nothing to do!";
    $procedure->animal()->associate($animal); # <--- Associate the author with this procedure

    $procedure->save();
    dump($procedure->toArray());

});


Route::get('/modelQuery', function() {
    $procedure = \CareCats\Procedure::first();

    dump($procedure->toArray());

    # Get the animal from this procedure using the "animal" dynamic property
    # "animal" corresponds to the the relationship method defined in the procedure model
    $animal = $procedure->animal;

    dump($animal->toArray());

    echo $procedure->title." was performed on ".$animal->name;

    # Gets all procedures and the animals they were performed on
    $procedures = \CareCats\Procedure::with('animal')->get();

    dump($procedures->toArray());


});

Route::get('/eagerCat', function() {
    # If you're querying for many things, you may want to join in the related data with the query. This can be done via the with() method and is referred to as eager loading:
    # Eager load the animal with the procedure
    $procedures = \CareCats\Procedure::with('animal')->get();

    foreach($procedures as $procedure) {
        echo 'Name: '.$procedure->animal->name.', procedure: '.$procedure->title.'<br>';
    }


});

Route::get('/sponsorCat', function() {
    // $book = \App\Book::where('title','=','The Great Gatsby')->first();
    //
    // echo $book->title.' is tagged with: ';
    // foreach($book->tags as $tag) {
    //     echo $tag->name.' ';
    // }

    $animal = \CareCats\Animal::where('name','=','Matt')->first();

    echo '<br /><br />'.$animal->name.' is sponsored by: ';
    foreach($animal->sponsors as $sponsor) {
        echo $sponsor->first_name.', ';
    }
});

Route::get('/sponsorCat2', function() {
    #eagerly loaded
    $animals = \CareCats\Animal::with('sponsors')->get();

    foreach($animals as $animal) {
        echo '<br>'.$animal->name.' is sponsored by: ';
        foreach($animal->sponsors as $sponsor) {
            echo $sponsor->first_name.', ';
        }
    }
});

# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');

# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

# Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');

# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/confirm-login-worked', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user) {
        echo 'You are logged in.';
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }

    return;

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
    // Use the QueryBuilder to get all the procedures
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
