@extends('layouts.app')

@section('title', 'Customer List')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customer List</h1>
            <p><a href ='customers/create'>Add New Customer</a></p>
        </div>
    </div>
    {{-- My personal Prefrence --}}
    <div class="row">
        <h4 class="col-2">ID</h4>
        <h4 class="col-4">Name</h4>
        <h4 class="col-4">Company Name</h4>
        <h4 class="col-2">Status</h4>
    </div>
    @foreach ($customers as $customer)
        <div class="row">
            <div class="col-2"> {{ $customer->id }} </div>
            <div class="col-4"> <a href="/customers/{{ $customer->id }}"> {{ $customer->name }} </a></div>
            <div class="col-4"> {{ $customer->company->name }} </div>
            <div class="col-2">{{ $customer->active }}</div>

        </div>
    @endforeach

@endsection
