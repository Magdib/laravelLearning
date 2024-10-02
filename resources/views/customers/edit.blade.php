@extends('layouts.app')

@section('title', 'Edit Details for' . $customer->name)

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit Details for {{ $customer->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            {{-- Please Notic that customer parameter here is same to the one on the routes file goes by customers/{customer} --}}
            <form action="{{ route('cutomers.update', ['customer' => $customer]) }}" method="POST">
                @method('PUT')
                @include('customers.form')
                <button type="submit" class ='btn btn-primary'>Edit Customer</button>
            </form>
        </div>
    </div>

@endsection
