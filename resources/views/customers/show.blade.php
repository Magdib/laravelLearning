@extends('layouts.app')

@section('title', 'Details for' . $customer->name)

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Details for {{ $customer->name }}</h1>
            <p><a href="/customers/{{ $customer->id }}/edit">Edit</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p><strong>Name: </strong>{{ $customer->name }}</p>
            <p><strong>Email: </strong>{{ $customer->email }}</p>
            <p><strong>Company: </strong>{{ $customer->company->name }}</p>
            <form action="/customers/{{ $customer->id }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>
    @if ($customer->image)
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('storage/' . $customer->image) }}" alt="" class="img-thumbnail">
            </div>
        </div>
    @endif
@endsection
