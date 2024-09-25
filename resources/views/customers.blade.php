@extends('layout')

@section('title','Customer List')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Customer List</h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form action="customers" method="POST">

            {{-- Name --}}
            <div class="form-group">
            <label for="name">Name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                <div>{{$errors->first('name')}}</div>
            </div>

    </div>
</div>

    {{-- Email --}}
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" value="{{old('email')}}" class="form-control">
        <div>{{$errors->first('email')}}</div>
    </div>


    <div class="form-group">
        <label for="active">Status</label>
        <select name ='active' id ='active' class ='form-control'>
            <option value="" disabled>Select customer status</option>
            <option value="1" >Active</option>
            <option value="0" >Inactive</option></select>
    </div>

    <div class="form-group">
        <label for="company_id">Company</label>
        <select name ='company_id' id ='company_id' class ='form-control'>
            @foreach ($companies as $company)
            <option value=" {{$company->id}} ">{{$company->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class ='btn btn-primary'>Add customer</button>
    @csrf
</form>
<div class="row"><div class ='col-6'><h3>Active Customers</h3>
    <ul>
        @foreach ($activeCustomers as $activeCustomer)
            <li>{{ $activeCustomer->name }} <span class="text-muted">({{ $activeCustomer->company->name }})</span></li>
        @endforeach


        </ul></div>
        <div class ='col-6'><h3>Inactive Customers</h3>
            <ul>
                @foreach ($inactiveCustomers as $inactiveCustomer)
                    <li>{{ $inactiveCustomer->name }} <span class="text-muted">({{ $inactiveCustomer->email }})</span></li>
                @endforeach


                </ul></div>
            </div>
@endsection
