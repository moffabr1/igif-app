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
                        backgroundColor: "rgba(54, 162, 235, 0.2)",
                        borderColor: "rgba(54, 162, 235, 1)"

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
                        label: 'Fairways Hit',
                        borderWidth: 1,
                        backgroundColor: "rgba(54, 162, 235, 0.2)",
                        borderColor: "rgba(54, 162, 235, 1)"

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
                            fontColor: 'rgb(54, 162, 235)'
                        }
                    }
                }
            });

        })();

    </script>



@stop
