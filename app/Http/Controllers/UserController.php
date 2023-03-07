<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['pagename'] = 'المستخدمين';
        $data['users']  = User::all();
        return view('users.index',$data);
    }

    public function create()
    {
        $data['pagename'] = 'أضف مستخدم';
        return view('users.create' , $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,except,id|email',
            'password' => 'required',
        ]);

        $data['password'] = Hash::make($request->password);

        User::create($data);
        toast('تمت الاضافة بنجاح', 'success');
        return redirect()->route('user.index');
    }


    public function show($id)
    {
        $data['user'] = User::findOrFail($id);
        $data['pagename'] = 'تعديل مستخدم';
        return view('users.edit',$data);
    }


    public function edit(string $id)
    {
        $data['user'] = User::findOrFail($id);
        $data['pagename'] = 'تعديل مستخدم';
        return view('users.edit',$data);
    }


    public function update(Request $request,$id)
    {
        $user= User::findOrFail($id);

        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->name= $request->name;
        $user->email= $request->email;
        $user->save();

        toast('تمت الاضافة بنجاح', 'success');
        return redirect()->route('user.index');
    }


    public function destroy( $id)
    {
        $user= User::findOrFail($id);

        $user->delete();

        toast('تمت الحذف بنجاح', 'success');
        return redirect()->route('user.index');
    }
}
