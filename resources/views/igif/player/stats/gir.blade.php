@extends('layouts.dashboard')
@section('page_heading','Greens in Regulation')
@section('section')



    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Greens in Regulation per Round
                    </div>
                    <div class="panel-body">
                        <div style="max-width:400px; margin:0 auto;">
                            <canvas id="gir" width="800" height="500"></canvas>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Greens in Regulation %
                    </div>

                    <div class="panel-body">
                        <div style="max-width:400px; margin:0 auto;">
                            <canvas id="gir_percent" width="800" height="500"></canvas>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        {{--new row--}}

        <div class="row">
            <div class="col-sm-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Greens in Regulation %
                    </div>
                    <div class="panel-body">
                        <div style="max-width:400px; margin:0 auto;">
                            <canvas id="gir_score" width="800" height="500"></canvas>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        heading
                    </div>

                    <div class="panel-body">
                        <div style="max-width:400px; margin:0 auto;">
                            body
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>


    <script src="{{ asset("assets/scripts/Chart.2.3.min.js") }}" type="text/javascript"></script>


    <script>
        (function() {
            var ctx = document.getElementById("gir");
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($gir_dates) ?>,
                    datasets: [{
                        data:
                                [
                                    {{implode(", ", $gir)}}
                                ],
                        label: 'Greens in Regulation',
                        borderWidth: 1,
                        backgroundColor: "rgba(0, 200, 81, 0.3)",
                        borderColor: "rgba(46, 100, 1, 1)"

                    }]
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
                        text: 'GIR'
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
    <script>
        (function() {
            var ctx2 = document.getElementById("gir_percent");
            var chart = new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: [
                        "Total GIR Hit: {{$total_gir_hit}}",
                        "Total GIR Missed: {{$total_gir_missed}}"
                    ],
                    datasets: [{
                        data:
                                [
                                    {{$total_gir_hit}}, {{$total_gir_missed}}
                                ],
                        label: 'Greens in Regulation',
                        borderWidth: 1,
                        backgroundColor: [
                            "rgba(0, 200, 81, .5)",
                            "rgba(220,20,60, .5)"
                        ],
                        hoverBackgroundColor: [
                            "rgba(0, 200, 81, .8)",
                            "rgba(220,20,60, .8)"
                        ]

                    }]
                },
                options: {
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display:false
                            }
                        }],
                        yAxes: [{
                            display: false,
                            gridLines: {
                                display:false
                            }
                        }]
                    },

                    title: {
                        display: true,
                        text: 'GIR Hit %'
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
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var dataset = data.datasets[tooltipItem.datasetIndex];
                                var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                                    return previousValue + currentValue;
                                });
                                var currentValue = dataset.data[tooltipItem.index];
                                var precentage = Math.floor(((currentValue/total) * 100)+0.5);
                                return precentage + "%";
                            }
                        }
                    }
                }
            });

        })();
    </script>
    <script>
        (function() {
            var ctx3 = document.getElementById("gir_score");
            var chart = new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($gir_dates) ?>,
                    datasets: [{
                        data: [
                            {{implode(", ", $gir)}}
                        ],
                        label: 'Greens in Regulation',
                        borderWidth: 1,
                        backgroundColor: "rgba(0, 200, 81, 0.3)",
                        borderColor: "rgba(46, 100, 1, 1)"
                    },
                        {
                        data:{{$scores}},

                        label: 'Scores',
                        borderWidth: 1,
                        backgroundColor: "rgba(255, 206, 86, 0.2)",
                        borderColor: "rgba(46, 100, 1, 1)"

                    }]
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
                        text: 'GIR'
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
