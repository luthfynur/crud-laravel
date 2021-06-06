@extends('post-layout')

@section('post-content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <button style="margin-bottom: 10px" class="btn btn-primary" type="button" onclick="window.location='{{ route('categories.create') }}'">Create Category</button>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($category as $cat)
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->category_name}}</td>
            <td><a href="{{ route('categories.edit', $cat->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('categories.destroy', $cat->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection