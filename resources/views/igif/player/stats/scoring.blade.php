@extends('layouts.dashboard')
@section('page_heading','Scoring Stats')
@section('section')

    <style>
        .red-tooltip + .tooltip > .tooltip-inner {background-color: #ffae42;}
        .red-tooltip + .tooltip > .tooltip-arrow { border-bottom-color:#ffae42; }
    </style>
    <script>
        $(document).ready(function(){
            $("i").tooltip();
        });
    </script>


    <div class="container">
        <div class="col-md-10">
            <div class="row">

                <div class="col-lg-12">

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

            </div>
            <div class="row">

                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Scoring by Type (all rounds)
                        </div>
                        <div class="panel-body">
                            <div style="max-width:800px; margin:0 auto;">
                                <canvas id="score-by-type" width="800" height=300"></canvas>
                            </div>
                        </div>
                    </div>

                </div>

            </div>




            <div class="row">
                <div class="col-sm-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Scoring Stats</h4>
                        </div>
                        <div class="panel-body">

                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="col-lg-4">
                                        SCORING
                                    </th>
                                    <th class="col-lg-2">
                                        STATS
                                    </th>
                                    <th class="col-lg-6">
                                        INFO
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>
                                        <i class="red-tooltip fa fa-question-circle" data-toggle="tooltip" title="The lowest round recorded" data-placement="left" aria-hidden="true"></i> LOWEST ROUND
                                    </th>
                                    <td>
                                        {{$scoring_cum['lowest_round']}}
                                    </td>
                                    <td>
                                        TOTAL ROUNDS = {{$scoring_cum['total_rounds']}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <i class="red-tooltip fa fa-question-circle" data-toggle="tooltip" title="The average number of strokes per round" data-placement="left" aria-hidden="true"></i> SCORING AVG
                                    </th>
                                    <td>
                                        {{$scoring_cum['scoring_avg']}}
                                    </td>
                                    <td>
                                        TOTAL ROUNDS = {{$scoring_cum['total_rounds']}} &nbsp;&nbsp;TOTAL STROKES = {{$scoring_cum['total_strokes']}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <i class="red-tooltip fa fa-question-circle" data-toggle="tooltip" title="The scoring average for holes 1 - 9" data-placement="left" aria-hidden="true"></i> FRONT 9 SCORING AVG
                                    </th>
                                    <td>
                                        {{$scoring_cum['front_9_scoring_avg']}}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <i class="red-tooltip fa fa-question-circle" data-toggle="tooltip" title="The scoring average for holes 10 - 18" data-placement="left" aria-hidden="true"></i> BACK 9 SCORING AVG
                                    </th>
                                    <td>
                                        {{$scoring_cum['back_9_scoring_avg']}}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <i class="red-tooltip fa fa-question-circle" data-toggle="tooltip" title="The percent of time a player is over par on a hole and then par or better on the following hole. " data-placement="left" aria-hidden="true"></i> BOUNCE BACK PCTG
                                    </th>
                                    <td>
                                        {{number_format($scoring_cum['total_bounce_back_pctg'], 2) * 100 . '%'}}
                                    </td>
                                    <td>
                                        TOTAL BOGEY OR WORSE = {{$scoring_cum['total_bogey_or_worse']}} &nbsp;&nbsp;TOTAL BOUNCE BACK = {{$scoring_cum['bounce_back_total']}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <i class="red-tooltip fa fa-question-circle" data-toggle="tooltip" title="The percent of time a score of par or better is recorded. " data-placement="left" aria-hidden="true"></i> TOTAL PAR OR BETTER PCTG
                                    </th>
                                    <td>
                                        {{number_format($scoring_cum['total_par_or_better_pctg'], 2) * 100 . '%'}}
                                    </td>
                                    <td>
                                        TOTAL PARS OR BETTER = {{$scoring_cum['total_dbleagles'] + $scoring_cum['total_eagles'] + $scoring_cum['total_birdies'] + $scoring_cum['total_pars']}} &nbsp;&nbsp;TOTAL HOLES = {{$scoring_cum['total_holes']}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{--<i class="red-tooltip fa fa-question-circle" data-toggle="tooltip" title="The scoring average for holes 10 - 18" data-placement="left" aria-hidden="true"></i> BACK 9 SCORING AVG--}}
                                        TOTAL DBL EAGLES per ROUND
                                    </th>
                                    <td>
                                        {{$scoring_cum['total_dbleagles_round']}}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{--<i class="red-tooltip fa fa-question-circle" data-toggle="tooltip" title="The scoring average for holes 10 - 18" data-placement="left" aria-hidden="true"></i> BACK 9 SCORING AVG--}}
                                        TOTAL EAGLES per ROUND
                                    </th>
                                    <td>
                                        {{$scoring_cum['total_eagles_round']}}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{--<i class="red-tooltip fa fa-question-circle" data-toggle="tooltip" title="The scoring average for holes 10 - 18" data-placement="left" aria-hidden="true"></i> BACK 9 SCORING AVG--}}
                                        TOTAL BIRDIES per ROUND
                                    </th>
                                    <td>
                                        {{$scoring_cum['total_birdies_round']}}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{--<i class="red-tooltip fa fa-question-circle" data-toggle="tooltip" title="The scoring average for holes 10 - 18" data-placement="left" aria-hidden="true"></i> BACK 9 SCORING AVG--}}
                                        TOTAL PARS per ROUND
                                    </th>
                                    <td>
                                        {{$scoring_cum['total_pars_round']}}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{--<i class="red-tooltip fa fa-question-circle" data-toggle="tooltip" title="The scoring average for holes 10 - 18" data-placement="left" aria-hidden="true"></i> BACK 9 SCORING AVG--}}
                                    TOTAL BOGEYS per ROUND
                                    </th>
                                    <td>
                                        {{$scoring_cum['total_bogeys_round']}}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{--<i class="red-tooltip fa fa-question-circle" data-toggle="tooltip" title="The scoring average for holes 10 - 18" data-placement="left" aria-hidden="true"></i> BACK 9 SCORING AVG--}}
                                        TOTAL DBL BOGEYS per ROUND
                                    </th>
                                    <td>
                                        {{$scoring_cum['total_dblbogeys_round']}}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{--<i class="red-tooltip fa fa-question-circle" data-toggle="tooltip" title="The scoring average for holes 10 - 18" data-placement="left" aria-hidden="true"></i> BACK 9 SCORING AVG--}}
                                        TOTAL 3+ BOGEYS per ROUND
                                    </th>
                                    <td>
                                        {{$scoring_cum['total_3plusbogeys_round']}}
                                    </td>
                                    <td>
                                    </td>
                                </tr>




                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>

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
    <script>
        (function() {
            var ctx2 = document.getElementById("score-by-type");
            var chart = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ["Dbl Eagles", "Eagles", "Birdies", "Pars", "Bogeys", "Dbl Bogeys", "3+ Bogeys"],
                    datasets: [{
                        label: 'Total by Type',
                        data: [
                            {{$scoring_cum['total_dbleagles']}},
                            {{$scoring_cum['total_eagles']}},
                            {{$scoring_cum['total_birdies']}},
                            {{$scoring_cum['total_pars']}},
                            {{$scoring_cum['total_bogeys']}},
                            {{$scoring_cum['total_dblbogeys']}},
                            {{$scoring_cum['total_3plusbogeys']}}
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
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
                        text: 'Chart of scoring results by type'
                    }
                }
            });

        })();

    </script>


@stop
