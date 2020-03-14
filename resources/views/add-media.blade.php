@extends('layouts.app')



@section('content')

<div class="container">
  <form method="post" action="{{route('add-media')}}">
    @csrf
    <label for="media_link">Media Link</label>
    <input type="text" name="media_link" id="media_link" class="form-control" />
    <label for="media_title">Media Title</label>
    <input type="text" name="media_title" class="form-control" id="media_title" />
    <input type="submit" value="Submit" class="btn btn-success" />
  </form>

  @foreach($medias as $media)

    <div style="margin-top: 50px;">
      <a href="{{route('delete-media', $media->id)}}"<button class="btn btn-sm btn-danger">Delete </button></a> {{$media->link}}
    </div>

  @endforeach

</div>
@endsection
