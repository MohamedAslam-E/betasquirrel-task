@extends('homePage')
@section('content')
<div class="card my-3">
    <div class="card-body p-4">
        <h5>Name: {{$students->name ??'None'}}</h5>
        <p>Mobile : {{ $students->mobile ??'None'}}</p>
        <p>Address : {{ $students->address ??'None'}}</p>
    </div>
</div>
@endsection