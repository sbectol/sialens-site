@extends ('layouts.master')

@section ('content')

    <h1>Register</h1>

    <form class="form-signin" method="POST" action="/register">

        {{ csrf_field() }}

        <h2 class="form-signin-heading">Please regsister</h2>
        
        <label for="inputName" class="sr-only">Enw</label>
        
        <input type="text" id="inputName" name="name" class="form-control" placeholder="Name" required autofocus>

        <label for="inputEmail" class="sr-only">Email address</label>

        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        
        <label for="password_confirmation" class="sr-only">Password Confirmation</label>
        
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Password" required>
       

        <div class="checkbox">
        
            <label>

            <input type="checkbox" value="remember-me"> Remember me

            </label>
        
            </div>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>

        @include('layouts.errors')
        
        </form>

@endsection