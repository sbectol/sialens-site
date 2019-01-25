@extends ('layouts.master')

@section ('content')

    <h1>Golygu Ysgol</h1>

    <form class="form-signin" method="POST" action="/ysgol/golygu/{{$school->id}}">

        {{ csrf_field() }}

        <h2 class="form-signin-heading"></h2>
        
        <label for="inputName" class="sr-only">Enw'r Ysgol</label>
        
        <input type="text" id="inputName" name="name" class="form-control" placeholder="Name" value="{{$school->name}}" required autofocus>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Golygu</button>

        @include('layouts.errors')
        
        </form>

@endsection