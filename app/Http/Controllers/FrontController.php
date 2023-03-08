<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Section;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function meals($section_id)
    {
        $sections = Section::with('meals')->get();
        //dd($sections);
        if($sections->count() >0  ){

            return view('meal',compact('sections'));
         } else{
            return abort('404');
         }

    }
}
