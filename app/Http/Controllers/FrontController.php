<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function meals($section_id)
    {

        $meals = Meal::where('section_id',$section_id)->get();
        if($meals->count() >0  ){

            return view('meal',compact('meals'));
         } else{
            return abort('404');
         }

    }
}
