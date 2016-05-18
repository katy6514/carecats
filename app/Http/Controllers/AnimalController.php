<?php

namespace CareCats\Http\Controllers;

use Illuminate\Http\Request;

use CareCats\Http\Requests;
use CareCats\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;


class AnimalController extends Controller
{

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /animals
    */
    public function getIndex($sub_species = null) {
        //$animals = \CareCats\Animal::where('sub_species', 'LIKE', $sub_species)->get();

        $all_animals = \CareCats\Animal::all();

        //dump($all_animals->toArray());

        if(!($sub_species == null)) {
            //echo "list all the ".$sub_species;
            $filtered = $all_animals->where('sub_species',$sub_species);
            $one_filtered = $filtered->first();
            $animal_sub_species = ucfirst($one_filtered['sub_species']);

            //echo $animal_sub_species;
            //dump($filtered->first()->toArray());
            return view('animals')
                ->with('animals', $filtered)
                ->with('animal_sub_species', $animal_sub_species);
        }
        else {
            return view('animals')
                ->with('animals', $all_animals);
        }

    }

    /**
     * Responds to requests to GET /books/show/{id}
     */
    public function getShow($id = null) {

        $animal = \CareCats\Animal::find($id);

        $img = Image::make('img/babyLion1.jpg');

                if(is_null($animal)) {
                    \Session::flash('message','Animal not found');
                    return redirect('/animals');
                } else {
                    return view('animal')
                        ->with('img',$img)
                        ->with('animal',$animal);
                }
    }

    /**
     * Responds to requests to GET /books/create
     */
    public function getCreate() {
        //return 'Form to create a new animal';
        $animalModel = new \CareCats\Animal();
        //$animals_for_dropdown = $animalModel->getAnimalsForDropdown();
        $animals_for_dropdown = ["tiger","bobcat","cougar","leopard","lions"];

        return view('animals.create')
            ->with('animals_for_dropdown',$animals_for_dropdown);
    }

    /*
        Responds to requests to POST /books/create
     */

        // $animal->save();
        //
        // echo "Added: ".$animal->name;

    public function postCreate(Request $request) {
        #dump($request);
        #sub_species must actually be an animal, not a "pick a type"

        $this->validate($request,[
            'name' => 'required',
            'sub_species' => 'required',
            'sex' => 'required',
            'enclosure' => 'required',
            ]
        );

        # Enter book into the database
        $animal = new \CareCats\Animal();

        $animal->name           = $request->name;
        $animal->sub_species    = $request->sub_species;
        $animal->sex            = $request->sex;
        $animal->bio            = $request->bio;
        $animal->enclosure      = $request->enclosure;
        $animal->birth_date     = $request->birth_date;
        $animal->care_date      = $request->care_date;

        $animal->save();

        # Done
        \Session::flash('flash_message','Your animal was added!');
        return redirect('/animals');
    }

    // ---------------------------------------------
    //      Responds to GET /animal/edit/{id?}
    // ---------------------------------------------

    public function getEdit($id) {
        $animal = \CareCats\Animal::find($id);

        if(is_null($id)) {
            \Session::flash('message','Animal not found');
            return redirect('/animals');
        }
        // if($book->user_id != \Auth::id()) {
        //     \Session::flash('message','You do not have access to edit that book.');
        //     return redirect('/books');
        // }
        //$authors_for_dropdown = \App\Author::authorsForDropdown();
        $animals_for_dropdown = ["tiger","bobcat","cougar","leopard","lions"];

        return view('animals.edit')
            ->with('animal',$animal)
            ->with('animals_for_dropdown',$animals_for_dropdown);

    }

    // ---------------------------------------------
    //      Responds to POST /animal/edit/{id?}
    // ---------------------------------------------
    public function postEdit(Request $request) {
        // $messages = [
        //     'not_in' => 'You have to choose an author.',
        // ];
        $this->validate($request,[
            'name' => 'required',
            'sub_species' => 'required',
            'sex' => 'required',
            'enclosure' => 'required',
            ]
        );

        // $uploads_dir = public_path();
        // $uploads_dir .= '/downloads';
        //
        // $upload_file = $uploads_dir . basename($_FILES["fileToUpload"]["name"]);
        // $uploadOk = 1;



        // $target_dir = "uploads/";
        // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        // $uploadOk = 1;
        // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // // Check if image file is a actual image or fake image
        // if(isset($_POST["submit"])) {
        //     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        //     if($check !== false) {
        //         echo "File is an image - " . $check["mime"] . ".";
        //         $uploadOk = 1;
        //     } else {
        //         echo "File is not an image.";
        //         $uploadOk = 0;
        //     }
        // }

        $animal = \CareCats\Animal::find($request->id);

        $animal->name           = $request->name;
        $animal->sub_species    = $request->sub_species;
        $animal->sex            = $request->sex;
        $animal->bio            = $request->bio;
        $animal->enclosure      = $request->enclosure;
        $animal->birth_date     = $request->birth_date;
        $animal->care_date      = $request->care_date;

        $animal->save();
        \Session::flash('flash_message','Your changes were saved.');
        return redirect('/animal/edit/'.$request->id);
    }


}
