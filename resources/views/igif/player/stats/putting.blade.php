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
            <div class="col-sm-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Putting %'s by Distance
                    </div>
                    <div class="panel-body">
                        <div style="max-width:700px; margin:0 auto;">
                            <canvas id="putting_percentages"></canvas>
                        </div>
                    </div>
                </div>

            </div>
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
        <div class="row">
            <div class="col-sm-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Putting Stats
                    </div>
                    <div class="panel-body">

                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="col-lg-4">
                                    PUTTING
                                </th>
                                <th class="col-lg-4">
                                    STATS
                                </th>
                                <th class="col-lg-4">
                                    INFO
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>
                                    PUTTING AVERAGE
                                </th>
                                <td>
                                    {{$total_putts_round}}
                                </td>
                                <td>
                                    Average Number of Putts per GIR
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    ONE-PUTT PERCENTAGE
                                </th>
                                <td>
                                    {{$cumputtingstats['putting_one_putt_percentage_formatted']}}
                                </td>
                                <td>
                                    [CONTENT]
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    LAG PUTT EFFICIENCY
                                </th>
                                <td>
                                    {{$cumputtingstats['lag_putt_efficiency_formatted']}}
                                </td>
                                <td>
                                    % of 2 Putts from 25+ feet
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    3-PUTT AVOIDANCE
                                </th>
                                <td>
                                    {{$cumputtingstats['three_putt_avoidance']}}
                                </td>
                                <td>
                                    Total 3 Putts Divided by the Total # of Holes
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    PUTTS PER ROUND
                                </th>
                                <td>
                                    {{$cumputtingstats['total_putts_round']}}
                                </td>
                                <td>
                                    Putts per Round Average
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    PUTTING FROM 3'
                                </th>
                                <td>
                                    {{$cumputtingstats['putting_three_footer_make_percentage_formatted']}}
                                </td>
                                <td>
                                    ATTEMPTS = {{$cumputtingstats['putting_three_footer_total']}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    PUTTING FROM 4'
                                </th>
                                <td>
                                    {{$cumputtingstats['putting_four_footer_make_percentage_formatted']}}
                                </td>
                                <td>
                                    ATTEMPTS = {{$cumputtingstats['putting_four_footer_total']}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    PUTTING FROM 5'
                                </th>
                                <td>
                                    {{$cumputtingstats['putting_five_footer_make_percentage_formatted']}}
                                </td>
                                <td>
                                    ATTEMPTS = {{$cumputtingstats['putting_five_footer_total']}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    PUTTING FROM 6'
                                </th>
                                <td>
                                    {{$cumputtingstats['putting_six_footer_make_percentage_formatted']}}
                                </td>
                                <td>
                                    ATTEMPTS = {{$cumputtingstats['putting_six_footer_total']}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    PUTTING FROM 7'
                                </th>
                                <td>
                                    {{$cumputtingstats['putting_seven_footer_make_percentage_formatted']}}
                                </td>
                                <td>
                                    ATTEMPTS = {{$cumputtingstats['putting_seven_footer_total']}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    PUTTING FROM 8'
                                </th>
                                <td>
                                    {{$cumputtingstats['putting_eight_footer_make_percentage_formatted']}}
                                </td>
                                <td>
                                    ATTEMPTS = {{$cumputtingstats['putting_eight_footer_total']}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    PUTTING FROM 9'
                                </th>
                                <td>
                                    {{$cumputtingstats['putting_nine_footer_make_percentage_formatted']}}
                                </td>
                                <td>
                                    ATTEMPTS = {{$cumputtingstats['putting_nine_footer_total']}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    PUTTING FROM 10'
                                </th>
                                <td>
                                    {{$cumputtingstats['putting_ten_footer_make_percentage_formatted']}}
                                </td>
                                <td>
                                    ATTEMPTS = {{$cumputtingstats['putting_ten_footer_total']}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    PUTTING FROM 4-8'
                                </th>
                                <td>
                                    {{$cumputtingstats['putting_four_to_eight_make_percentage_formatted']}}
                                </td>
                                <td>
                                    ATTEMPTS = {{$cumputtingstats['putting_four_to_eight_total']}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    PUTTING FROM INSIDE 10'
                                </th>
                                <td>
                                    {{$cumputtingstats['putting_inside_ten_feet_make_percentage_formatted']}}
                                </td>
                                <td>
                                    ATTEMPTS = {{$cumputtingstats['putting_inside_ten_eight_total']}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    PUTTING FROM 10-15'
                                </th>
                                <td>
                                    {{$cumputtingstats['putting_ten_to_fifteen_feet_make_percentage_formatted']}}
                                </td>
                                <td>
                                    ATTEMPTS = {{$cumputtingstats['putting_ten_to_fifteen_feet_total']}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    PUTTING FROM 15-20'
                                </th>
                                <td>
                                    {{$cumputtingstats['putting_fiftenn_to_twenty_feet_make_percentage_formatted']}}
                                </td>
                                <td>
                                    ATTEMPTS = {{$cumputtingstats['putting_fiftenn_to_twenty_feet_total']}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    PUTTING FROM 20-25'
                                </th>
                                <td>
                                    {{$cumputtingstats['putting_twenty_to_twentyfive_feet_make_percentage_formatted']}}
                                </td>
                                <td>
                                    ATTEMPTS = {{$cumputtingstats['putting_twenty_to_twentyfive_feet_total']}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    PUTTING FROM > 25'
                                </th>
                                <td>
                                    {{$cumputtingstats['putting_over_twentyfive_feet_make_percentage_formatted']}}
                                </td>
                                <td>
                                    ATTEMPTS = {{$cumputtingstats['putting_over_twentyfive_feet_make_total']}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    LONGEST PUTT
                                </th>
                                <td>
                                    {{$cumputtingstats['putting_longest_putt_feet']}}'
                                </td>
                                <td>
                                    [CONTENT]
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    APPROACH PUTT PERFORMANCE
                                </th>
                                <td>
                                    {{$cumputtingstats['total_approach_putt_performance']}}
                                </td>
                                <td>
                                    Avg distance to the hole after the first putt
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    BIRDIE OR BETTER CONVERSION PERCENTAGE
                                </th>
                                <td>
                                    {{$cumputtingstats['birdie_or_better_conversion_percentage_formatted']}}
                                </td>
                                <td>
                                    % showing Birdies or better are made per GIR
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    PAR OR BETTER CONVERSION PERCENTAGE
                                </th>
                                <td>
                                    {{$cumputtingstats['par_or_better_conversion_percentage_formatted']}}
                                </td>
                                <td>
                                    % showing Pars made per GIR
                                </td>
                            </tr>
                            </tbody>
                        </table>

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
                                suggestedMin: 15,
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
                        label: 'Putts by Type',
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
                        text: 'Putts by Type'
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
    <script>
        (function() {
            var ctx3 = document.getElementById("putting_percentages");
            var chart = new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: [
                            "4 to 8 Feet", "Inside 10 Feet", "10 to 15 Feet", "15 to 20 Feet", "20 to 25 Feet", "25+ Feet"
                    ],
                    datasets: [{
                        data: [
                            {{$cumputtingstats['putting_four_to_eight_make_percentage']}},
                            {{$cumputtingstats['putting_inside_ten_feet_make_percentage']}},
                            {{$cumputtingstats['putting_ten_to_fifteen_feet_make_percentage']}},
                            {{$cumputtingstats['putting_fiftenn_to_twenty_feet_make_percentage']}},
                            {{$cumputtingstats['putting_twenty_to_twentyfive_feet_make_percentage']}},
                            {{$cumputtingstats['putting_over_twentyfive_feet_make_percentage']}}



                        ],
                        label: 'Putting %s by Distance',
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
//                    legend: {
//                        display: true,
//                        position: 'left'
//                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Putting Make %s by Distance'
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var dataset = data.datasets[tooltipItem.datasetIndex];
//                                var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
//                                    return previousValue + currentValue;
//                                });
                                var currentValue = dataset.data[tooltipItem.index];
                                var precentage = Math.floor(((currentValue) * 100));
                                return precentage + "% of Putts Made";
                            }
                        }
                    }
                }
            });

        })();

    </script>



@stop
