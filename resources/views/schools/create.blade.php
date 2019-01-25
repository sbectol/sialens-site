@extends ('layouts.master')

@section ('content')

    <h1>Ychwanegu Ysgol</h1>

    <form class="form-signin" method="POST" action="/ysgol/creu">

        {{ csrf_field() }}

        <h2 class="form-signin-heading"></h2>
        
        <label for="inputName" class="sr-only">Enw'r Ysgol</label>
        
        <input type="text" id="inputName" name="name" class="form-control" placeholder="Name" required autofocus>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ychwanegu</button>

        @include('layouts.errors')
        
        </form>

@endsection