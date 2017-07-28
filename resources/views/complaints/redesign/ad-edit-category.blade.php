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
			<form>
				<div class="modal-content">
					<h4>New Category</h4>
					<form method="POST" action="/store-kategori">
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
					<a href="#!" class="modal-action modal-close waves-effect waves-red darken-2 btn-flat" type="submit" name="action">
						<i class="material-icons left">add</i>Add
					</a>
				</div>
			</form>
		</div>
	</div>
</div>
	<ul class="collapsible" data-collapsible="accordion">
	    <li>
	      	<div class="row collapsible-header white black-text">
	      		<div class="col l1 ">No</div>
	      		<div class="col l9">Name</div>
	      	</div>
	    </li>
		@foreach($kategoris as $kategori)
	    <li>

	      	<div class="row collapsible-header">
	      		<div class="col l1">{{$loop->iteration}}</div>
				{{--@foreach($kategoris as $kategori)--}}
	      		<div class="col l10">{{$kategori->nama}}</div>
	      		
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

	