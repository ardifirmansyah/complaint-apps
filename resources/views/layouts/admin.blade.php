<!DOCTYPE html>
<html>
<head>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="css/collab.css"  media="screen,projection">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>@yield('title')</title>
</head>

<body>
	<nav>
		<div class="nav-wrapper white">
			<a href="{{route('homeadmin')}}" class="brand-logo"><img class="responsive-img logo" src="img/collab.png"></a>
			
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				<li>
					<a href="{{route('homeadmin')}}">Home</a>
				</li>
				<li>
					<a href="{{route('viewcomplaint')}}">Complaints</a>
				</li>
				<li>
					<a href="{{route('editkategori')}}">Categories</a>
				</li>
				<li>
					<a href="{{route('register')}}">Freelancers</a>
				</li>
				<li>
					<a href="{{ route('logout') }}" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">Logout</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" >
							{{ csrf_field() }}
					</form>
				</li>
			</ul>
			<ul class="side-nav" id="mobile-demo">
				<li>
					<a href="{{route('homeadmin')}}">Home</a>
				</li>
				<li>
					<a href="{{route('viewcomplaint')}}">Complaints</a>
				</li>
				<li>
					<a href="{{route('editkategori')}}">Categories</a>
				</li>
				<li>
					<a href="{{route('register')}}">Freelancers</a>
				</li>
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

	@yield('content')
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script>
		//navbar
		$(".button-collapse").sideNav();

		//modal
		$(document).ready(function(){
			// the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
			$('.modal').modal();
		});

		$('tr').click(function(){
			var id = '#modal'+this.id;
			console.log(id);
			$(id).modal('open');
		});

		//dropdown
		$(document).ready(function() {
			$('select').material_select();
		});

	</script>
	<script>
	$(document).ready(function(){
    	$('#myTable').DataTable();
	});
	</script>
</body>
</html>