<!DOCTYPE html>
<html>
<head>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>New Complaint</title>
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
			<h4>New Complaint</h4>
			<form method = "POST" action="/save" >
				{{csrf_field()}}
				<div class="row">
					<div class="input-field col s12">
					    <select name="catagory_id" id="kategori_id">
					      	<option value="" disabled selected>Choose your option</option>
							@foreach($kategoris as $kategori)
					      	<option value="{{$kategori->id}}">{{$kategori->nama}}</option>
					      	@endforeach
					    </select>
					    <label>Category</label>
					</div>
				</div>
				<div class="row">
			        <div class="input-field col s12">
			          <textarea id="icon_prefix2" class="materialize-textarea" name="description"></textarea>
			          <label for="icon_prefix2">Description</label>
			        </div>
			    </div>
				<button class="btn waves-effect waves-light blue-grey darken-3" style="float:right" type="submit" name="action">
					<i class="material-icons left">send</i>Send
				</button>
				{{--<button class="btn waves-effect waves-light blue-grey darken-3" style="float:right; margin-right: 10px;" >--}}
					{{--<i class="material-icons left">cancel</i>Cancel--}}
				{{--</button>--}}
			</form>
		</div>
	</div>

	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script>
		$(document).ready(function() {
		    $('select').material_select();
		});
	</script>
</body>
</html>