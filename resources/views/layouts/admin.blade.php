<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title> Fervour - E-Commerce</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/fervour-logo.webp') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/themefy_icon/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/niceselect/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/font_awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/datepicker/date-picker.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/scroll/scrollable.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/colors/default.css') }}" id="colorSkinCSS">
    <script src="{{ asset('admin/js/jquery1-3.4.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/parsley.min.js') }}"></script>
    @stack('styles')

</head>

<body class="crm_body_bg">
        {{-- Sidebar --}}
    @include('layouts.admin-sidebar')

    @yield('content')

    <div class="footer_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_iner text-center">
                        <p>2025 © Fervour. All right reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/metisMenu.js') }}"></script>
    <script src="{{ asset('admin/vendors/apex_chart/apex-chart2.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    <script>
        options = {
            chart: {
                height: 339,
                type: "line",
                stacked: !1,
                toolbar: {
                    show: !1
                }
            },
            stroke: {
                width: [0, 2, 4],
                curve: "smooth"
            },
            plotOptions: {
                bar: {
                    columnWidth: "30%"
                }
            },
            colors: ["#9767FD", "#dfe2e6", "#f1b44c", "#f1b44c"],
            series: [{
                    name: "Total",
                    type: "column",
                    data: [0, 0, 0, 0, 145.2, 0, 7291.46, 0, 0, 0, 0, 0]
                },
                {
                    name: "Pending",
                    type: "column",
                    data: [0, 0, 0, 0, 0, 0, 7291.46, 0, 0, 0, 0, 0]
                },
                {
                    name: "Delivered",
                    type: "column",
                    data: [0, 0, 0, 0, 145.2, 0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name: "Canceled",
                    type: "column",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                },
            ],
            fill: {
                opacity: [0.85, 0.25, 1],
                gradient: {
                    inverseColors: !1,
                    shade: "light",
                    type: "vertical",
                    opacityFrom: 0.85,
                    opacityTo: 0.55,
                    stops: [0, 100, 100, 100]
                }
            },
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            markers: {
                size: 0
            },
            xaxis: {
                type: "text"
            },
            yaxis: {
                title: {
                    text: "Amount"
                }
            },
            tooltip: {
                shared: !0,
                intersect: !1,
                y: {
                    formatter: function(e) {
                        return void 0 !== e ? e.toFixed(0) + " $" : e;
                    },
                },
            },
            grid: {
                borderColor: "#f1f1f1"
            },
        };
        (chart = new ApexCharts(document.querySelector("#management_bar"), options)).render();
    </script>
    @stack('scripts')
</body>
</html>
