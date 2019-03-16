$(document).ready(function(){
  $.ajax({
    url : "./sales_data.php",
    type : "GET",
    dataType: "json",
    success : function(data){
      console.log(data);

      var brownie = [];
      var cookie = [];
      var muffin = [];
      var bananaBread = [];
      var timestamp = [];

      for(var i in data) {
        var bread = data[i].bread;
	switch(bread) {
		case 'brownie':
			brownie.push(bread);
			break;
		case 'cookie':
			cookie.push(bread);
			break;
		case 'muffin':
			muffin.push(bread);
			break;
		case 'bananabread':
			bananaBread.push(bread);
			break;
		default:
			break;
	}
        //bread.push("Bread " + data[i].bread);
        timestamp.push(data[i].timestamp);
      }

	    for(var i in brownie) {
		    console.log(brownie[i]);
	    }
/*
      var chartdata = {
        labels: bread,
        datasets: [
          {
            label: "",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(59, 89, 152, 0.75)",
            borderColor: "rgba(59, 89, 152, 1)",
            pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
            pointHoverBorderColor: "rgba(59, 89, 152, 1)",
            data: facebook_follower
          },
          {
            label: "twitter",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(29, 202, 255, 0.75)",
            borderColor: "rgba(29, 202, 255, 1)",
            pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
            pointHoverBorderColor: "rgba(29, 202, 255, 1)",
            data: twitter_follower
          },
          {
            label: "googleplus",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(211, 72, 54, 0.75)",
            borderColor: "rgba(211, 72, 54, 1)",
            pointHoverBackgroundColor: "rgba(211, 72, 54, 1)",
            pointHoverBorderColor: "rgba(211, 72, 54, 1)",
            data: googleplus_follower
          }
        ]
      };

      var ctx = $("#mycanvas");

      var LineGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata
      });
    },
    error : function(data) {
*/
    }
  });
});
