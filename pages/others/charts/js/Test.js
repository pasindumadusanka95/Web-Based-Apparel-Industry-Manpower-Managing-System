 $(document).ready(function(){
    $.ajax({
        url: "http://localhost/ManpowerFinal/pages/others/charts/CompanySeletion.php",
        method: "GET",
        success: function (data) {
            console.log(data);
            var jobType = [];
            var jobCount = [];
			var jobCounttwo= [];
			var comName=[];
			var chartColors = {
            green: 'rgb(70, 214, 8)',
            red: 'rgb(242, 26, 2)'
           };
			
			
            

            for (var i in data) 
			{
				if(data[i].comName=="Srinath") {
                   
                    if (data[i].jobCount>0) {
                        jobCounttwo.push(data[i].jobCount);
                        comName.push(data[i].comName);
                    }
                    else{
                        jobCounttwo.push(0);
                        comName.push(data[i].comName);
                    }
                }
					

				else{


                jobType.push( data[i].jobType);
                jobCount.push(data[i].jobCount);
				comName.push(data[i].comName);
			}
			}
			
	
var ctx = document.getElementById("mycanvas3").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: jobType,
        datasets: [{
            label: comName[0],
            data:jobCount,
            backgroundColor:"blue",
            borderColor: [],
            borderWidth: 1
			
        },
		{
            label: comName[1],
            data: jobCounttwo,
            backgroundColor:"purple",
            borderColor: [],
            borderWidth: 1
        }
		
		
		]
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
            labelString: 'Job Count',
			fontStyle: "bold",
            fontColor: "black"
          }
            }]
        }
    }
});

var colorChangeValue = 1; 
var dataset = myChart.data.datasets[0];
var dataset = myChart.data.datasets[1];
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


