
@extends('layouts.admin')

@section('title', 'Add Freelancer')

@section('content')
<div class="row">
    <div class="col l3"></div>
    <div class="col l6">
        <h4>Add Freelancer</h4>
        <form method="POST" action="/store-kategori">
            {{csrf_field()}}
            <div class="row">
                <div class="input-field col s12">
                    <input id="name" type="text" name="name" class="validate">
                    <label for="name">Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" name="nama" class="validate">
                    <label for="email">Email Address</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" name="nama" class="validate">
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" name="nama" class="validate">
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
