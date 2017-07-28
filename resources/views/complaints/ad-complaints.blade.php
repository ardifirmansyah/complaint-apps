@extends('layouts.admin')

@section('title', 'Complaints')

@section('content')
	<div class="row valign-wrapper">
		<!-- Title -->
		<div class="col l2">
			<h4>Complaints</h4>
		</div>
	</div>
	<br>
	<!-- Complaints Table -->
	<div class="row table-container">
		<table id="myTable" class="striped highlight responsive-table" >
			<thead>
			  	<tr>
					<th>No</th>
					<th>Date</th>
					<th>Name</th>
					<th>Category</th>
					<th>Priority</th>
					<th>Description</th>
					<th>Status</th>
			  	</tr>
			</thead>

			<tbody>
				@foreach($data as $getdata)
				<tr id="{{$loop->iteration}}">
			  		<div class="modal-trigger" href="#modal{{$loop->iteration}}">
			  			<td>{{$loop->iteration}}</td>
						<td>{{ Str_limit($getdata->created_at, 10,'') }}</td>
						<td>{{$getdata->User->name}}</td>
						<td>{{$getdata->kategori->nama}}</td>
						<td>

							@if($getdata->kategori->prioritas === '1')
								Low
							@elseif ($getdata->kategori->prioritas === '2')
								Mid
							@elseif ($getdata->kategori->prioritas === '3')
								High
							@endif
						</td>
						<td>{{$getdata->description}}</td>
						@if ($getdata->status == "Received")
							<td><span class="badge red darken-2 white-text"><b>New</b></span></td>
						@elseif ($getdata->status == "On Review")
							<td><span class="badge amber white-text"><b>On Review</b></span></td>
						@elseif ($getdata->status == "Answered")
							<td><span class="badge green darken-3 white-text"><b>Answered</b></span></td>
						@endif
			  		</div>
			  		<div id="modal{{$loop->iteration}}" class="modal modal-fixed-footer">
			  			<div class="modal-content">
	  						<div class="row">
	  							<div class="row valign-wrapper" >
									<div class="col l4" style="padding: 0px;">
										<h5>Complaint Message</h5>
									</div>
									<div class="col l6">
										 
									</div>
									<div class="col l2 ">
										@if ($getdata->status == "Received")
											<span class="badge red darken-2 white-text"><b>New</b></span>
										@elseif ($getdata->status == "On Review")
											<span class="badge amber white-text"><b>On Review</b></span>
										@elseif ($getdata->status == "Answered")
											<span class="badge green darken-3 white-text"><b>Answered</b></span>
										@endif
									</div>
								</div>
	  						</div>
	  						<br>
	  						<div class="row">
	  							From: {{$getdata->User->name}} | 
	  							Date: {{ Str_limit($getdata->created_at, 10,'') }} | 
  								Category: {{$getdata->kategori->nama}} |
  								Priority: {{$getdata->kategori->prioritas}}<br>
	  						</div>
	  						<br>
	  						<div class="row">
	  							<p>{{$getdata->description}}</p>
	  						</div>
	  						<br>
			  					
			  				<div class="row">
			  					@if ($getdata->status == "Answered")
			  						<h5>Answer</h5>
			  						<p>{{$getdata->answer}}</p>
			  					@else
			  						<form id="form_answer{{$getdata->id}}" action="/answer-complaint/{{$getdata->id}}" method="POST">
			  							<input type="hidden" name="_method" value="PUT">
			  							{{ csrf_field() }}
			  							<div class="input-field" style="margin-left: 0px;">
								          	<i class="material-icons prefix">mode_edit</i>
								          	<textarea id="icon_prefix2" class="materialize-textarea" name="answer"></textarea>
								          	<label for="icon_prefix2">Answer</label>
								        </div>
			  						</form>
			  					@endif
	  						</div>
			  			</div>
			  			<form id="form_on_review{{$getdata->id}}" action="/on-review/{{$getdata->id}}" method="POST">
							<input type="hidden" name="_method" value="PUT">
							{{ csrf_field() }}
						</form>

				  		<div class="modal-footer">
				  			@if ($getdata->status == "Answered")
			  					<a class="modal-action waves-effect waves-red darken-2 btn-flat disabled">
									<i class="material-icons left">reply</i>Reply
								</a>
			  				@else
					  			<a class="modal-action waves-effect waves-red darken-2 btn-flat" 
					  			onclick="event.preventDefault(); document.getElementById('form_answer{{$getdata->id}}').submit();">
									<i class="material-icons left">reply</i>Reply
								</a>
							@endif
							
							@if ($getdata->status == "Received")

				  				<a href="#!" class="waves-effect waves-light btn"
				  				onclick="event.preventDefault(); document.getElementById('form_on_review{{$getdata->id}}').submit();">On Review</a>
				  			@else
				  				<a href="#!" class="modal-action modal-close waves-effect waves-red darken-2 btn-flat disabled">On Review</a>
				  			@endif
							<a href="#!" class="modal-action modal-close waves-effect waves-red darken-2 btn-flat">
								<i class="material-icons left">close</i>Close
							</a>

						</div>
			  		</div>
			  	</tr>
			  	@endforeach
			  	<!-- <tr id="2">
			  		<div class="modal-trigger" href="#modal2">
			  			<td>2</td>
						<td>DD-MM-YYYY</td>
						<td>Nama 2</td>
						<td>Kategori 2</td>
						<td>High</td>
						<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</td>
						<td><span class="badge green darken-3 white-text"><b>Answered</b></span></td>
			  		</div>
			  		<div id="modal2" class="modal modal-fixed-footer">
			  			<div class="modal-content">
			  				<div class="row red lighten-4">
			  					<div class="col l7">
			  						<div class="row red lighten-4">
			  							<h5>Complaint Message</h5>
				  						<p>
				  						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			  						</div>
			  						
			  					</div>
			  					<div class="col l5 light-blue lighten-4">
			  						<br>
			  						<div class="row">
			  							
			  							From: User 2
			  							Date: DD-MM-YYYY<br>
		  								Category: Kategori 2<br>
		  								Priority: High<br>
				  						<span class="badge green darken-3 white-text" ><b>Answered</b></span>
			  						</div>
			  						<br>
			  						
			  						<br>
			  					</div>
			  				</div>
			  				<div class="row amber lighten-4 valign-wrapper">
			  				
	  							<div class="input-field col l7" style="margin-left: 0px;">
						          	<i class="material-icons prefix">mode_edit</i>
						          	<textarea id="icon_prefix2" class="materialize-textarea">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						          	</textarea>
						          	<label for="icon_prefix2">Answer</label>
						        </div>
						        						    
	  						</div>
			  			</div>
				  		<div class="modal-footer">
				  			<a class="modal-action modal-close waves-effect waves-red darken-2 btn-flat disabled" type="submit" name="action">
								<i class="material-icons left">reply</i>Reply
							</a>
				  			<a class="modal-action modal-close waves-effect waves-red darken-2 btn-flat disabled">On Review</a>
							<a href="#!" class="modal-action modal-close waves-effect waves-red darken-2 btn-flat">
								<i class="material-icons left">close</i>Close
							</a>
						</div>
			  		</div>
			  	</tr>
			  	<tr id="3">
			  		<div class="modal-trigger" href="#modal3">
			  			<td>3</td>
						<td>DD-MM-YYYY</td>
						<td>Nama 2</td>
						<td>Kategori 3</td>
						<td>High</td>
						<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</td>
						<td><span class="badge amber white-text"><b>On Review</b></span></td>
			  		</div>
			  		<div id="modal3" class="modal modal-fixed-footer">
			  			<div class="modal-content">
			  				<div class="row red lighten-4">
			  					<div class="col l7">
			  						<div class="row red lighten-4">
			  							<h5>Complaint Message</h5>
				  						<p>
				  						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			  						</div>
			  						
			  					</div>
			  					<div class="col l5 light-blue lighten-4">
			  						<br>
			  						<div class="row">
			  							
			  							From: User 1
			  							Date: DD-MM-YYYY<br>
		  								Category: Kategori 3<br>
		  								Priority: High<br>
				  						<span class="badge amber white-text" ><b>On Review</b></span>
			  						</div>
			  						<br>
			  						
			  						<br>
			  					</div>
			  				</div>
			  				<div class="row amber lighten-4 valign-wrapper">
	  							<div class="input-field col l7" style="margin-left: 0px;">
						          	<i class="material-icons prefix">mode_edit</i>
						          	<textarea id="icon_prefix2" class="materialize-textarea"></textarea>
						          	<label for="icon_prefix2">Answer</label>
						        </div>
						        
	  						</div>
			  			</div>
				  		<div class="modal-footer">
				  			<a class="modal-action modal-close waves-effect waves-red darken-2 btn-flat" type="submit" name="action">
								<i class="material-icons left">reply</i>Reply
							</a>
							<a class="modal-action modal-close waves-effect waves-red darken-2 btn-flat disabled">On Review</a>
							<a href="#!" class="modal-action modal-close waves-effect waves-red darken-2 btn-flat">
								<i class="material-icons left">close</i>Close
							</a>
						</div>
			  		</div>
			  	</tr> -->
			</tbody>
		</table>
	</div>

	

@endsection


<!-- <!DOCTYPE html>
<html>
<head> -->
	<!--Import Google Icon Font-->
	<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
	<!--Import materialize.css-->
	<!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/> -->

	<!--Let browser know website is optimized for mobile-->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Complaints</title>
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
		<!-- <div class="col s12 m4 l2" style="padding: 0px;">
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
		<!-- <div class="col s12 m8 l10" style="height: 90vh;">
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

		        <tbody>
				@foreach($data as $getdataAd)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{Str_limit($getdataAd->created_at,10,'')}}</td>
						<td>{{$getdataAd->kategori->nama}}</td>
						<td>{{$getdataAd->description}}</td>
						<td>{{$getdataAd->status}}</td>
					</tr>
				@endforeach
		        </tbody>
		    </table>
		</div>
	</div> -->

	<!--Import jQuery before materialize.js-->
	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html> -->