<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apartment</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    {{-- <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet"> --}}
    {{-- <link href="css/lib/chartist/chartist.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
    {{-- <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" /> --}}
    {{-- <link href="css/lib/weather-icons.css" rel="stylesheet" /> --}}
    <link href="{{ asset('css/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('css/noty.css') }}">
    <script src="{{ asset('js/noty.min.js') }}"></script>

    <style>
        .sidebar-hide .sidebar.sidebar-hide-to-small
        {
            width: 60px;
            left: 0;
            top: 0px;
            position: fixed;
        }
    </style>

</head>

<body>



    @include('layout._aside')

    @include('layout.header')


    <div class="content-wrap">
        @yield('content')

        <div class="row">
            <div class="col-lg-12">
                <div class="footer">
                    <p>2022 © Haladoz Team. - <a href="#">HaladozTeam.net</a></p>
                </div>
            </div>
        </div>
        </section>
        </div>
        </div>

    </div>


    @include('partials._session')



    <!-- jquery vendor -->
    
    <script src="{{ asset('js/jquery.nanoscroller.min.js') }}"></script>
    <!-- nano scroller -->
    <script src="{{ asset('js/menubar/sidebar.js') }}"></script>
    <script src="{{ asset('js/preloader/pace.min.js') }}"></script>
    <!-- sidebar -->

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- bootstrap -->

    {{-- <script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="js/lib/calendar-2/pignose.init.js"></script> --}}

{{-- 
    <script src="js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="js/lib/weather/weather-init.js"></script>
    <script src="js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="js/lib/chartist/chartist.min.js"></script>
    <script src="js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="js/dashboard2.js"></script> --}}

    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    <script>
        //delete
        $('.delete').click(function (e) {
            var that = $(this)
            e.preventDefault();
            var n = new Noty({
                text: "Are You Sure ?",
                type: "warning",
                killer: true,
                buttons: [
                    Noty.button("Yes", 'btn btn-success mr-2', function () {
                        that.closest('form').submit();
                    }),
                    Noty.button("No", 'btn btn-primary mr-2', function () {
                        n.close();
                    })
                ]
            });
            n.show();
        });//end of delete
    </script>

</body>

</html>