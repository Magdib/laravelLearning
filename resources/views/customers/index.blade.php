@extends('layouts.app')

@section('title', 'Customer List')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customer List</h1>
        </div>
    </div>
    @can('create', App\Customer::class)
        <div class="row">
            <div class="col-12">
                <p><a href={{ route('customers.create') }}>Add New Customer</a></p>
            </div>
        </div>
    @endcan
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
            <div class="col-4">
                {{--                                      UnComment                     --}}
                @can('view', $customer)
                    <a href="/customers/{{ $customer->id }}"> {{ $customer->name }} </a>
                @endcan
                @cannot('view', $customer)
                    {{ $customer->name }}
                @endcannot
            </div>
            <div class="col-4"> {{ $customer->company->name }} </div>
            <div class="col-2">{{ $customer->active }}</div>

        </div>
    @endforeach
    <div class="row">
        <div class="col-12 d-inline-flex justify-content-center pt-4">
            {{ $customers->links() }}
        </div>
    </div>
@endsection
