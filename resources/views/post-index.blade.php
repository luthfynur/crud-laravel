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
  <button style="margin-bottom: 10px" class="btn btn-primary" type="button" onclick="window.location='{{ route('posts.create') }}'">Create Post</button>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Title</td>
          <td>Subtitle</td>
          <td>Content</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->sub_title}}</td>
            <td>{{$post->body}}</td>
            <td><a href="{{ route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('posts.destroy', $post->id)}}" method="post">
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