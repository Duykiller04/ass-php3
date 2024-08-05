@extends('client.layouts.master')
@section('title')
    {{ $data->name }}
@endsection
@section('content')
    <div class="container">
        @include('client.components.breadcrumb', ['pageName' => 'Chi tiết'])
        <div class="card">

            <div class="card-header bg-dark">
                <h1 class="text-center text-light">{{ $data->name }}</h1>
            </div>

            <div class="card-body">
                <h3 class="mt-2 mb-4 text-dark">Tác giả: {{ $data->user->name }}</h3>
                @php
                    $url = $data->image;
                    if (!Str::contains($url, 'http')) {
                        $url = Storage::url($url);
                    }
                @endphp
                <img class="card-img-top" src="{{ $url }}">
                <div class="mt-5 mb-5">
                    {!! $data->description !!}
                </div>
            </div>

        </div>

        <div class="card mt-4">

            <div class="card-header">
                Bình luận
            </div>

            <div class="card-body">

                @foreach ($comments as $comment)
                    <div class="media mt-3 mb-3">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $comment->user->name }}</h5>
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

                <form action="{{ route('comment') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Bình luận</label>
                        <textarea class="form-control" name="content"></textarea>
                    </div>
                    <input type="hidden" name="post_id" id="" value="{{ $data->id }}">
                    <div class="d-flex justify-content-end">
                      @if (\Auth::user())
                        <button class="btn btn-primary" type="submit">Bình luận</button>
                      @else
                        <a href="{{ route('auth.login') }}" class="btn btn-primary">Bình luận</a>
                      @endif
                    </div>
                </form>

            </div>

        </div>

    </div>
@endsection
