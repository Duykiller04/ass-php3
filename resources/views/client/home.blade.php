@extends('client.layouts.master')
@section('title')
    Trang chủ tin tức
@endsection
@section('content')

    <div class="container">
        <div class="row mb-3">
            <div class="col-md-8 border-end mt-3">
                <h2 class="mt-3">Trang chủ</h2>
                <hr>
                <h3 class="text-center text-dark">Tin mới nhất</h3>
                @foreach ($data as $item)
                    <div class="row mt-3 mb-3">
                        <div class="col-4">
                            <a href="{{ route('tin.chitiet', $item->id) }}">
                                @php
                                    $url = $item->image;
                                    if (!Str::contains($url, 'http')) {
                                        $url = Storage::url($url);
                                    }
                                @endphp
                                <img src="{{ $url }}"  class="card-img-top" alt="..." style="height: 200px">
                            </a>
                        </div>
                        <div class="col-8">
                            <a href="{{ route('tin.chitiet', $item->id) }}" class="text-dark text-decoration-none">
                                <h3 class="card-title">{{ Str::limit($item->name, 40, '...') }}</h3>
                            </a>
                            <p class="card-text">{!! Str::limit($item->description, 80, '...') !!}</p>
                            <p>
                                {{ $item->created_at }}
                            </p>
                        </div>
                    </div>
                @endforeach
                {{ $data->links() }}
            </div>
            <div class="col-md-4 mt-3 border border-1">
                <div class="border border-1">
                    <div class="row bg-info">
                        <h2 class="m-4 text-dark">Chủ đề</h2>
                    </div>
                </div>
                <div class="border border-1 mt-3 mb-3">
                    <div class="widget widget-categories m-4">
                        <h4 class="widget-title">
                            <span class="text-dark">Loại tin</span>
                        </h4>
                        <ul class="list-unstyled widget-list">
                            @foreach ($categories as $item)
                                <li>
                                    <a href="{{ route('tin.category', $item->id) }}" class="d-flex">{{ $item->name }}
                                        <small class="ml-auto"></small></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="border border-1 mt-3 mb-3">
                    <div class="widget m-4">
                        <h4 class="widget-title"><span class="text-dark">Tags</span></h4>
                        <ul class="list-inline widget-list-inline widget-card">
                            @foreach ($tags as $item)
                                <li class="list-inline-item">
                                    <a href="">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text-center text-dark mt-3 mb-3">Tin tức nổi bật</h2>

        <div class="mb-3 row d-flex justify-content-between">
            @foreach ($data2 as $item)
                <div class="card mb-3" style="width: 18rem;">
                    @php
                        $url = $item->image;
                        if (!Str::contains($url, 'http')) {
                            $url = Storage::url($url);
                        }
                    @endphp
                    <img src="{{ $url }}" class="card-img-top" alt="..." style="height: 200px">
                    <div class="card-body">
                        <a href="{{ route('tin.chitiet', $item->id) }}" class="text-dark text-decoration-none">
                            <h5 class="card-title">{{ Str::limit($item->name, 40, '...') }}</h5>
                        </a>
                        <p class="card-text">{!! Str::limit($item->description, 80, '...') !!}</p>
                        <a href="{{ route('tin.chitiet', $item->id) }}" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            @endforeach
        </div>

        <h2 class="text-center text-dark mt-3 mb-3">Tin tức xem nhiều</h2>

        <div class="mb-3 row d-flex justify-content-between">
            @foreach ($data1 as $item)
                <div class="card mb-3" style="width: 18rem;">
                    @php
                        $url = $item->image;
                        if (!Str::contains($url, 'http')) {
                            $url = Storage::url($url);
                        }
                    @endphp
                    <img src="{{ $url }}" class="card-img-top" alt="..." style="height: 200px">
                    <div class="card-body">
                        <a href="{{ route('tin.chitiet', $item->id) }}" class="text-dark text-decoration-none">
                            <h5 class="card-title">{{ Str::limit($item->name, 40, '...') }}</h5>
                        </a>
                        <p class="card-text">{!! Str::limit($item->description, 80, '...') !!}</p>
                        <a href="{{ route('tin.chitiet', $item->id) }}" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
