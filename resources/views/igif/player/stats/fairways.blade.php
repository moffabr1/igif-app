@extends('layouts.dashboard')
@section('page_heading','Driving Accuracy')
@section('section')

<style>
    canvas{
        width: 100% !important;
        max-width: 800px;
        height: auto !important;
    }
</style>

<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Fairways Hit per Round
                </div>
                <div class="panel-body">
                    <div style="max-width:400px; margin:0 auto;">
                        <canvas id="fairways_hit" width="800" height="400"></canvas>
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

    {{--new row--}}

    <div class="row">
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
        var ctx2 = document.getElementById("fairways_hit");
        var chart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($dates) ?>,
                datasets: [{
                    data:
                            [
                                {{implode(", ", $fw_hit)}}
                            ],
                    label: '(10 rounds max)',
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



@stop
