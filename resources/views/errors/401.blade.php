@extends ('layouts.master')

@section ('content')

    <section class="jumbotron text-center">

        <div class="container">

            <h1 class="jumbotron-heading">Sialens</h1>

            {!! QrCode::size(100)->generate('User1'); !!}

            <p class="lead text-muted">Sori, nid oes gennych ganiatâd i wneud hynny</p>

            <p><a href="/" class="btn btn-secondary">Hafan</a></p>

            </div>

        </section>

@endsection
