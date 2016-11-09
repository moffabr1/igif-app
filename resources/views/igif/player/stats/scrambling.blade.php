@extends('layouts.dashboard')
@section('page_heading','Scrambling')
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
                            Scrambling
                        </div>
                        <div class="panel-body" >
                            <div style="max-width:800px; margin:0 auto;">
                                <canvas id="scrambling" width="800" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Scrambling Stats</h4>
                        </div>
                        <div class="panel-body">

                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="col-lg-4">
                                        SCRAMBLING
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
                                        <i class="red-tooltip fa fa-question-circle" data-toggle="tooltip" title="The % of time a player misses a Green in Regulation, and still makes Par or Better" data-placement="left" aria-hidden="true"></i> SCRAMBLING
                                    </th>
                                    <td>
                                        {{$scrambling_data['scrambling_percentage_formatted']}}
                                    </td>
                                    <td>
                                        PAR OR BETTER = {{$scrambling_data['scrambling_success']}} &nbsp;&nbsp;&nbsp;OPPORTUNITIES = {{$scrambling_data['scrambling_opportunities']}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <i class="red-tooltip fa fa-question-circle" data-toggle="tooltip" title="The % of time a player misses a Green in Regulation and is Chipping, and still makes Par or Better" data-placement="left" aria-hidden="true"></i> SCRAMBLING WHILE CHIPPING
                                    </th>
                                    <td>
                                        {{$scrambling_data['scrambling_chipping_percentage_formatted']}}
                                    </td>
                                    <td>
                                        PAR OR BETTER = {{$scrambling_data['scrambling_chippipng_success']}} &nbsp;&nbsp;&nbsp;OPPORTUNITIES = {{$scrambling_data['scrambling_chipping_opportunities']}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <i class="red-tooltip fa fa-question-circle" data-toggle="tooltip" title="The % of time a player misses a Green in Regulation from the sand, and still makes Par or Better" data-placement="left" aria-hidden="true"></i> SCRAMBLING FROM THE SAND
                                    </th>
                                    <td>
                                        {{$scrambling_data['scrambling_sand_percentage_formatted']}}
                                    </td>
                                    <td>
                                        PAR OR BETTER = {{$scrambling_data['scrambling_sand_success']}} &nbsp;&nbsp;&nbsp;OPPORTUNITIES = {{$scrambling_data['scrambling_sand_opportunities']}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <i class="red-tooltip fa fa-question-circle" data-toggle="tooltip" title="The % of time a player misses a Green in Regulation from beyond 30 yards, and still makes Par or Better" data-placement="left" aria-hidden="true"></i> SCRAMBLING FROM > 30 YARDS
                                    </th>
                                    <td>
                                        {{$scrambling_data['scrambling_over30_percentage_formatted']}}
                                    </td>
                                    <td>
                                        PAR OR BETTER = {{$scrambling_data['scrambling_over30_success']}} &nbsp;&nbsp;&nbsp;OPPORTUNITIES = {{$scrambling_data['scrambling_over30_opportunities']}}
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
    </div>

<script src="{{ asset("assets/scripts/Chart.2.3.min.js") }}" type="text/javascript"></script>

<script>
    (function() {
        var ctx = document.getElementById("scrambling");
        var chart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: [
                    'Total Scrambling',
                    'Scrambling while Chipping',
                    'Scrambling from Sand',
                    'Scrambling from > 30 Yards'
                ],
                datasets: [{
                    label: 'Proximity',
                    data: [
                            45, 49, 38, 48

                    ],
                    {{--{{number_format($proximity_totals['prox_200yds'], 0)}},--}}
                            {{--{{number_format($proximity_totals['prox_175_200yds'], 0)}},--}}
                            {{--{{number_format($proximity_totals['prox_150_175yds'], 0)}},--}}
                            {{--{{number_format($proximity_totals['prox_130_150yds'], 0)}},--}}
                            {{--{{number_format($proximity_totals['prox_120_130yds'], 0)}},--}}
                            {{--{{number_format($proximity_totals['prox_110_120yds'], 0)}},--}}
                            {{--{{number_format($proximity_totals['prox_100_110yds'], 0)}},--}}
                            {{--{{number_format($proximity_totals['prox_90_100yds'], 0)}},--}}
                            {{--{{number_format($proximity_totals['prox_inside_90yds'], 0)}}--}}
                            {{--],--}}
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(153, 102, 255, 1)',
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
                legend: {
                    display:false
                },
                scale: {
                    ticks: {
//                        beginAtZero: false,
                        suggestedMin: 25
                    }
//                    xAxes: [{
//                        display:false,
//                        gridLines: {
//                            display:false
//                        }
//                    }],
//                    yAxes: [{
//                        ticks: {
//                            beginAtZero:true,
//                            display: false
//                        },
//                        gridLines: {
//                            display:false
//                        }
//                    }]
                },
                gridLines: {
                    drawBorder: false
                },
                title: {
                    display: true,
                    text: 'Scrambling'
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var dataset = data.datasets[tooltipItem.datasetIndex];
                            var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                                return previousValue + currentValue;
                            });
                            var currentValue = dataset.data[tooltipItem.index];
//                                var precentage = Math.floor(((currentValue/total) * 100)+0.5);
//                                return currentValue + "'";
                            return currentValue + " %";
                        }
                    }
                }
            }
        });

    })();

</script>


@stop
