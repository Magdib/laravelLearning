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
        return view('customers.create',compact('companies'));
    }
    public function store()
    {
        $data= request()->validate(['name' => 'required|min:3','email'=>'required|email','active'=>'required','company_id'=>'required']);
        Customers::create($data);
        return redirect('customers');
    }

    public function show(Customers $customer){
    return view('customers.show', compact('customer'));
    }
}
