<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function contactMail(Request $req)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ];

        $messages = [
            'name.required' => 'Du måste ange ditt namn',
            'email.required' => 'Du måste ange din e-postadress',
            'message.required' => 'Du måste skriva nånting i meddelandet',
        ];

        $this->validate($req, $rules, $messages);

        Mail::send('emails.contact', ['key' => $req->input('message')], function($message) use ($req){
            $message->from($req->input('email'), $req->input('name'));
            $message->to('molander.johnny@gmail.com', 'Johnny Molander');
            $message->subject('Nytt meddelande från Fordonshallen.se!');
        });

        return \Redirect::back();
    }
}
