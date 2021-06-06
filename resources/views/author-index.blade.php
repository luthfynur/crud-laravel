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
  <button style="margin-bottom: 10px" class="btn btn-primary" type="button" onclick="window.location='{{ route('authors.create') }}'">Create Author</button>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>First Name</td>
          <td>Last Name</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($author as $author)
        <tr>
            <td>{{$author->id}}</td>
            <td>{{$author->firstname}}</td>
            <td>{{$author->lastname}}</td>
            <td><a href="{{ route('authors.edit', $author->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('authors.destroy', $author->id)}}" method="post">
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