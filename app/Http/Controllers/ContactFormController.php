<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFromMail;
use Illuminate\Support\Facades\Mail;
class ContactFormController extends Controller
{
    public function create(){
        return view('contact.create');
    }
    //php artisan make:mail ContactFromMail --markdown=emails.contact.contact-form
    public function store(){
        $data = request()->validate(['name' => 'required|min:3',
        'email'=>'required|email',
        'message'=>'required',]);

        Mail::to('test@gmail.com')->send(new ContactFromMail($data));
        return redirect('contact')->with('message','Thanks for your message. We\'ll be in touch.');
    }
}
