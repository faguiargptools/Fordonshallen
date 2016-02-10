<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        \Mail::send('emails.contact', ['key' => $req->input('message')], function($message){
           $message->to('molander.johnny@gmail.com', 'Johnny Molander')->subject('Nytt meddelande från Fordonshallen.se!');
        });

        return \Redirect::back();
    }
}
