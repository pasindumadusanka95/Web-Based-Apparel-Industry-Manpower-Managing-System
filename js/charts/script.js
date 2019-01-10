$(document).ready(function(){
    $.ajax({
        url: "http://localhost/chartjs/data.php",
        method: "GET",
        success: function (data) {
            console.log(data);
            var jobType = [];
            var jobCount = [];
			
			
            

            for (var i in data) 
			{
                jobType.push( data[i].jobType);
                jobCount.push(data[i].jobCount);
			}
			
			
 $('#fillChart').click(function(){
   
 //var bars = myObjBar.datasets[0];
    for(i=0;i<jobCount.length;i++){
       var color="green";
       //You can check for bars[i].value and put your conditions here
       if(jobCount[i].value<800){
       	color="red";
       }
       else if(jobCount[i].value>1000){
       	color="orange"
       
       }
      
       else{
       	color="green"
       }
       
      jobCount[i].fillColor = color;

    }
   barGraph.update(); //update the cahrt

  });
  
         var chartdata = {
                labels: jobType,
                datasets: [
                    {
                        label: 'Job Progress',
                        backgroundColor:[],
                        borderColor:'black',
                        borderWidth: 1,
                        data: jobCount
						
                    }
                ]

            };

            var ctx= $("#mycanvas");

            var barGraph= new Chart(ctx,{
                type: 'bar',
				 responsive : true,
                data: chartdata
                });

},
    error: function (data) {
        console.log(data);
    }


    });
});