@extends ('layouts.master')
@section ('content')
    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">Sialens</h1>
        {!! QrCode::size(100)->generate('exp://s8-atw.sbectol.sialens.exp.direct:80'); !!}
        <p class="lead text-muted">Croeso i Sialens</p>
        <p>
          <a href="/questions/create" class="btn btn-primary">Ychwanegu Cwestiwn</a>
          <a href="/proffil/creu" class="btn btn-secondary">Creu Defnyddwyr</a>
          <a href="/ysgol/creu" class="btn btn-secondary">Ychwanegu Ysgol</a>
          <a href="/register" class="btn btn-secondary">Creu Swyddog</a>
        </p>
      </div>
    </section>

    <div class="album text-muted">
        <div class="container">
            <div class="row">
                @foreach ($users as $user)
                    @include ('users.user')
                    @endforeach
                </div>
        </div>
    </div>
@endsection
  