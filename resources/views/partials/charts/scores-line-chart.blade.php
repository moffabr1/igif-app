<script>
    (function() {
        var ctx = document.getElementById("player-score-history");
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo $dates ?>,
                datasets: [{
                    data:{{ $scores }},
                    label: '({{$number_of_rounds}} rounds max)',
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