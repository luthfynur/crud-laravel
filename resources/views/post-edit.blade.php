@extends('post-layout')

@section('post-content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Post
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
      <form method="post" action="{{ route('posts.update', $post->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="post-title">Post Title:</label>
              <input type="text" class="form-control" name="title" value="{{ $post->title }}"/>
          </div>
          <div class="form-group">
              <label for="post-sub_title">Sub Title :</label>
              <input type="text" class="form-control" name="sub_title" value="{{ $post->sub_title }}"/>
          </div>
          <div class="form-group">
              <label for="post-body">Content :</label>
              <input type="text" class="form-control" name="body" value="{{ $post->body }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection