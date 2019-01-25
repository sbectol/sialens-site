@extends ('layouts.master')

@section ('content')

    <h1>Avatar</h1>

    <form class="form-signin" method="POST" action="/avatar/store">

        {{ csrf_field() }}

        <div class="form-group">

            <input type="hidden" name="profile_id" value="1" />

            <input type="hidden" name="face" value="1" />
            <input type="hidden" name="uniform" value="1" />
            <input type="hidden" name="eyes" value="1" />
            <input type="hidden" name="glasses" value="1" />
            <input type="hidden" name="hair" value="1" />
            <input type="hidden" name="nose" value="1" />
            

        
           </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Ychwanegu</button>

        @include('layouts.errors')
        
        </form>

@endsection