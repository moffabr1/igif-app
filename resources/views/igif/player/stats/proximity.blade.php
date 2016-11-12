@extends('layouts.dashboard')
@section('page_heading','Proximity to the Hole')
@section('section')


    <style>
        .chart-legend li span{
            display: inline-block;
            width: 12px;
            height: 12px;
            margin-right: 5px;
        }


    </style>

    {{--<canvas id="proximity_totals" width="800" height="500"></canvas>--}}
<div class="col-md-12">
    <div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Proximity to the Hole
            </div>
            <div class="panel-body" >
                <div style="max-width:800px; margin:0 auto;">
                    <canvas id="proximity_totals" width="800" height="500"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Proximity to the Hole Radar
            </div>
            <div class="panel-body">
                <div style="max-width:800px; margin:0 auto;">
                    <canvas id="proximity_totals_radar" width="800" height="500"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

    <script src="{{ asset("assets/scripts/Chart.2.3.min.js") }}" type="text/javascript"></script>


    <script>
        var ctx = document.getElementById("proximity_totals").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: [
                    '200+ Yards',
                    '175-200 Yards',
                    '150-175 Yards',
                    '130-150 Yards',
                    '120-130 Yards',
                    '110-120 Yards',
                    '100-110 Yards',
                    '90-100 Yards',
                    'Inside 90 Yards'
                ],
                datasets: [{
                    backgroundColor: [
                        "#2ecc71",
                        "#3498db",
                        "#95a5a6",
                        "#9b59b6",
                        "#f1c40f",
                        "#e74c3c",
                        "#34495e",
                        "#caebf2",
                        "#a9a9a9"
                    ],
                    data: [
                        {{ ($proximity_totals['prox_200yds'] > 0) ? number_format($proximity_totals['prox_200yds'], 0) : 0 }},

                        {{ ($proximity_totals['prox_175_200yds'] > 0) ? number_format($proximity_totals['prox_175_200yds'], 0) : 0 }},

                        {{ ($proximity_totals['prox_150_175yds'] > 0) ? number_format($proximity_totals['prox_150_175yds'], 0) : 0 }},

                        {{ ($proximity_totals['prox_130_150yds'] > 0) ? number_format($proximity_totals['prox_130_150yds'], 0) : 0 }},

                        {{ ($proximity_totals['prox_120_130yds'] > 0) ? number_format($proximity_totals['prox_120_130yds'], 0) : 0 }},

                        {{ ($proximity_totals['prox_110_120yds'] > 0) ? number_format($proximity_totals['prox_110_120yds'], 0) : 0 }},

                        {{ ($proximity_totals['prox_100_110yds'] > 0) ? number_format($proximity_totals['prox_100_110yds'], 0) : 0 }},

                        {{ ($proximity_totals['prox_90_100yds'] > 0) ? number_format($proximity_totals['prox_90_100yds'], 0) : 0 }},

                        {{ ($proximity_totals['prox_inside_90yds'] > 0) ? number_format($proximity_totals['prox_inside_90yds'], 0) : 0 }}

                    ]
                }]
            },
            options: {
                legend: {
                    display: false,
                    position: 'left'
                }
            }
        });
    </script>

    <script>
        (function() {
            var ctx2 = document.getElementById("proximity_totals_radar");
            var chart = new Chart(ctx2, {
                type: 'radar',
                data: {
                    labels: [
                        '200+ Yards',
                        '175-200 Yards',
                        '150-175 Yards',
                        '130-150 Yards',
                        '120-130 Yards',
                        '110-120 Yards',
                        '100-110 Yards',
                        '90-100 Yards',
                        'Inside 90 Yards'
                    ],
                    datasets: [{
                        label: 'Proximity',
                        data: [
                            {{ ($proximity_totals['prox_200yds'] > 0) ? number_format($proximity_totals['prox_200yds'], 0) : 0 }},

                            {{ ($proximity_totals['prox_175_200yds'] > 0) ? number_format($proximity_totals['prox_175_200yds'], 0) : 0 }},

                            {{ ($proximity_totals['prox_150_175yds'] > 0) ? number_format($proximity_totals['prox_150_175yds'], 0) : 0 }},

                            {{ ($proximity_totals['prox_130_150yds'] > 0) ? number_format($proximity_totals['prox_130_150yds'], 0) : 0 }},

                            {{ ($proximity_totals['prox_120_130yds'] > 0) ? number_format($proximity_totals['prox_120_130yds'], 0) : 0 }},

                            {{ ($proximity_totals['prox_110_120yds'] > 0) ? number_format($proximity_totals['prox_110_120yds'], 0) : 0 }},

                            {{ ($proximity_totals['prox_100_110yds'] > 0) ? number_format($proximity_totals['prox_100_110yds'], 0) : 0 }},

                            {{ ($proximity_totals['prox_90_100yds'] > 0) ? number_format($proximity_totals['prox_90_100yds'], 0) : 0 }},

                            {{ ($proximity_totals['prox_inside_90yds'] > 0) ? number_format($proximity_totals['prox_inside_90yds'], 0) : 0 }}

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
                    legend: {
                        display:false
                    },
                    scales: {
                        xAxes: [{
                            display:false,
                            gridLines: {
                                display:false
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                display: false
                            },
                            gridLines: {
                                display:false
                            }
                        }]
                    },
                    gridLines: {
                        drawBorder: false
                    },
                    title: {
                        display: true,
                        text: 'Approach Proximity'
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
                                return currentValue + " feet";
                            }
                        }
                    }
                }
            });

        })();

    </script>




@stop
