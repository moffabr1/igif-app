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

    <div class="col-md-8">
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

    <div class="col-md-8">
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



    <script src="{{ asset("assets/scripts/Chart.2.3.min.js") }}" type="text/javascript"></script>


    <script>
        var polarData = {
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
            datasets: [
                {
                    data: [
                        {{number_format($proximity_totals['prox_200yds'], 0)}},
                        {{number_format($proximity_totals['prox_175_200yds'], 0)}},
                        {{number_format($proximity_totals['prox_150_175yds'], 0)}},
                        {{number_format($proximity_totals['prox_130_150yds'], 0)}},
                        {{number_format($proximity_totals['prox_120_130yds'], 0)}},
                        {{number_format($proximity_totals['prox_110_120yds'], 0)}},
                        {{number_format($proximity_totals['prox_100_110yds'], 0)}},
                        {{number_format($proximity_totals['prox_90_100yds'], 0)}},
                        {{number_format($proximity_totals['prox_inside_90yds'], 0)}}
                    ],
                    backgroundColor: [
                        "#F7464A",
                        "#46BFBD",
                        "#FDB45C",
                        "#949FB1",
                        "#4D5360"
                    ],
                    hoverBackgroundColor: [
                        "#FF5A5E",
                        "#5AD3D1",
                        "#FFC870",
                        "#A8B3C5",
                        "#616774"
                    ]
                }]
        };


        window.onload = function(){
            var ctx = document.getElementById("proximity_totals").getContext("2d");

            window.myPolarArea = new Chart(ctx, {
//            var myDoughnutChart = new Chart(ctx, {
                type: 'polarArea',
                data: polarData,
                options: {

                    legend: {
                        display: true,
                        position: 'left'
                    },
                    legendCallback: function(chart) {
                        console.log(chart.data);
                        var text = [];
                        text.push('<ul>');
                        for (var i=0; i<chart.data.datasets[0].data.length; i++) {
                            text.push('<li>');
                            text.push('<span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">' + chart.data.datasets[0].data[i] + '</span>');
                            if (chart.data.labels[i]) {
                                text.push(chart.data.labels[i]);
                            }
                            text.push('</li>');
                        }
                        text.push('</ul>');
                        return text.join("");
                    },
                    responsive: true,
                    elements: {
                        arc: {
                            borderColor: "#000000"
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
//                                var precentage = Math.floor(((currentValue/total) * 100)+0.5);
                                return currentValue + "'";
                            }
                        }
                    }

                },
                animation:{
                    animateScale: true
                }
            });
        };

//        document.getElementById('js-legend').innerHTML = myPolarArea.generateLegend();

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
                            {{number_format($proximity_totals['prox_200yds'], 0)}},
                            {{number_format($proximity_totals['prox_175_200yds'], 0)}},
                            {{number_format($proximity_totals['prox_150_175yds'], 0)}},
                            {{number_format($proximity_totals['prox_130_150yds'], 0)}},
                            {{number_format($proximity_totals['prox_120_130yds'], 0)}},
                            {{number_format($proximity_totals['prox_110_120yds'], 0)}},
                            {{number_format($proximity_totals['prox_100_110yds'], 0)}},
                            {{number_format($proximity_totals['prox_90_100yds'], 0)}},
                            {{number_format($proximity_totals['prox_inside_90yds'], 0)}}
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
                        xAxes: [{
                            gridLines: {
                                display:false
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display:false
                            }
                        }]
                    },
                    gridLines: {
                        drawBorder: false
                    },
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
