<div class="container">
    <div class="row">
        <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="footer-heading mb-4">
                        Menu
                    </h3>
                </div>
                <div class="col-md-6 col-lg-4">
                    <ul class="list-unstyled">
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Thông tin</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-4">
                    <ul class="list-unstyled">
                        @foreach ($categories as $item)
                            <li>
                                <a href="{{ route('tin.category', $item->id) }}">{{ $item->name }}</a>
                            </li>
                        @endforeach
                        {{-- <li><a href="#">Loại tin 1</a></li> --}}
                    </ul>
                </div>
                <div class="col-md-6 col-lg-4">
                    <ul class="list-unstyled">
                        <li><a href="#">Các loại tin</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="block-5 mb-5">
                <h3 class="footer-heading mb-4">
                    Thông tin liên hệ
                </h3>
                <ul class="list-unstyled">
                    <li class="address">
                        Cao đẳng FPT - Polytechnic
                    </li>
                    <li class="phone">
                        <a href="">0123456789</a>
                    </li>
                    <li class="email">
                        duykvph33547@gmail.com
                    </li>
                </ul>
            </div>

            <div class="block-7">
                <form action="#" method="post">
                    <label for="email_subscribe" class="footer-heading">Liên hệ</label>
                    <div class="form-group">
                        <input type="text" class="form-control py-4" id="email_subscribe"
                            placeholder="Email" />
                        <input type="submit" class="btn btn-sm btn-primary" value="Gửi" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                <script>
                    document.write(new Date().getFullYear());
                </script>
                Thiết kế 
                <i class="icon-heart" aria-hidden="true"></i> bởi
                <a href="" class="text-primary">DuyPH33547</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </div>
</div>