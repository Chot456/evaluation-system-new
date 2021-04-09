<?php

namespace App\Http\Controllers\SchoolYear;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{
    /**
     * Get All school year
     */
    public function index() {
        return \App\school_year::All();
    }

    /**
     * create school year
     */
    public function store() 
    {

    }

    /**
     * get School year by id
     */
    public function show() 
    {

    }

    /**
     * update school year
     */
    public function update()
    {

    }
 
}
