@extends('layout.main')

@section('titulo', $evento->titulo)

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/events/{{ $evento->image }}" class="img-fluid" alt="{{ $evento->image }}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{ $evento->titulo }}</h1>
            <p class="event-city"><ion-icon name="location-outline"></ion-icon>{{ $evento->cidade}}</p>
            <p class="events-participants"><ion-icon name="people-outline"></ion-icon>X participantes</p>
            <p class="event-owner"><ion-icon name="star-outline"></ion-icon>Dono do evento</p>
            <a href="#" class="btn btn-primary" id="event-submit">Confirmar presença</a>
            <h3>O evento conta com:</h3>
            <ul id="items-list">
                @foreach($evento->items as $item)
                <li><ion-icon name="play-outline"></ion-icon> <span>{{$item}}</span></li> 
                @endforeach
            </ul>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Sobre o Evento:</h3>
            <p class="event-description">{{ $evento->description }}</p>
        </div>
    </div>
</div>

@endsection