<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $data['pagename'] = 'الوجبات';
        $data['meals']  = Meal::with('section')->get();
        return view('meals.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pagename'] = 'اضافة وجبة';
        $data['sections'] = Section::all();
        return view('meals.create' , $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =$request->validate([
            'ar_name' => 'required',
            'en_name' => 'required',
            'ar_components' => 'required',
            'en_components' => 'required',
            'price' => 'required|int',
            'section_id' => 'required|int',
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $imageName = time() . '-' . $request->user . '.' . $request->file("image")->extension();
            $path = $request->file('image')
                ->move(public_path("images" . DIRECTORY_SEPARATOR . "meals"), $imageName);
            $request->image = $imageName;
        }

        Meal::create([
            'ar_name' => $request->ar_name,
            'en_name' => $request->en_name,
            'ar_components' => $request->ar_components,
            'en_components' => $request->en_components,
            'price' => $request->price,
            'image' => $request->image,
            'section_id' => $request->section_id,

        ]);

        toast('تمت الاضافة بنجاح', 'warning');
        return redirect()->route('meal.index');


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['meal'] = Meal::findOrfail($id);
        $data['sections'] = Section::all();
        $data['pagename'] = 'تعديل قسم';
        return view('meals.edit',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['meal'] = Meal::findOrfail($id);
        $data['sections'] = Section::all();
        $data['pagename'] = 'تعديل قسم';
        return view('meals.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $meal = Meal::findOrFail($id);
        $image = public_path('images' . DIRECTORY_SEPARATOR . 'meals' . DIRECTORY_SEPARATOR . $meal->image);

        if ($request->hasFile('image')) {

            if (File::exists($image)) {
                File::delete($image);
            }

            $imagePath = $request->file('image');
            $imageName = time() . '-' . $request->name . '.' . $request->file("image")->extension();
            $path = $request->file('image')
                ->move(public_path("images/meals"), $imageName);
            $request->image = $imageName;
            $meal->image = $imageName;
        }

        $meal->ar_name = $request->ar_name;
        $meal->en_name = $request->en_name;
        $meal->ar_components = $request->ar_components;
        $meal->en_components = $request->en_components;
        $meal->price = $request->price;
        $meal->section_id = $request->section_id;

        $meal->save();

        toast('تمت التعديل بنجاح', 'success');
        return redirect()->route('meal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = Meal::findOrFail($id);
        $image = public_path('images' . DIRECTORY_SEPARATOR . 'meals' . DIRECTORY_SEPARATOR . $type->image);

        if (File::exists($image)) {
            File::delete($image);
        }
        $type->delete();
        toast('تمت الحذف بنجاح', 'success');
        return redirect()->route('meal.index');
    }
}
