<!DOCTYPE html>
<html>
<head>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>View Complaint</title>
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
		</div>
		<!-- Content -->
		<div class="col s12 m8 l10 blue-grey lighten-5" style="height: 90vh;">
			<h4>Complaint</h4>
			<div class="row blue-grey lighten-3" style="padding: 20px; margin-bottom: 0px;">
				<h5>Username <small>dd-mm-yyyy</small></h5>
				<p style="padding: 10px;">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
			<div class="row" style="padding: 20px; margin-bottom: 0px; border: 1px solid #b0bec5;">
			    <form class="col s12">
				    <div class="row">
				        <div class="input-field col s12">
				          <i class="material-icons prefix">mode_edit</i>
				          <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
				          <label for="icon_prefix2">Message</label>
				        </div>
				    </div>
			      	<button class="btn waves-effect waves-light blue-grey darken-3" style="float:right" type="submit" name="action">
						<i class="material-icons left">reply</i>Reply
					</button>
					<button class="btn waves-effect waves-light blue-grey darken-3" style="float:right; margin-right: 10px;" >
						<i class="material-icons left">cancel</i>Cancel
					</button>
			    </form>
			</div>
		</div>
	</div>

	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>