@extends('layout.main')

@section('titulo', 'Lojinha braba')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="">
        <input type="text" class="form-control" name="busca" id="busca" type="text" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    <h2>Próximos eventos</h2>
    <p class="subtitle">Veja os eventos, nos próximos dias</p>
    <div id="card-container" class="row">
        @foreach($eventos as $evento)
            <div class="card col-md-3">
                <img src="/img/events/{{ $evento->image }}" alt="{{ $evento->title }}">
                <div class="card-body">
                    <p class="card-date">15/02/2021</p>
                    <h5 class="card-title">{{ $evento->titulo }}</h5>
                    <p class="card-participants">X Participantes</p>
                    <a href="/eventos/{{ $evento->id }}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection