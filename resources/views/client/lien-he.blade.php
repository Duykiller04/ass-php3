@extends('client.layouts.master')
@section('title')
    Liên hệ
@endsection
@section('content')
@include('client.components.breadcrumb',['pageName' => 'Liên hệ'])

    <div class="container mb-5">

        <div class="row">

            <div class="col-12 text-center">
                <h1>Liên hệ với News</h1>
                <p>Chúng tôi luôn sẵn sàng để phục vụ và giải đáp thắc mắc của quý khách</p>
            </div>

        </div>

        <div class="row">

            <div class="col-md-7">

                <h2>Gửi thông tin phản hồi</h2>

                <form>

                    <div class="form-group">
                        <label>Họ tên</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Chủ đề</label>
                        <select class="form-control">
                            <option>Góp ý về nội dung</option>
                            <option>Góp ý về giao diện</option>
                            <option>Thắc mắc về chức năng</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control"></textarea>
                    </div>

                    <button class="btn btn-primary">Gửi</button>

                </form>

            </div>

            <div class="col-md-5">

                <h2>Thông tin liên hệ</h2>

                <p><i class="fa fa-map-marker"></i> Địa chỉ: Cao đẳng FPT Polytechnic</p>

                <p><i class="fa fa-phone"></i> Điện thoại: 0123456789 </p>

                <p><i class="fa fa-envelope"></i> Email: duykvph33547@fpt.edu.vn</p>

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14895.646974040115!2d105.75177825084484!3d21.036217080357634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1721402956247!5m2!1svi!2s"
                    width="100%" height="300" allowfullscreen="" scrolling="no" loading="lazy"  marginheight="0" marginwidth="0"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

                <h3>Giờ làm việc</h3>
                <p>Thứ 2 - Thứ 6: 8h00 - 17h00</p>
                <p>Thứ 7, Chủ nhật: nghỉ</p>
                <h3>Kết nối với chúng tôi</h3>
                <div class="d-flex justify-content-around">
                    <div  class="ms-3">
                        <a href="#"><i class="fa fa-facebook" style="font-size: 40px"></i></a>
                    </div>
                    <div  class="ms-3">
                        <a href="#"><i class="fa fa-instagram" style="font-size: 40px"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
