<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $data['pagename'] = 'الاقسام';
        $data['sections']  = Section::withCount('children')->get();
        return view('sections.index',$data);
    }


    public function create()
    {
        $data['pagename'] = 'اضافة قسم';
        $data['parents']   = Section::get();
        return view('sections.create',$data);
    }

    public function store(Request $request)
    {
        $data =$request->validate([
            'ar_name' => 'required',
            'en_name' => 'required',
            'parent_id' => 'int',
            'status' => 'required',
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $imageName = time() . '-' . $request->name . '.' . $request->file("image")->extension();
            $path = $request->file('image')
                ->move(public_path("images" . DIRECTORY_SEPARATOR . "sctions"), $imageName);
            $request->image = $imageName;
        }

        Section::create([
            'ar_name' => $request->ar_name,
            'en_name' => $request->en_name,
            'image' => $request->image,
            'parent_id' => $request->parent_id,
            'status' => $request->status,

        ]);

        toast('تمت الاضافة بنجاح', 'success');
        return redirect()->route('section.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['section'] = Section::findOrfail($id);
        $data['pagename'] = 'تعديل قسم';
        $data['parents']   = Section::get();
        return view('sections.edit',$data);
    }


    public function update(Request $request,$id)
    {
        $section = Section::findOrFail($id);
        $image = public_path('images' . DIRECTORY_SEPARATOR . 'sctions' . DIRECTORY_SEPARATOR . $section->image);

        if ($request->hasFile('image')) {

            if (File::exists($image)) {
                File::delete($image);
            }

            $imagePath = $request->file('image');
            $imageName = time() . '-' . $request->name . '.' . $request->file("image")->extension();
            $path = $request->file('image')
                ->move(public_path("images/sctions"), $imageName);
            $request->image = $imageName;
            $section->image = $imageName;
        }


        $section->ar_name = $request->ar_name;
        $section->en_name = $request->en_name;
        $section->parent_id = $request->parent_id;
        $section->status = $request->status;

        $section->save();

        toast('تمت التعديل بنجاح', 'success');
        return redirect()->route('section.index');
    }

    public function destroy($id)
    {
        $type = Section::findOrFail($id);
        $image = public_path('images' . DIRECTORY_SEPARATOR . 'sctions' . DIRECTORY_SEPARATOR . $type->image);

        if (File::exists($image)) {
            File::delete($image);
        }
        $type->delete();

        toast('تمت الحذف بنجاح', 'success');
        return redirect()->route('section.index');
    }
}
