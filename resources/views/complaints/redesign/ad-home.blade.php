
@extends('layouts.admin')

@section('title', 'Home')

@section('content')

	<div class="chart-container">
		<canvas id="chart"></canvas>
	</div>
	<div class="row">
		<div class="col l5"></div>
		<div class="input-field col l2">
		    <select>
		      	<option value="1" selected>Filter 1</option>
		      	<option value="2">Filter 2</option>
		      	<option value="3">Filter 3</option>
		    </select>
		    <label>Filter by</label>
		</div>
	</div>
	

	<div class="row">
		<div class="col s12 l3"></div>
		<div class="col s12 l2  jumlah">
			<div class="row counter-text">68</div>
			<div class="row red darken-2 white-text">New Complaints</div>
		</div>	
		<div class="col s12 l2  jumlah">
			<div class="row counter-text">80</div>
			<div class="row amber white-text">On Review Complaints</div>
		</div>	
		<div class="col s12 l2  jumlah">
			<div class="row counter-text">109</div>
			<div class="row green darken-3 white-text">Answered Complaints</div>
		</div>	
	</div>

	<script src="js/Chart.bundle.min.js"></script>
	<script>
	var ctx = document.getElementById('chart').getContext('2d');

	var vlabels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"];
	var vdata = [0, 10, 5, 2, 20, 30, 45];
	var chart = new Chart(ctx, {
	    // The type of chart we want to create
	    type: 'line',

	    // The data for our dataset
	    data: {
	        labels: vlabels,
	        datasets: [{
	            label: "Total Complaints",
	            data: vdata,
	            backgroundColor: 'rgba(255, 255, 255, 0)',
	            borderColor: 'rgb(255, 99, 132)',
	            lineTension: 0,
	        }]
	    },

	    // Configuration options go here
	    options: {
	    	legend: {
	            display: true,
	            labels: {
	                fontColor: 'rgb(255, 99, 132)'
	            }
	        },

	    }
	});

	
	var vlabels = ["2016","2017"];
	var vdata = [40,50];

	</script>

@endsection
	