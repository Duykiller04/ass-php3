@extends('admin.layouts.master')

@section('title')
    Thêm mới loại tin
@endsection

@section('content')


    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">
                            Thêm mới danh loại tin
                        </h4>
                    </div>
                    <!-- end card header -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">

                                <div class="col-lg-4">
                                    <label for="name">Tên loại tin</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Enter name">
                                </div>

                                <div class="col-lg-4">
                                    <label for="description">Mô tả</label>
                                    <input type="text" name="description" id="description" class="form-control"
                                        placeholder="Enter description">
                                </div>

                                <div class="col-lg-4">
                                    <label for="parent_id" class="form-label">Loại tin cha</label>
                                    <select id="" class="js-example-basic-single form-control" name="parent_id"
                                        id="parent_id">
                                        <option value="" selected>Trống</option>

                                        @foreach ($parentCategories as $parent)
                                            @php($each = ' ')
                                            @include('admin.categories.nested-category', ['category' => $parent])
                                        @endforeach
                                    </select>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                </div>

                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    </form>
@endsection
