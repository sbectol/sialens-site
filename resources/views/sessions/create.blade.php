@extends ('layouts.master')

@section ('content')

    <h1>Mewngofnodi</h1>

    <form class="form-signin" method="POST" action="/login">

        {{ csrf_field() }}

        <h2 class="form-signin-heading">Mewngofnodi</h2>
        
        <label for="inputEmail" class="sr-only">Cyferiad Ebost</label>

        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Cyferiad ebost" required autofocus>

        <label for="inputPassword" class="sr-only">Cyfrinair</label>
        
        <input type="password" name="password" id="password" class="form-control" placeholder="Cyfrinair" required>
        

        <div class="checkbox">
        
            <label>

            <input type="checkbox" value="remember-me"> Cofiwch fi

            </label>
        
            </div>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Mewngofnodi</button>

        @include('layouts.errors')
        
        </form>

@endsection