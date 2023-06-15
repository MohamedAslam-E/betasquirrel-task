@extends('homePage')
@section('content')
<div class="pt-3">
  <div class="col-12 d-flex justify-content-between pb-3">
    <span style="text-decoration: underline">STUDENT LIST</span>
    <button class="btn btn-success btn-sm " style="text-decoration: underline">
      <a class="text-white" href="{{ url('/student/create')}}">Add Student</a><i class="bi bi-person-plus-fill px-1"></i>
      </button>
  </div>
      <!-- db_table -->
      <table class="table table-striped table-bordered">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NAME</th>
          <th scope="col">MOBILE</th>
          <th scope="col">ADDRESS</th>
          <th class="text-center" scope="col">operation</th>
        </tr>
          @foreach ($students as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name}}</td>
            <td>{{ $item->mobile}}</td>
            <td>{{ $item->address}}</td>
            <td class="d-flex justify-content-center">
              <button class="btn btn-info btn-sm rounded-0 rounded-start"><a class="text-white text-decoration-none" href="{{ route ('student.show',$item->id)}}"><i class="bi bi-eye-fill"></i></a></button>
              <button class="btn btn-success btn-sm rounded-0"><a class="text-white text-decoration-none" href="{{ route ('student.edit',$item->id)}}"><i class="bi bi-pencil-fill"></i></a></button>
              {{-- <button class="btn btn-danger btn-sm"><a class="text-white text-decoration-none" onclick="return customConfirm('Are you sure you want to delete this item?')" href="{{ route ('student.destroy',$item->id)}}"> Delete</a></button> --}}
              <form method="POST" action="{{ url('/student' . '/' . $item->id) }}" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm  rounded-0 rounded-end" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> <i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr> 
          @endforeach
      </table>
  </div>
</div>
<script>
    function customConfirm(message) {
      var result = confirm(message);
      return result;
    }
</script>
@endsection
  