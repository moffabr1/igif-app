@extends('layouts.dashboard')
@section('page_heading','Driving Accuracy')
@section('section')

<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">Panel Heading</div>
        <div class="panel-body">

            <div class="col-lg-6">
                {{--<canvas id="player-scores" width="800" height="400"></canvas>--}}
                <canvas id="player-scores" width="800" height="400"></canvas>
            </div>

        </div>
    </div>
</div>




    <script src="{{ asset("assets/scripts/Chart.2.3.min.js") }}" type="text/javascript"></script>

    <script>
        (function() {
            var ctx = document.getElementById("player-scores");
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($dates) ?>,
                    datasets: [
                        {
                            label: "Fairways Hit",
                            fill: true,
                            lineTension: .3,
                            backgroundColor: "rgba(75,192,192,0.4)",
                            borderColor: "rgba(75,192,192,1)",
                            borderCapStyle: 'round',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            pointBorderColor: "rgba(75,192,192,1)",
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(75,192,192,1)",
                            pointHoverBorderColor: "rgba(220,220,220,1)",
                            pointHoverBorderWidth: 1,
                            pointRadius: 5,
                            pointHitRadius: 10,
                            hoverBorderWidth: 3,
                            data:
                                    [
                                        {{implode(", ", $fw_hit)}}
                                    ],
                            spanGaps: false,
                        }],
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Fairways Hit'
                    },
                    hover: {
                        // Overrides the global setting
                        mode: 'label'
                    },
                    legend: {
                        display: true,
                        labels: {
                            fontColor: 'rgb(255, 99, 132)'
                        }
                    }
                }
            });

        })();

    </script>

@stop
