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
     event(new NewCustomerHasRegisteredEvent($customer)); 
    //   return redirect('customers');
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
        
        return redirect('customers/'.$customer->id);
    }
    public function destroy(Customers $customer){
        $customer->delete();
        return redirect('customers');
    }
public function validateRequest(){
    return  request()->validate(['name' => 'required|min:3',
    'email'=>'required|email',
    'active'=>'required',
    'company_id'=>'required']);
}
}
