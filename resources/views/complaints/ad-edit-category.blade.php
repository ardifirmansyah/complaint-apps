@extends('layouts.admin')

@section('title', 'Category')

@section('content')
<div class="row valign-wrapper">	
	<div class="col l2">
		<h4>Categories</h4>
	</div>
	<!-- Button new -->
	<div class="col l2 ">
		<!-- Modal Trigger -->
		<a class="waves-effect waves-light btn modal-trigger" href="#add_complaint"><i class="material-icons left">add</i>New</a>

		<!-- Modal Structure -->
		<div id="add_complaint" class="modal modal-fixed-footer">
			
				<div class="modal-content">
					<h4>New Category</h4>
					<form id="add_category" method="POST" action="/store-kategori">
						{{csrf_field()}}
						<div class="row">
							<div class="input-field col s12">
								<input id="category" type="text" name="nama" class="validate">
								<label for="category">Name of Category</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
							    <select name="prioritas">
							      	<option value="" disabled selected>Choose your option</option>
							      	<option value="1">Low</option>
							      	<option value="2">Mid</option>
							      	<option value="3">High</option>
							    </select>
							    <label>Priority</label>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<a href="#!" class="modal-action modal-close waves-effect waves-red darken-2 btn-flat">
						<i class="material-icons left">cancel</i>Cancel
					</a>
					<a href="#!" class="modal-action modal-close waves-effect waves-red darken-2 btn-flat"
					onclick="event.preventDefault(); document.getElementById('add_category').submit();">
						<i class="material-icons left">add</i>Add
					</a>
				</div>
			
		</div>
	</div>
</div>
	<ul class="collapsible" data-collapsible="accordion">
	    <li>
	      	<div class="row collapsible-header white black-text">
	      		<div class="col l1 ">No</div>
	      		<div class="col l8">Name</div>
	      		<div class="col l3">Prioritas</div>
	      	</div>
	    </li>
		@foreach($kategoris as $kategori)
	    <li>

	      	<div class="row collapsible-header">
	      		<div class="col l1">{{$loop->iteration}}</div>
				{{--@foreach($kategoris as $kategori)--}}
	      		<div class="col l8">{{$kategori->nama}}</div>
	      		@if ($kategori->prioritas == 1)
	      			<div class="col l3">Low</div>
	      		@elseif ($kategori->prioritas == 2)
	      			<div class="col l3">Mid</div>
	      		@else 
	      			<div class="col l3">High</div>
	      		@endif
	      	</div>
	      	<div class="row collapsible-body">
		      	<form action="/update-kategori/{{$kategori->id}}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    {{csrf_field()}}
		      		<div class="row">
						<div class="input-field col s12">
							<input id="category" type="text" class="validate" name="nama">
							<label for="category">Name of Category</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
						    <select name="prioritas">
						      	<option value="" disabled selected>Choose your option</option>
						      	<option value="1">Low</option>
						      	<option value="2">Mid</option>
						      	<option value="3">High</option>
						    </select>
						    <label>Priority</label>
						</div>
					</div>

					
					<button class="btn waves-effect waves-light blue-grey darken-3" style="float:right" type="submit" name="action">
						<i class="material-icons left">save</i>Save
					</button>
                </form>
					
                <form action="/delete-kategori/{{$kategori->id}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    {{csrf_field()}}
                    <button class="btn waves-effect waves-light blue-grey darken-3" style="float:right; margin-right: 10px;" >
                        <i class="material-icons left">delete</i>Delete
                    </button>
                </form>

	      	</div>

	    </li>
		@endforeach
	    

	</ul>

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
	<title>All Categories</title>
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
			<h4>All Categories</h4>
			<ul class="collapsible" data-collapsible="accordion">
                {{--@foreach($kategoris as $kategori)--}}
			    <li>
                    {{--@foreach($kategoris as $kategori)--}}
			      	<div class="row collapsible-header blue-grey darken-3 white-text">
			      		<div class="col l1 "></div>
			      		<div class="col l9">Name</div>
			      	</div>
			    </li>
				@foreach($kategoris as $kategori)
			    <li>

			      	<div class="row collapsible-header">
			      		<div class="col l1">{{$loop->iteration}}</div>
						{{--@foreach($kategoris as $kategori)--}}
			      		<div class="col l10">{{$kategori->nama}}</div>
			      		<div class="col l1"><i class="material-icons">edit</i></div>
			      	</div>
			      	<div class="row collapsible-body">
				      	<form action="/update-kategori/{{$kategori->id}}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            {{csrf_field()}}
				      		<div class="row">
								<div class="input-field col s12">
									<input id="category" type="text" class="validate" name="nama">
									<label for="category">Name of Category</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
								    <select name="prioritas">
								      	<option value="" disabled selected>Choose your option</option>
								      	<option value="1">Low</option>
								      	<option value="2">Mid</option>
								      	<option value="3">High</option>
								    </select>
								    <label>Priority</label>
								</div>
							</div>

							
							<button class="btn waves-effect waves-light blue-grey darken-3" style="float:right" type="submit" name="action">
								<i class="material-icons left">save</i>Save
							</button>
                        </form>
							<button class="btn waves-effect waves-light blue-grey darken-3" style="float:right; margin-right: 10px;" >
								<i class="material-icons left">cancel</i>Cancel
							</button>
                        <form action="/delete-kategori/{{$kategori->id}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <button class="btn waves-effect waves-light blue-grey darken-3" style="float:right; margin-right: 10px;" >
                                <i class="material-icons left">delete</i>Delete
                            </button>
                        </form>

				      	{{--</form>--}}
			      	</div>

			    </li>
				@endforeach
			    {{--<li>--}}
			      	{{--<div class="row collapsible-header">--}}
			      		{{--<div class="col l1">2</div>--}}
			      		{{--<div class="col l10">Kategori 1</div>--}}
			      		{{--<div class="col l1"><i class="material-icons">edit</i></div>--}}
			      	{{--</div>--}}
			      	{{--<div class="row collapsible-body">--}}
				      	{{--<form>--}}
				      		{{--<div class="row">--}}
								{{--<div class="input-field col s12">--}}
									{{--<input id="category" type="text" class="validate">--}}
									{{--<label for="category">Name of Category</label>--}}
								{{--</div>--}}
							{{--</div>--}}
							{{--<div class="row">--}}
								{{--<div class="input-field col s12">--}}
								    {{--<select>--}}
								      	{{--<option value="" disabled selected>Choose your option</option>--}}
								      	{{--<option value="1">Low</option>--}}
								      	{{--<option value="2">Mid</option>--}}
								      	{{--<option value="3">High</option>--}}
								    {{--</select>--}}
								    {{--<label>Priority</label>--}}
								{{--</div>--}}
							{{--</div>--}}

							{{----}}
							{{--<button class="btn waves-effect waves-light blue-grey darken-3" style="float:right" type="submit" name="action">--}}
								{{--<i class="material-icons left">save</i>Save--}}
							{{--</button>--}}
							{{--<button class="btn waves-effect waves-light blue-grey darken-3" style="float:right; margin-right: 10px;" >--}}
								{{--<i class="material-icons left">cancel</i>Cancel--}}
							{{--</button>--}}
							{{--<button class="btn waves-effect waves-light blue-grey darken-3" style="float:right; margin-right: 10px;" >--}}
								{{--<i class="material-icons left">delete</i>Delete--}}
							{{--</button>--}}
				      	{{--</form>--}}
			      	{{--</div>--}}
			    {{--</li>--}}
			    {{--<li>--}}
			      	{{--<div class="row collapsible-header">--}}
			      		{{--<div class="col l1">3</div>--}}
			      		{{--<div class="col l10">Kategori 1</div>--}}
			      		{{--<div class="col l1"><i class="material-icons">edit</i></div>--}}
			      	{{--</div>--}}
			      	{{--<div class="row collapsible-body">--}}
				      	{{--<form>--}}
				      		{{--<div class="row">--}}
								{{--<div class="input-field col s12">--}}
									{{--<input id="category" type="text" class="validate">--}}
									{{--<label for="category">Name of Category</label>--}}
								{{--</div>--}}
							{{--</div>--}}
							{{--<div class="row">--}}
								{{--<div class="input-field col s12">--}}
								    {{--<select>--}}
								      	{{--<option value="" disabled selected>Choose your option</option>--}}
								      	{{--<option value="1">Low</option>--}}
								      	{{--<option value="2">Mid</option>--}}
								      	{{--<option value="3">High</option>--}}
								    {{--</select>--}}
								    {{--<label>Priority</label>--}}
								{{--</div>--}}
							{{--</div>--}}

							{{----}}
							{{--<button class="btn waves-effect waves-light blue-grey darken-3" style="float:right" type="submit" name="action">--}}
								{{--<i class="material-icons left">save</i>Save--}}
							{{--</button>--}}
							{{--<button class="btn waves-effect waves-light blue-grey darken-3" style="float:right; margin-right: 10px;" >--}}
								{{--<i class="material-icons left">cancel</i>Cancel--}}
							{{--</button>--}}
							{{--<button class="btn waves-effect waves-light blue-grey darken-3" style="float:right; margin-right: 10px;" >--}}
								{{--<i class="material-icons left">delete</i>Delete--}}
							{{--</button>--}}
				      	{{--</form>--}}
			      	{{--</div>--}}
			    {{--</li>--}}

			</ul>
		</div>
	</div> -->

	<!--Import jQuery before materialize.js-->
	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script>
		$(document).ready(function() {
		    $('select').material_select();
		});
	</script>
</body>
</html> -->