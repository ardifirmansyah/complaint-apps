<!-- <!DOCTYPE html>
<html>
<head> -->
	<!--Import Google Icon Font--><!-- 
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
	<!--Import materialize.css--><!-- 
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/> -->

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
			    	<div class="row valign-wrapper blue-grey darken-1" style="padding: 20px 0px 20px 0px; ">
			            <div class="col s4">
			              <img src="img/user.jpg" class="circle responsive-img"> <!-- notice the "circle" class -->
			  <!--           </div>
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
		</div> -->
		<!-- Content -->
		<!-- <div class="col s12 m8 l10 blue-grey lighten-5" style="height: 90vh;">
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
	</div>-->

	<!--Import jQuery before materialize.js-->
<!-- 	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>  -->
<!DOCTYPE html>
<html> 
<head>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="css/collab.css"  media="screen,projection">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Home</title>
</head>

<body>
	<nav>
		<div class="nav-wrapper white">
			<a href="{{route('homefl')}}" class="brand-logo"><img class="responsive-img logo" src="img/collab.png"></a>
			
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				<li>
					<a class="black-text" href="{{ route('logout') }}" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">Logout</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" >
							{{ csrf_field() }}
					</form>
				</li>
			</ul>
			<ul class="side-nav" id="mobile-demo">
				<li>
					<a href="{{ route('logout') }}" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">Logout</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" >
							{{ csrf_field() }}
					</form>
				</li>
			</ul>
		</div>
	</nav>
	<div class="row valign-wrapper">
		<!-- Title -->
		<div class="col l2">
			<h4>Complaints</h4>
		</div>
		<!-- Button new -->
		<div class="col l2 ">
			<!-- Modal Trigger -->
			<a class="waves-effect waves-light btn modal-trigger" href="#add_complaint"><i class="material-icons left">add</i>New</a>

			<!-- Modal Structure -->
			<div id="add_complaint" class="modal modal-fixed-footer">
				<form id="input_komplain" action="/save" method="POST">
					<div class="modal-content">
						<h4>New Complaint</h4>
						<div class="row">
							<div class="input-field col s12">
								<select id="kategori_id" name="catagory_id">
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
							  	<textarea id="pesan" class="materialize-textarea" name="description"></textarea>
							  	<label for="pesan">Message</label>
							</div>
						</div>
					</div>
					<input type="hidden" name="_token" value="{!! csrf_token() !!}">

					<div class="modal-footer">
						<a href="#!" class="modal-action modal-close waves-effect waves-red darken-2 btn-flat">
							<i class="material-icons left">cancel</i>Cancel
						</a>
						<a href="#!" class="modal-action waves-effect waves-red darken-2 btn-flat" type="submit" id="btnSubmit">
							<i class="material-icons left">send</i>Send
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Complaints Table -->
	<div class="row table-container">
		<table class="striped highlight responsive-table">
			<thead>
			  	<tr>
					<th>No</th>
					<th>Date</th>
					<th>Category</th>
					<th>Description</th>
					<th>Status</th>
			  	</tr>
			</thead>

			<tbody>
				@foreach($data as $getdata)
			  	<tr id="{{$loop->iteration}}">
			  		<div class="modal-trigger" href="#complaint{{$loop->iteration}}">
			  			<td>{{$loop->iteration}}</td>
						<td>{{ Str_limit($getdata->created_at, 10,'') }}</td>
						<td>{{$getdata->kategori->nama}}</td>
						<td>{{$getdata->description}}</td>
						@if ($getdata->status == "Received")
							<td><span class="badge red darken-2 white-text"><b>Received</b></span></td>
						@elseif ($getdata->status == "On Review")
							<td><span class="badge amber white-text"><b>On Review</b></span></td>
						@elseif ($getdata->status == "Answered")
							<td><span class="badge green darken-3 white-text"><b>Answered</b></span></td>
						@endif
			  		</div>
			  		<div id="complaint{{$loop->iteration}}" class="modal modal-fixed-footer">
			  			<div class="modal-content">
			  				<div class="row valign-wrapper" >
								<div class="col l4" style="padding: 0px;">
									<h5>Complaint Message</h5>
								</div>
								<div class="col l6">
									
								</div>
								<div class="col l2 ">
									@if ($getdata->status == "Received")
										<span class="badge red darken-2 white-text"><b>Received</b></span>
									@elseif ($getdata->status == "On Review")
										<span class="badge amber white-text"><b>On Review</b></span>
									@elseif ($getdata->status == "Answered")
										<span class="badge green darken-3 white-text"><b>Answered</b></span>
									@endif
								</div>
							</div>
							<br>
							<div class="row">
								Date: {{ Str_limit($getdata->created_at, 10,'') }} | Category: {{$getdata->kategori->nama}}
							</div>
							<br>
			  				<div class="row">
			  					<p>{{$getdata->description}}</p>
			  				</div>
			  				<div class="row">
  								<h5>Answer</h5>
		  						@if ($getdata->status == "Answered")
			  						<p>{{$getdata->answer}}</p>
			  					@else
			  						<p>-</p>
			  					@endif					
			  				</div>
			  			</div>
				  		<div class="modal-footer">
				  			
							<form action="/follow-up/{{$getdata->id}}" method="POST" >
								<input type="hidden" name="_method" value="PUT">
								{{ csrf_field() }}
							</form>

				  			@if ($getdata->status == "Answered")
		  						<a class="waves-effect waves-light btn disabled">Send Follow Up</a>
		  					@else
		  						<a class="waves-effect waves-light btn" id="btnFollowUp" 
							   onclick="event.preventDefault();
		                                                     document.getElementById('formFollowUp').submit();">Send Follow Up</a>
		  					@endif
				  			
							<a href="#!" class="modal-action modal-close waves-effect waves-red darken-2 btn-flat">
								<i class="material-icons left">close</i>Close
							</a>
							
						</div>
			  		</div>
			  	</tr>
			  	@endforeach
			</tbody>
		</table>
	</div>
	

	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script>
		//navbar
		$(".button-collapse").sideNav();

		//modal
		$(document).ready(function(){
			// the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
			$('.modal').modal();
		});

		$('tr').click(function(){
			var id = '#complaint'+this.id;
			
			$(id).modal('open');
		});

		//dropdown
		$(document).ready(function() {
			$('select').material_select();
		});

		$(document).ready(function() {
			$('#btnSubmit').on('click', function() {
        		$("#input_komplain").submit();
    		});
		});

	</script>
</body>
</html>