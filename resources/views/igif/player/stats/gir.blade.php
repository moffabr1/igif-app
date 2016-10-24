@extends('layouts.dashboard')
@section('page_heading','Greens in Regulation')
@section('section')


    <canvas id="player-gir" width="300" height="300"></canvas>

    <script src="{{ asset("assets/scripts/Chart.min.js") }}" type="text/javascript"></script>

    <script>
        (function() {
            var ctx = document.getElementById('player-gir').getContext('2d');
            var chart = {
                labels: <?php echo $dates ?>,
                datasets: [{
                    data: {{ $scores }},
                    fillColor : "rgba(151,187,205,0.2)",
                    strokeColor : "rgba(151,187,205,1)",
                    pointColor : "rgba(151,187,205,1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(151,187,205,1)",
                }]
            };

//            new Chart(ctx).Bar(chart, { bezierCurve: false });
            new Chart(ctx).Line(chart, { bezierCurve: true });
        })();
    </script>


@stop
