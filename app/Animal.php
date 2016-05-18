<?php

namespace CareCats;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    public function procedure() {
        # Book belongs to Author
        # Define an inverse one-to-many relationship.
        return $this->hasMany('\CareCats\Procedure');
    }

    public function sponsors() {
        return $this->belongsToMany('\CareCats\Sponsor')->withTimestamps();;
    }

    public function getAnimalsForDropdown() {
        $animals = $this->orderby('sub_species','ASC')->get();
        $animals_for_dropdown = [];
        foreach($animals as $animal) {
            //$animals_for_dropdown[$animal->id] = $author->last_name;
            //test to see if the sub_species is already lsited in the list you're making here
        }
        return $authors_for_dropdown;
    }
}
