@extends ('layouts.master')

@section ('content')

    <section class="jumbotron text-center">

      <div class="container">

        <h1 class="jumbotron-heading">Sialens</h1>

        {!! QrCode::size(200)->generate('exp://exp.host/@sbectol/sialens'); !!}

        <h2 class="jumbotron-heading">Croeso i Sialens</h2>

        <h3 class="jumbotron-heading">{{$questions->count()}} cwestiwn wedi cofnodi</h3>

        <p>

          <a href="/questions/create" class="btn btn-primary">Ychwanegu Cwestiwn</a>

          @if( Auth::user()->hasAnyRole(['Gweinyddwr','Rheolwr']) )
          
          <a href="/proffil/creu" class="btn btn-secondary">Creu Defnyddwyr</a>

          @if(!$approved == true)
          
            <a href="/pori" class="btn btn-secondary">Cwestiynau wedi derbyn</a>

            @else 

            <a href="/" class="btn btn-secondary">Cwestiynau angen derbyn</a>
            
            @endif

            @endif

          @if( Auth::user()->hasrole('Gweinyddwr') )

          <a href="/ysgol/creu" class="btn btn-secondary">Ychwanegu Ysgol</a>

          @endif

        </p>

      </div>

    </section>

    @if( Auth::user()->hasAnyRole(['Gweinyddwr','Rheolwr']) )
    <section class="text-center">
    
        <div class="container">

            @if(!$approved == true)
            
                <h3 class="jumbotron-heading">Cwestiynau angen ei derbyn</h3>
                
                @else
                
                <h3 class="jumbotron-heading">Cwestiynau wedi ei derbyn</h3>
                
                @endif
    

            </div>

        </section>

        @endif

    <div class="album text-muted">

        <div class="container">

            <div class="row">

                @foreach ($questions as $question)

                    @if( $question->user_id == Auth::user()->id || Auth::user()->hasAnyRole(['Gweinyddwr','Rheolwr']) )
                   
                    @include ('questions.questioneditable') 

                    @endif

                    @endforeach
                </div>

        </div>

    </div>

@endsection
  