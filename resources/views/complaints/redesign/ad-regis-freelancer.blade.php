
@extends('layouts.admin')

@section('title', 'Add Freelancer')

@section('content')
<div class="row">
    <div class="col l3"></div>
    <div class="col l6">
        <h4>Add Freelancer</h4>
        <form method="POST" action="{{ route('register') }}">
            {{csrf_field()}}
            
            <div class="row">
               
                <div class="input-field col s12">
                    <input id="name" type="text" name="name" value="{{ old('name') }}" class="validate" required>
                    <label for="name">Name</label>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
               
                <div class="input-field col s12">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="validate" required>
                    <label for="email">Email Address</label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                
                <div class="input-field col s12">
                    <input id="password" type="password" name="password" class="validate" required>
                    <label for="password">Password</label>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" name="password_confirmation" class="validate" required>
                    <label for="password">Confirm Password</label>
                </div>
            </div>

            
            <button class="btn waves-effect waves-light" style="float:right" type="submit" name="action">
                <i class="material-icons left">add</i>Add
            </button>
        </form>

    </div>
    <div class="col l3"></div>
</div>


@endsection


