@extends('layouts.dashboard')
@section('page_heading','Driving Accuracy')
@section('section')



    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Fairways Hit per Round
                    </div>
                    <div class="panel-body">
                        <div style="max-width:400px; margin:0 auto;">
                            <canvas id="fairways_hit" width="800" height="500"></canvas>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Avg Drive Distance per Round
                    </div>

                    <div class="panel-body">
                        <div style="max-width:400px; margin:0 auto;">
                            <canvas id="driving_distance_round" width="800" height="500"></canvas>
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
                        Fairways Hit &amp; Scores
                    </div>

                    <div class="panel-body">
                        <div style="max-width:400px; margin:0 auto;">
                            <canvas id="fairways_scores" width="800" height="500"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Fairways Hit %
                    </div>

                    <div class="panel-body">
                        <div style="max-width:400px; margin:0 auto;">
                            <canvas id="fairways_hit_percentage" width="800" height="500"></canvas>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>


    <script src="{{ asset("assets/scripts/Chart.2.3.min.js") }}" type="text/javascript"></script>


    <script>
        (function() {
            var ctx = document.getElementById("fairways_hit");
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($fw_hit_round_dates) ?>,
                    datasets: [{
                        data:
                                [
                                    {{implode(", ", $fw_hit_round_data)}}
                                ],
                        label: 'Fairways Hit',
                        borderWidth: 1,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',

                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                suggestedMax: 18,
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
                            fontColor: 'rgb(54, 162, 235)'
                        }
                    }
                }
            });

        })();

    </script>

    <script>
        (function() {
            var ctx2 = document.getElementById("driving_distance_round");
            var chart = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($fw_hit_round_dates) ?>,
                    datasets: [{
                        data:
                                [
                                    {{implode(", ", $driving_distance_avg_round)}}
                                ],
                        label: 'Drive Distance',
                        borderWidth: 1,
                        backgroundColor: "rgba(54, 162, 235, 0.2)",
                        borderColor: "rgba(54, 162, 235, 1)"

                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:false,
                                suggestedMax: 350
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Driving Distance Per Round (Yards)'
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
                                return currentValue + " yards";
                            }
                        }
                    }
                }
            });

        })();

    </script>

    <script>
        (function() {
            var ctx3 = document.getElementById("fairways_scores");
            var chart = new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($fw_hit_round_dates) ?>,
                    datasets: [{
                        data:
                                [
                                    {{implode(", ", $fw_hit_round_data)}}
                                ],
                        label: 'Fairways Hit',
                        borderWidth: 1,
                        backgroundColor: "rgba(54, 162, 235, 0.2)",
                        borderColor: "rgba(54, 162, 235, 1)"

                    },
                        {
                            data:
                                    [
                                        {{implode(", ", $scores_round)}}
                                    ],
                            label: 'Scores',
                            borderWidth: 1,
                            backgroundColor: "rgba(255, 206, 86, 0.2)",
                            borderColor: "rgba(54, 162, 235, 1)"
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                suggestedMax: 100
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
                            fontColor: 'rgb(54, 162, 235)'
                        }
                    }
                }
            });

        })();

    </script>
    <script>
        (function() {
            var ctx4 = document.getElementById("fairways_hit_percentage");
            var chart = new Chart(ctx4, {
                type: 'doughnut',
                data: {
                    labels: [
                        "Fairways Hit: {{$total_fw_hit}}",
                        "Fairway Opportunities: {{$total_fw_opportunities}}",
                    ],
                    datasets: [{
                        data:
                        [
                            {{$total_fw_hit_percentage}},
                            {{$total_fw_miss_percentage}}
                        ],

                        label: 'Fairway Hit %',
                        borderWidth: 1,
                        backgroundColor: [
                            "rgba(0,255,0, .5)",
                            "rgba(255,0,0, .5)"
                        ],
                        hoverBackgroundColor: [
                            "rgba(0,255,0, .8)",
                            "rgba(255,0,0, .8)"
                        ]

                    }]
                },
                options: {
                    scales: {
                        xAxes: [{
                            display:false,
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
                        text: 'Fairways Hit %'
                    },
                    hover: {
                        // Overrides the global setting
                        mode: 'label'
                    },
                    legend: {
                        display: true,
                        position: 'left',
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
