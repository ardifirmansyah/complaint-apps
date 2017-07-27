@if(Auth::check())
    @if(Auth::user()->type== 0)
        <script type="text/javascript">
            window.location = "{{'home-ad'}}";//here double curly bracket
        </script>
    @endif
    <script type="text/javascript">
        window.location = "{{'home-fl'}}";//here double curly bracket
    </script>
@endif
<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login</title>
</head>

<body>

<h3 class="center-align" style="padding-top:50px;padding-bottom:50px;">ComplaintApp</h3>
<div class="row" action="#">
    <div class="col s1 m3 l4">
    </div>
    <div class="col s10 m6 l4">

            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{csrf_field()}}
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="username" name="email" type="text" class="validate">
                        <label for="username">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">vpn_key</i>
                        <input id="password" type="password" class="validate" name="password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light blue-grey darken-3" style="float:right" type="submit" name="action">
                    Login
                </button>
            </form>
    </div>
    <div class="col s1 m3 l4">
    </div>
</div>


<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
