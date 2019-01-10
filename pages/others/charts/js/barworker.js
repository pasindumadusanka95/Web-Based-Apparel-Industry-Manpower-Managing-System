$(document).ready(function(){
    $.ajax({
        url: "http://localhost/ManpowerFinal/pages/others/charts/dataworkers.php",
        method: "GET",
        success: function (data) {
            console.log(data);
            var jobType = [];
            var workerCount = [];
            var chartColors = {
                green: 'rgb(5, 140, 16)',
                red: 'rgb(135, 1, 3)'
            };




            for (var i in data)
            {
                jobType.push( data[i].jobType);
                workerCount.push(data[i].workerCount);
            }

            var ctx = document.getElementById("mycanvas2").getContext("2d");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels:jobType,
                    datasets: [{
                        label: 'Worker Counts',
                        backgroundColor: [

                        ],
                        data: workerCount
                    }],

                },
                options: {
                    scales: {
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Job Type',
                                fontStyle: "bold",
                                fontColor: "black"

                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Worker Count',
                                fontStyle: "bold",
                                fontColor: "black"
                            }
                        }]
                    }
                }
            });

            var colorChangeValue = 50;
            var dataset = myChart.data.datasets[0];
            for (var i = 0; i < dataset.data.length; i++) {
                if (dataset.data[i] > colorChangeValue) {
                    dataset.backgroundColor[i] = chartColors.green;
                }
                else  {
                    dataset.backgroundColor[i] = chartColors.red;
                }

            }
            myChart.update();


        },
        error: function (data) {
            console.log(data);
        }


    });
});


