<?php

namespace CareCats\Http\Controllers;

use Illuminate\Http\Request;

use CareCats\Http\Requests;
use CareCats\Http\Controllers\Controller;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('cats');
    }

    public function postIndex()
    {
       return 'show results of cat search';
    }

}
