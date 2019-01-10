 $(document).ready(function(){
    $.ajax({
        url: "http://localhost/GroupProject/ManPowerFinal/data.php",
        method: "GET",
        success: function (data) {
            console.log(data);
            var jobType = [];
            var jobCount = [];
			var chartColors = {
            green: 'rgb(70, 214, 8)',
            red: 'rgb(242, 26, 2)'
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
    }],
  }
});

var colorChangeValue = 500; 
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


