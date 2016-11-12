@extends('layouts.dashboard')
@section('page_heading','Scoring Stats')
@section('section')

    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Scores (last 20 rounds)
                </div>
                <div class="panel-body">
                    <div style="max-width:800px; margin:0 auto;">
                        <canvas id="player-score-history" width="800" height="300"></canvas>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Scoring by Type (all rounds)
                        </div>
                        <div class="panel-body">
                            <div style="max-width:800px; margin:0 auto;">
                                {{--<canvas id="player-score-type" width="800" height=300"></canvas>--}}
                            </div>
                        </div>
                    </div>

                </div>
                {{--<div class="col-sm-6">--}}

                {{--<div class="panel panel-default">--}}

                {{--<div class="panel-heading">--}}

                {{--</div>--}}

                {{--<div class="panel-body">--}}
                {{--<div style="max-width:400px; margin:0 auto;">--}}
                {{--body--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>

            {{--new row--}}


            {{--<div class="col-sm-6">--}}

            {{--<div class="panel panel-default">--}}

            {{--<div class="panel-heading">--}}
            {{--heading--}}
            {{--</div>--}}

            {{--<div class="panel-body">--}}
            {{--<div style="max-width:400px; margin:0 auto;">--}}
            {{--body--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}


            {{--</div>--}}
        </div>

    </div>


    <script src="{{ asset("assets/scripts/Chart.2.3.min.js") }}" type="text/javascript"></script>

    <script>
        (function() {
            var ctx = document.getElementById("player-score-history");
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo $dates ?>,
                    datasets: [{
                        data:{{ $scores }},
                        label: '(20 rounds max)',
                        borderWidth: 1,
                        backgroundColor: "rgba(54, 162, 235, 0.2)",
                        borderColor: "rgba(54, 162, 235, 1)"

                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                suggestedMin: 60,
                                suggestedMax: 85,
                                beginAtZero:false
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Historical Scores'
                    },
                    hover: {
                        // Overrides the global setting
                        mode: 'label'
                    },
                    legend: {
                        display: true,
                        labels: {
                            fontColor: 'rgb(54, 162, 235)'
                        }
                    }
                }
            });

        })();

    </script>

@stop
