@extends ('layouts.master')

@section ('content')

    <h1>Ychwanegu Ysgol</h1>

    <form class="form-signin" method="POST" action="/proffil/creu">

        {{ csrf_field() }}

        <div class="form-group">
        
            <label for="exampleSelect1">Dewis Ysgol</label>
            
            <select name="school_id" class="form-control" id="exampleSelect1">

                @foreach ($schools as $school)
                
                        <option value="{{$school->id}}">{{$school->name}}</option>
                
                        @endforeach
                
                </select>

            </div>

        <h2 class="form-signin-heading"></h2>
        
        <label for="inputName" class="sr-only">Dosbarth</label>
        
        <input type="text" id="inputClass" name="class" class="form-control" placeholder="Dosbarth" required autofocus>

        <label for="inputName" class="sr-only">Nifer</label>
        
        <input type="text" id="inputNifer" name="nifer" class="form-control" placeholder="Nifer" required autofocus>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Ychwanegu</button>

        @include('layouts.errors')
        
        </form>

@endsection