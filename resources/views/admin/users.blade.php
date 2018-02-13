@extends('layouts.app')

@section('content')
    <style>
        .chart_wrap {
            position: relative;
            padding-bottom: 100%;
            height: 0;
            overflow:hidden;
        }

        .chart_div {
            position: absolute;
            top: 0;
            left: 0;
            width:100%;
            height:100%;
        }

        .chart {
            width: 100%;
            min-height: 450px;
        }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

   {{----}}
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Gender', 'male/female'],
                ['male', {{$users->where('gender','m')->count()}}],
                ['female', {{$users->where('gender','f')->count()}}]

            ]);

            var options = {
                title: 'Gender Male/Female',
                colors: ['#990099', '#3366CC']
            };

            var chart = new google.visualization.PieChart(document.getElementById('gender-chart'));

            chart.draw(data, options);
        }
    </script>

   {{----}}
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['User', 'paid/unpaid'],
                ['paid', {{$users->where('paid','1')->count()}}],
                ['unpaid', {{$users->where('paid','0')->count()}}]

            ]);

            var options = {
                title: 'User Paid/Unpaid',
                colors: ['#34cc7e','#ce072f']
            };

            var chart = new google.visualization.PieChart(document.getElementById('paid-chart'));

            chart.draw(data, options);
        }
    </script>

    {{----}}
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['User', 'admin/manager'],
                ['admin', {{$adminC}}],
                ['manager', {{$managerC}}],
                ['student', {{$studentC}}],
                ['users', {{$userC}}]

            ]);

            var options = {
                title: 'User Type',
                colors: ['#34cc7e','#ce072f','#3366CC','#990099']
            };

            var chart = new google.visualization.PieChart(document.getElementById('userType-chart'));

            chart.draw(data, options);
        }
    </script>

    {{----}}
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['User', 'verified/unverified'],
                ['Verified', {{$users->where('verified',1)->count()}}],
                ['Un-verified', {{$users->where('verified',0)->count()}}]

            ]);

            var options = {
                title: 'Verified Users',
                colors: ['#109618', '#ff9900']
            };

            var chart = new google.visualization.PieChart(document.getElementById('verified-chart'));

            chart.draw(data, options);
        }
    </script>


    {{--Added to make google chart responsive--}}
    <script type="text/javascript">
        $(window).on("throttledresize", function (event) {
            var options = {
                width: '100%',
                height: '100%'
            };

            var data = google.visualization.arrayToDataTable([]);
            drawChart(data, options);
        });
    </script>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                @include('admin.partials.breadcrumbs')
                <i class="fa fa-long-arrow-right"></i>
                <a href="{{url('/users')}}">Users Stats</a>
            </div>
        </div>

        <div class="row">
            <h3>Total no of Users: {{$users->count()}}</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                    <div class="chart" id="gender-chart"></div>
            </div>

            <div class="col-md-6">
                <div class="chart" id="verified-chart" ></div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="chart" id="userType-chart"></div>
            </div>

            <div class="col-md-6">
                <div class="chart" id="paid-chart" ></div>
            </div>
        </div>
    </div>


@endsection
