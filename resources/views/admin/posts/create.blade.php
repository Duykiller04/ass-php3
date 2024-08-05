@extends('admin.layouts.master')

@section('title')
    Thêm mới tin
@endsection

@section('content')


    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">
                            Thêm mới tin
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
                                    <label for="category_id">Loại tin</label>
                                    <select name="category_id" id="category_id" class=" form-control js-example-basic-single">
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-4">
                                    <label for="name">Tiêu đề tin</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Enter name">
                                </div>

                                <div class="col-lg-4">
                                    <label for="image">Ảnh</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>

                                <div class="col-lg-8">
                                    <label for="description">Mô tả</label>
                                    <textarea class="form-control" name="description" id="description"></textarea>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-switch form-switch-md mb-3 mt-4" dir="ltr">
                                        <label for="is_show_home" class="form-check-label">Hiển thị trang chủ</label>
                                        <input type="checkbox" name="is_show_home" id="is_show_home" class="form-check-input" value="1" checked>
                                    </div>
                                    <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                        <label for="is_hot" class="form-check-label">Tin hot</label>
                                        <input type="checkbox" name="is_hot" id="is_hot" class="form-check-input" value="1">
                                    </div>
                                    <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                        <label for="is_new" class="form-check-label">Tin mới</label>
                                        <input type="checkbox" name="is_new" id="is_new" class="form-check-input" value="1" checked>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <div class="live-preview">
                                        <div class="row gy-4">
            
                                            <div class="col-md-12">
                                                <div>
                                                    <label for="tags" class="form-label">Tag</label>
                                                    <select name="tags[]" id="tags" class="js-example-basic-multiple" multiple="multiple">
                                                        @foreach ($tags as $tag)
                                                            <option value="{{ $tag->id }}">
                                                                {{ $tag->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
            
                                                </div>
                                            </div>
            
                                        </div>
                                        <!--end row-->
                                    </div>
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

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js" integrity="sha512-lKwk82OTcXaujpLk2G2rplJ8ntniQ5fV/1qlg7EMqyF88lJsEgZaVFP9wxb/ZSCop7CfTsAxnTUg/vvZlFzyQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        CKEDITOR.replace('description');
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#tags").select2({
                allowClear: true,
                dropdownAutoWidth: true
            });
            $('.js-example-basic-single').select2({
                dropdownAutoWidth: true
            });
        });
    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
@endsection
