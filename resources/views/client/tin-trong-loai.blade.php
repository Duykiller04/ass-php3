@extends('client.layouts.master')
@section('title')
    {{ $nameLT->name }}
@endsection
@section('content')
@include('client.components.breadcrumb',['pageName' => 'Loại tin'])

    {{-- <div class="row d-flex justify-content-between">
        @foreach ($data as $item)
        <div class="card mb-3" style="width: 18rem;">
            <img src="{{ $item->image }}" class="card-img-top" alt="..." style="height: 200px">
            <div class="card-body">
            <h5 class="card-title">{{ Str::limit($item->name, 40, '...') }}</h5>
            <p class="card-text">{{ Str::limit($item->description, 80, '...') }}</p>
            <a href="{{ route('tin.chitiet', $item->id) }}" class="btn btn-primary">Xem chi tiết</a>
            </div>
        </div>
        @endforeach
        {{$data->links()}}
    </div> --}}

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 border-end mt-3">
                <h2 class="mt-3 text-capitalize">Loại tin: {{ $nameLT->name }}</h2>
                @foreach ($data as $item)
                <hr>
                    <div class="row mt-3 mb-3">
                        <div class="col-4">
                            <img src="{{ $item->image }}" class="card-img-top" alt="..." style="height: 200px">
                        </div>
                        <div class="col-8">
                            <a href="{{ route('tin.chitiet', $item->id) }}" class="text-dark text-decoration-none" >
                                <h3 class="card-title">{{ Str::limit($item->name, 40, '...') }}</h3>
                            </a>
                            <p class="card-text">{{ Str::limit($item->description, 80, '...') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-0 col-md-4 border border-1 mt-3 ">
                <div class="row bg-info">
                    <h2 class="m-4 text-dark">Chủ đề</h2>
                </div>
                @foreach ($categories as $item)
                    <h3><a href="{{ route('tin.category', $item->id) }}" class="text-dark text-capitalize">{{ $item->name }}</a></h3>
                @endforeach
            </div>
            {{$data->links()}}
        </div>
    </div>
@endsection