<!DOCTYPE html>
<html lang="en">

<head>
    <title> @yield('title', 'Trang chủ')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="/theme/client/images/logo.png">

    @include('client.layouts.partials.css')

</head>

<body>
    
    @if (Session::has('error') || Session::has('success'))
        @include('admin.layouts.partials.notification')
    @endif

    <div class="site-wrap">
        <header class="site-navbar" role="banner">

            @include('client.layouts.partials.header-top')

            @include('client.layouts.partials.header-nav')

        </header>

        <main>

            @yield('content')

        </main>

        <footer class="site-footer border-top">

            @include('client.layouts.partials.footer')

        </footer>
    </div>

    @include('client.layouts.partials.js')

</body>

</html>
