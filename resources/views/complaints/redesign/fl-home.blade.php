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
				<form>
					<div class="modal-content">
						<h4>New Complaint</h4>
						<div class="row">
							<div class="input-field col s12">
								<select>
									<option value="" disabled selected>Choose your option</option>
									<option value="1">Category 1</option>
									<option value="2">Category 2</option>
									<option value="3">Category 3</option>
								</select>
								<label>Category</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
							  	<textarea id="icon_prefix2" class="materialize-textarea"></textarea>
							  	<label for="icon_prefix2">Message</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<a href="#!" class="modal-action modal-close waves-effect waves-red darken-2 btn-flat">
							<i class="material-icons left">cancel</i>Cancel
						</a>
						<a href="#!" class="modal-action modal-close waves-effect waves-red darken-2 btn-flat" type="submit" name="action">
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
			  	<tr id="1">
			  		<div class="modal-trigger" href="#complaint1">
			  			<td>1</td>
						<td>DD-MM-YYYY</td>
						<td>Kategori 1</td>
						<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</td>
						<td><span class="badge green darken-3 white-text"><b>Answered</b></span></td>
			  		</div>
			  		<div id="complaint1" class="modal modal-fixed-footer">
			  			<div class="modal-content">
			  				<div class="row red lighten-4">
			  					<div class="col l7 ">
			  						<h5>Complaint Message</h5>
			  						<p>
			  						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			  					</div>
			  					<div class="col l5 amber lighten-4">
			  						Date: DD-MM-YYYY<br>
	  								Category: Kategori 1<br>
			  						<span class="badge green darken-3 white-text" ><b>Answered</b></span>
			  					</div>
			  				</div>
			  				<div class="row">
			  					<div class="col l12 light-blue lighten-4">
			  						<div class="row">
			  							<div class="col l7">
			  								<h5>Answer</h5>
					  						<p>
					  						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>			
			  							</div>
			  							
			  						</div>
			  						
			  					</div>
			  					
			  				</div>
			  			</div>
				  		<div class="modal-footer">
				  			<a class="waves-effect waves-light btn disabled">Send Follow Up</a>
							<a href="#!" class="modal-action modal-close waves-effect waves-red darken-2 btn-flat">
								<i class="material-icons left">close</i>Close
							</a>
							
						</div>
			  		</div>
			  	</tr>
			  	<tr id="2">
			  		<div class="modal-trigger" href="#complaint2">
			  			<td>2</td>
						<td>DD-MM-YYYY</td>
						<td>Kategori 2</td>
						<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</td>
						<td><span class="badge amber white-text"><b>On Review</b></span></td>
			  		</div>
			  		<div id="complaint2" class="modal modal-fixed-footer">
			  			<div class="modal-content">
			  				<div class="row red lighten-4">
			  					<div class="col l7 ">
			  						<h5>Complaint Message</h5>
			  						<p>
			  						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			  					</div>
			  					<div class="col l5 amber lighten-4">
			  						Date: DD-MM-YYYY<br>
				  						Category: Kategori 2<br>
				  						<span class="badge amber white-text"><b>On Review</b>
			  						
			  					</div>
			  				</div>
			  				<div class="row">
			  					<div class="col l12 light-blue lighten-4">
			  						<div class="row ">
			  							<div class="col l7">
			  								<h5>Answer</h5>
					  						<p>
					  						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			  							</div>
			  							
			  						</div>
			  						
			  					</div>
			  					
			  				</div>
			  			</div>
				  		<div class="modal-footer">
				  			<a class="modal-action modal-close waves-effect waves-red darken-2 btn-flat">Send Follow Up</a>
							<a href="#!" class="modal-action modal-close waves-effect waves-red darken-2 btn-flat">
								<i class="material-icons left">close</i>Close
							</a>
							
						</div>
			  		</div>
			  	</tr>
			  	<tr id="3">
			  		<div class="modal-trigger" href="#complaint3">
			  			<td>3</td>
						<td>DD-MM-YYYY</td>
						<td>Kategori 3</td>
						<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</td>
						<td><span class="badge red darken-2 white-text"><b>Received</b></span></td>
			  		</div>
			  		<div id="complaint3" class="modal modal-fixed-footer">
			  			<div class="modal-content">
			  				<div class="row red lighten-4">
			  					<div class="col l7 ">
			  						<h5>Complaint Message</h5>
			  						<p>
			  						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			  					</div>
			  					<div class="col l5 amber lighten-4">
			  						Date: DD-MM-YYYY<br>
			  						Category: Kategori 3<br>
			  						<span class="badge red darken-2 white-text"><b>Received</b></span>
			  						
			  					</div>
			  				</div>
			  				<div class="row">
			  					<div class="col l12 light-blue lighten-4">
			  						<div class="row">
			  							<div class="col l7">
			  								<h5>Answer</h5>
					  						<p>
					  						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			  							</div>
			  							
			  						</div>
			  						
			  					</div>
			  					
			  				</div>
			  			</div>
				  		<div class="modal-footer">
				  			<a class="modal-action modal-close waves-effect waves-red darken-2 btn-flat">Send Follow Up</a>
							<a href="#!" class="modal-action modal-close waves-effect waves-red darken-2 btn-flat">
								<i class="material-icons left">close</i>Close
							</a>
							
						</div>
			  		</div>
			  	</tr>
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
			console.log(id);
			$(id).modal('open');
		});

		//dropdown
		$(document).ready(function() {
			$('select').material_select();
		});
	</script>
</body>
</html>