@extends('post-layout')

@section('post-content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Author
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('authors.update', $author->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="firstname">Author firstname:</label>
              <input type="text" class="form-control" name="firstname" value="{{ $author->firstname }}"/>
          </div>
          <div class="form-group">
              <label for="lastname">Author lastname:</label>
              <input type="text" class="form-control" name="lastname" value="{{ $author->lastname }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection