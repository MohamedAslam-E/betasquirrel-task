@extends('homePage')
@section('content')
 <form action="{{url('student')}}" method="post" class="p-5">
  @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
    </div>
    <div class="form-group my-3">
      <label for="mobile">Mobile</label>
      <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile number">
    </div>
    <div class="form-group mb-3">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Enter your Address">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection