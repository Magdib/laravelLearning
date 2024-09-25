<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Customers;
class CustomersController extends Controller
{
    public function list(){
        $activeCustomers = Customers::active()->get();
        $inactiveCustomers = Customers::inactive()->get();
        $companies = Company::all();
        // $customers = ["test","test2","test3"];
        return view('customers',compact('activeCustomers','inactiveCustomers','companies'));
    }
    public function store()
    {
        $data= request()->validate(['name' => 'required|min:3','email'=>'required|email','active'=>'required','company_id'=>'required']);
        Customers::create($data);
        return back();
    }

}
