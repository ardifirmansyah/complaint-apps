<!DOCTYPE html>
<html>
<head>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Home</title>
</head>

<body>
	<nav>
		<div class="nav-wrapper blue-grey darken-4">
			<a href="#" class="brand-logo right">Logo</a>
			<!--
			<ul id="nav-mobile" class="left hide-on-med-and-down">
				 <li><a href="#">Sass</a></li>
				
			</ul>-->
			
		</div>
	</nav>

	<div class="row" style="margin-bottom: 0px;">
		<!-- Sidebar  -->
		<div class="col s12 m4 l2 " style="padding: 0px;">
			<ul class="collapsible " style="margin:0px; height: 90vh;" data-collapsible="accordion">
				<li>
			    	<div class="row valign-wrapper blue-grey darken-1" style="padding: 20px 0px 20px 0px; ">
			            <div class="col s4">
			              <img src="img/user.jpg" class="circle responsive-img"> <!-- notice the "circle" class -->
			            </div>
			            <div class="col s8">
			              <span class="white-text">
			                Username
			              </span>
			            </div>
			        </div>
			    </li>
				<li>
					<a class="collapsible-header" href="{{route('homefl')}}">Home</a>
				</li>
				<li>
					<a class="collapsible-header" href="{{route('newcomplaint')}}">Complaint</a>
				</li>
				
				<li>
					<a class="collapsible-header" href="{{ route('logout') }}"
					   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
						Logout
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" >
						{{ csrf_field() }}
					</form>
				</li>
			</ul>
		</div>
		<!-- Content -->
		<div class="col s12 m8 l10 blue-grey lighten-5" style="height: 90vh;">
			<h4>All Complaints</h4>
			<table class="highlight">
		        <thead>
		          	<tr>
		              	<th>No</th>
		              	<th>Date</th>
		              	<th>Category</th>
		              	<th>Description</th>
		              	<th>Status</th>
		          	</tr>
		        </thead>

		        <body>
				@foreach($data as $getdata)
		          	<tr>
		            	<td>{{$loop->iteration}}</td>
		            	<td>{{ Str_limit($getdata->created_at, 10,'') }}</td>
		            	<td>{{$getdata->kategori->nama}}</td>
		            	<td>{{$getdata->description}}</td>
		            	<td>{{$getdata->status}}</td>
		          	</tr>
				@endforeach
		        </body>
		    </table>
		</div>
	</div>

	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>