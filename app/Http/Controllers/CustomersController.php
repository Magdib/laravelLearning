<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Customers;
class CustomersController extends Controller
{
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
        Customers::create($this->validateRequest());
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
