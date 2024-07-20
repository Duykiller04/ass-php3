@extends('client.layouts.master')
@section('title')
    {{ $data->name }}
@endsection
@section('content')
<div class="container">
  @include('client.components.breadcrumb',['pageName' => 'Chi tiết'])
    <div class="card">
    
      <div class="card-header bg-dark">
        <h1 class="text-center text-light">{{ $data->name }}</h1>
      </div>
  
      <div class="card-body">
        <h3 class="mt-2 mb-4 text-dark">Tác giả: {{ $author->name }}</h3>
        <img class="card-img-top" src="{{ $data->image }}">
  
        <p class="card-text mt-4 text-dark">
          {{ $data->description }}  
        </p>
  
      </div>
  
    </div>
  
    <div class="card mt-4">
  
      <div class="card-header">
        Bình luận
      </div>
  
      <div class="card-body">
  
        @foreach($comments as $comment)
        
          <div class="media mt-3 mb-3">
            <div class="media-body">
              <h5 class="mt-0">{{ $comment->name }}</h5>
              {{ $comment->content }}
            </div>
          </div>
  
        @endforeach
  
      </div>
  
    </div>
  
    <div class="card mt-4">
  
      <div class="card-header">
        Gửi bình luận 
      </div>
  
      <div class="card-body">
  
        <form action="" method="POST">
          <div class="form-group">
            <label>Bình luận</label>  
            <textarea class="form-control"></textarea>
          </div>
          <div class="d-flex justify-content-end">
            <button class="btn btn-primary">Bình luận</button>
          </div>
        </form>
  
      </div>
  
    </div>
  
  </div>
@endsection