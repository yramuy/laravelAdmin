<html>

<body class="hold-transition sidebar-mini layout-fixed">
    @include('partials.header')

    <div class="wrapper">


        @include('partials.navbar')

        @include('partials.sidebar')


        <div class="content">
            @yield('content')
        </div>

        @include('partials.footer')
    </div>
</body>

</html>
