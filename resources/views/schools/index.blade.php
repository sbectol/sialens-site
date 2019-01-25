@extends ('layouts.master')
@section ('content')
    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">Sialens</h1>
         {!! QrCode::size(200)->generate('exp://exp.host/@sbectol/sialens'); !!}
        <p class="lead text-muted">Croeso i Sialens</p>
        <p>
          <a href="/ysgol/creu" class="btn btn-primary">Ychwanegu Ysgol</a>
          <a href="/" class="btn btn-secondary">Hafan</a>
        </p>
      </div>
    </section>

    <div class="album text-muted">
        <div class="container">
            <div class="row">
                @foreach ($schools as $school)
                    @include ('schools.school')
                    @endforeach
                </div>
        </div>
    </div>
@endsection