<?php

namespace App\Http\Controllers;

use App\Events\NewCustomerHasRegisteredEvent;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Customers;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Support\Facades\Mail;
class CustomersController extends Controller
{
    public function __construct()
    {
            $this->middleware('auth')->except(['index']);
    }
    public function index(){
        $customers = Customers::all();
        return view('customers.index',compact('customers',));
    }
    public function create(){
        $companies = Company::all();
        $customer = new Customers();
        return view('customers.create',compact('companies','customer'));
    }

    public function store()
    {
     $customer =   Customers::create($this->validateRequest());
     $this->storeImage($customer);
     event(new NewCustomerHasRegisteredEvent($customer)); 
      return redirect('customers');
    }

    public function show(Customers $customer){
    return view('customers.show', compact('customer'));
    }

    public function edit(Customers $customer){
        $companies = Company::all();
        return view('customers.edit', compact('customer','companies'));
    }

    public function update(Customers $customer){
    $customer->update($this->validateRequest());
    $this->storeImage($customer);
        return redirect('customers/'.$customer->id);
    }
    public function destroy(Customers $customer){
        $customer->delete();
        return redirect('customers');
    }
public function validateRequest(){

    return tap(request()->validate(['name' => 'required|min:3',
    'email'=>'required|email',
    'active'=>'required',
    'company_id'=>'required']),function (){
        if(request()->hasFile('image')){
               request()->validate([
            'image' =>'file|image|max:5000',
        ]); 
        }
    });
}
private function storeImage($customer){
    if(request()->has('image')){
        $customer->update(['image' => request()->image->store('uploads','public')]);
    }
}
}
