<!-- <!DOCTYPE html>
<html>
<head> -->
	<!--Import Google Icon Font-->
	<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
	<!--Import materialize.css-->
	<!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/> -->

	<!--Let browser know website is optimized for mobile-->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Home</title>
</head>

<body>
	<nav>
		<div class="nav-wrapper blue-grey darken-4">
			<a href="#" class="brand-logo right">Logo</a> -->
			<!--
			<ul id="nav-mobile" class="left hide-on-med-and-down">
				 <li><a href="#">Sass</a></li>
				
			</ul>-->
			
		<!-- </div>
	</nav>

	<div class="row" style="margin-bottom: 0px;"> -->
		<!-- Sidebar  -->
		<!-- <div class="col s12 m4 l2 " style="padding: 0px;">
			<ul class="collapsible " style="margin:0px; height: 90vh;" data-collapsible="accordion">
				<li>
					<a class="collapsible-header" href="{{route('homeadmin')}}">Home</a>
				</li>
				<li>
					<a class="collapsible-header" href="{{route('statistic')}}">Statistic</a>
				</li>
				<li>
					<a class="collapsible-header" href="{{route('viewcomplaint')}}">Complaint</a>
				</li>
				<li>
					<a class="collapsible-header" href="#">Categories<i class="material-icons right">keyboard_arrow_down</i></a>
					<div class="collapsible-body" style="padding: 1rem 1rem 1rem 2rem;">
						<a href="{{route('createkategori')}}"><i class="material-icons">add_circle_outline</i>New Category</a>
					</div>
					<div class="collapsible-body" style="padding: 1rem 1rem 1rem 2rem;">
						<a href="{{route('editkategori')}}"><i class="material-icons">create</i>Edit Category</a>
					</div>
				</li>
				<li>
					<a class="collapsible-header" href="{{ route('logout') }}"
					   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
						Logout
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" >
						{{ csrf_field() }}
					</form>
				</li>
			</ul>
		</div> -->
		<!-- Content -->
		<!-- <div class="col s12 m8 l10 blue-grey lighten-5" style="height: 90vh;">
		
		</div>
	</div> -->

	<!--Import jQuery before materialize.js-->
	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html> -->


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
		      	<option value="1" selected>Month</option>
		      	<option value="2">Year</option>
		      	<option value="3">Week</option>
		    </select>
		    <label>Filter by</label>
		</div>
	</div>
	

	<div class="row">
		<div class="col s12 l3"></div>
		<div class="col s12 l2  jumlah">
			<div class="row counter-text">{{ $newcomplaint }}</div>
			<div class="row red darken-2 white-text">New Complaints</div>
		</div>	
		<div class="col s12 l2  jumlah">
			<div class="row counter-text">{{ $onreview }}</div>
			<div class="row amber white-text">On Review Complaints</div>
		</div>	
		<div class="col s12 l2  jumlah">
			<div class="row counter-text">{{ $answered }}</div>
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
