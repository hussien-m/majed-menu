<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuMails;
use App\Notifications\MenuMailNotification;
use Illuminate\Support\Facades\Notification;

class MenyMaliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('store');
    }

    public function index()
    {
        $data['pagename'] = 'القائمة البريدية';
        $data['mails']    = MenuMails::latest()->get();
        return view('mail-menu.index',$data);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required|numeric',
        ]);

        MenuMails::create($data);

        toast('تم تسجيل  بريدك بنجاح','success');

        return redirect()->route('first-page');
    }

    public function show()
    {
        $data['pagename'] = 'القائمة البريدية';
        return view('mail-menu.show',$data);
    }

    public function send(Request $request)
    {
        $emails = MenuMails::get();

        Notification::send($emails, new MenuMailNotification($request->body,$request->title));

        toast('تم تسجيل  بريدك بنجاح','success');

        return redirect()->route('menu-mail');

    }
}
