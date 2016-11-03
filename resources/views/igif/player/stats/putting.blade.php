@extends('layouts.dashboard')
@section('page_heading','Putting')
@section('section')



    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Putts by Round
                    </div>
                    <div class="panel-body">
                        <div style="max-width:400px; margin:0 auto;">
                            <canvas id="putts_per_round" width="800" height="500"></canvas>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Putts by Type
                    </div>

                    <div class="panel-body">
                        <div style="max-width:400px; margin:0 auto;">
                            <canvas id="putts_by_type" width="800" height="500"></canvas>
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
            var ctx = document.getElementById("putts_per_round");
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($putting_dates) ?>,
                    datasets: [{
                        data:
                                [
                                    {{implode(", ", $putting_data)}}
                                ],
                        label: ' Putts',
                        borderWidth: 1,
                        backgroundColor: "rgba(148, 0, 211, 0.3)",
                        borderColor: "rgba(46, 100, 1, 1)"

                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:false
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: '# Putts by Round'
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
            var ctx2 = document.getElementById("putts_by_type");
            var chart = new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: [
                        "0 Putts: {{$zeroputts}}",
                        "1 Putts: {{$oneputts}}",
                        "2 Putts: {{$twoputts}}",
                        "3 Putts: {{$threeputts}}"
                    ],
                    datasets: [{
                        data:
                                [
                                    {{$zeroputts}}, {{$oneputts}}, {{$twoputts}}, {{$threeputts}}
                                ],
                        label: 'Greens in Regulation',
                        borderWidth: 1,
                        backgroundColor: [
                            "rgba(0,255,255, .5)",
                            "rgba(255,215,0, .5)",
                            "rgba(0,255,0, .5)",
                            "rgba(255,0,0, .5)"
                        ],
                        hoverBackgroundColor: [
                            "rgba(0,255,255, .8)",
                            "rgba(255,215,0, .8)",
                            "rgba(0,255,0, .8)",
                            "rgba(255,0,0, .8)"
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



@stop
