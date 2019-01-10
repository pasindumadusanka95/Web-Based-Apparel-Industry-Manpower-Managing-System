$(document).ready(function(){
    $.ajax({
        url: "http://localhost/chartjs/data.php",
        method: "GET",
        success: function (data) {
            console.log(data);
            var jobType = [];
            var jobCount = [];
			
			var colors = "green";
            

            for (var i in data) {
                jobType.push( data[i].jobType);
                jobCount.push(data[i].jobCount);
				
				
				
            }

            var chartdata = {
                labels: jobType,
                datasets: [
                    {
                        label: 'Job Progress',
                        backgroundColor: 'rgba(jobType,51,204,0,0.2)',
                        borderColor: 'rgba(200,200,200,0.75)',
                        hoverBackgroundColor: 'rgba(200,200,200,1)',
                        hoverBorderColor: 'rgba(200,200,200,1)',
                        data: jobCount 
						
                    }
                ]

            };

            var ctx= $("#mycanvas");

            var barGraph= new Chart(ctx,{
                type: 'bar',
                data: chartdata
                });

},
    error: function (data) {
        console.log(data);
    }


    });
});