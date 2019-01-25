@extends ('layouts.master')

@section ('content')

    <h1>Defnyddiwr</h1>

    <form class="form-signin" method="POST" action="/users/role">

        {{ csrf_field() }}

        <h2 class="form-signin-heading"></h2>
        
        
        
        <p>{{$user->name}}</p>
        
        <input type="hidden" name="user_id" value="{{$user->id}}" />
        
        

            @foreach ($roles as $role)
                <input type="radio" name="role_id" value="{{$role->id}}">{{$role->name}}<br>
 
               
                @endforeach
            
           
            </p>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Golygu</button>

        @include('layouts.errors')
        
        </form>

@endsection