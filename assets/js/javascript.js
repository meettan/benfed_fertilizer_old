


	var openBtn = document.querySelector('.onClickOpen');
	var accordianConten = document.querySelector('.accordianConten');
	// var accoNotShow = document.querySelector('.accoNotShow');
	// var accoShow = document.querySelector('.accoShow');

	openBtn.onclick = function(){

	if (accordianConten.style.transform === "scaleY(0)") {
		accordianConten.style.transform = "scaleY(1)";
		
		accordianConten.style.height = "auto";
	} else {
		accordianConten.style.transform = "scaleY(0)";
		
		setTimeout(close, 600);
		function close(){
		accordianConten.style.height = "0px";
		}
	}

	}
	

	//bar
	var barChartId = document.getElementById("barChart");
if(barChartId){
var ctxB = document.getElementById("barChart").getContext('2d');
var myBarChart = new Chart(ctxB, {
type: 'bar',
data: {
labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
datasets: [{
label: '# of Votes',
data: [12, 19, 3, 5, 20, 3, 5, 12, 19, 3, 5, 2],
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)',
'rgba(245, 86, 82, 0.2)',
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)',
'rgba(245, 86, 82, 1)',
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});
}

var barChartBottomId = document.getElementById("barChartBottom");
if(barChartBottomId){
var ctxC = document.getElementById("barChartBottom").getContext('2d');

var myBarChartBot = new Chart(ctxC, {
	type: 'bar',
	data: {
		labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
		datasets: [{
		label: '# of Votes',
		data: [12, 19, 3, 5, 20, 3, 5, 12, 19, 3, 5, 2],
		backgroundColor: [
		'rgba(255, 99, 132, 0.2)',
		'rgba(54, 162, 235, 0.2)',
		'rgba(255, 206, 86, 0.2)',
		'rgba(75, 192, 192, 0.2)',
		'rgba(153, 102, 255, 0.2)',
		'rgba(255, 159, 64, 0.2)',
		'rgba(245, 86, 82, 0.2)',
		'rgba(255, 99, 132, 0.2)',
		'rgba(54, 162, 235, 0.2)',
		'rgba(255, 206, 86, 0.2)',
		'rgba(75, 192, 192, 0.2)',
		'rgba(153, 102, 255, 0.2)'
		],
		borderColor: [
		'rgba(255,99,132,1)',
		'rgba(54, 162, 235, 1)',
		'rgba(255, 206, 86, 1)',
		'rgba(75, 192, 192, 1)',
		'rgba(153, 102, 255, 1)',
		'rgba(255, 159, 64, 1)',
		'rgba(245, 86, 82, 1)',
		'rgba(255,99,132,1)',
		'rgba(54, 162, 235, 1)',
		'rgba(255, 206, 86, 1)',
		'rgba(75, 192, 192, 1)',
		'rgba(153, 102, 255, 1)',
		'rgba(255, 159, 64, 1)'
		],
	borderWidth: 1
	}]
	},
	options: {
	scales: {
	yAxes: [{
	ticks: {
	beginAtZero: true
	}
	}]
	}
	}
	});
}

var pieChartId = document.getElementById("pieChart");

if(pieChartId){
	var ctxP = document.getElementById("pieChart").getContext('2d');
	
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        //labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true
      }
    });
}
	
















