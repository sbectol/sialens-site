@extends ('layouts.master')
@section ('content')
    <section class="jumbotron text-center no-print">
      <div class="">
        <h1 class="jumbotron-heading">Sialens</h1>
        {{--  {!! QrCode::size(100)->generate('exp://s8-atw.sbectol.sialens.exp.direct:80'); !!}  --}}
        <p class="lead text-muted">Croeso i Sialens</p>
        <p>
          <a href="/proffil/creu" class="btn btn-primary">Ychwanegu Defnyddwyr</a>
          <a href="/" class="btn btn-secondary">Hafan</a>
        </p>
        <ul class="list-group">
        @foreach ($schools as $school)
            <li class="list-group-item"><a href="/proffil/{{$school->id}}">{{$school->name}}</a></li>
            @endforeach
            </ul>
      </div>
    </section>

    {{--  <div class="album text-muted">
        <div class="container">  --}}

            <div class="sheet">
                @foreach ($profiles as $profile)
                    @include ('profiles.profile')
                    @endforeach
                </div>

                {{ $profiles->links() }}
        {{--  </div>
    </div>  --}}
@endsection