<style>
    canvas{
        width: 100% !important;
        max-width: 800px;
        height: auto !important;
    }
</style>



<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">Panel Heading</div>
        <div class="panel-body">

            <div class="col-lg-6">
                {{--<canvas id="player-scores" width="800" height="400"></canvas>--}}
                <canvas id="fairways_hit" width="800" height="400"></canvas>
            </div>

        </div>
    </div>
</div>








<script src="{{ asset("assets/scripts/Chart.2.3.min.js") }}" type="text/javascript"></script>

<script>
    (function() {
        var ctx99 = document.getElementById("fairways_hit");
        var chart = new Chart(ctx99, {
            type: 'line',
            data: {
                labels: ['label 1', 'label 2'],
                datasets: [
                    {
                        label: "Fairways Hit",
                        fill: true,
                        lineTension: .3,
                        backgroundColor: "rgba(75,192,192,0.4)",
                        borderColor: "rgba(75,192,192,1)",
                        borderCapStyle: 'round',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "rgba(75,192,192,1)",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(75,192,192,1)",
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 1,
                        pointRadius: 5,
                        pointHitRadius: 10,
                        hoverBorderWidth: 3,
                        data:
                                [
                                    1, 2
                                ],
                        spanGaps: false,
                    }],
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
                        fontColor: 'rgb(255, 99, 132)'
                    }
                }
            }
        });

    })();

</script>