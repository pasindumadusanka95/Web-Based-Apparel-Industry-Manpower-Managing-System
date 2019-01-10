 $(document).ready(function(){
    $.ajax({
        url: "http://localhost/ManpowerFinal/pages/others/charts/datareports.php",
        method: "GET",
        success: function (data) {
            console.log(data);
            var jobType = [];
            var jobCount = [];
			var chartColors = {
            green: 'rgb(5, 140, 16)',
            red: 'rgb(135, 1, 3)'
           };
			
			
            

            for (var i in data) 
			{
                jobType.push( data[i].jobType);
                jobCount.push(data[i].jobCount);
			}
			
		var ctx = document.getElementById("mycanvas").getContext("2d");
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels:jobType,
    datasets: [{
      label: 'Job Progress',
      backgroundColor: [

      ],
      data: jobCount 
    }]},
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
                      labelString: 'Job Count',
                      fontStyle: "bold",
                      fontColor: "black"
                  }
              }]
          }
      }
  });


var colorChangeValue = 850;
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


