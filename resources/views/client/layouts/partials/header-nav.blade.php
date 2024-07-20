<nav class="site-navigation text-right text-md-center" role="navigation">
    <div class="container">
        <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="">
                <a href="{{ route('home') }}">Trang chủ</a>
            </li>
            {{-- <li class="has-children">
                <a href="about.html">About</a>
                <ul class="dropdown">
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                </ul>
            </li> --}}
            <li><a href="{{ route('gioithieu')}}">Giới thiệu</a></li>
            <li><a href="{{ route('lienhe')}}">Liên hệ</a></li>
            @foreach ($categories as $item)
                <li>
                    <a href="{{ route('tin.category', $item->id) }}">{{ $item->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>