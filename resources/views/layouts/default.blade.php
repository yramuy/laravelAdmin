<html>
<?php
$user = session('email'); // Check if the user is authenticated
?>

@if ($user == '')
    <script>
        window.location = "{{ route('login') }}";
    </script>
@endif

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
