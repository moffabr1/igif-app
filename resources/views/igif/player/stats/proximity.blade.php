@extends('layouts.dashboard')
@section('page_heading','Proximity to the Hole')
@section('section')

    <div class="col-lg-8">
        <canvas id="player-scores" width="800" height="300"></canvas>
    </div>


    <script src="{{ asset("assets/scripts/Chart.2.3.min.js") }}" type="text/javascript"></script>

    <script>
        (function() {
            var ctx = document.getElementById("player-scores");
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Dbl Eagles", "Eagles", "Birdies", "Pars", "Bogeys", "Dbl Bogeys", "3+ Bogeys"],
                    datasets: [{
                        label: 'Scoring Results',
                        data: [
                            {{$cumulativeData['total_dbleagles']}},
                            {{$cumulativeData['total_eagles']}},
                            {{$cumulativeData['total_birdies']}},
                            {{$cumulativeData['total_pars']}},
                            {{$cumulativeData['total_bogeys']}},
                            {{$cumulativeData['total_dblbogeys']}},
                            {{$cumulativeData['total_3plusbogeys']}}
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
                        text: 'Proximity to the Hole'
                    }
                }
            });

        })();

    </script>

@stop
