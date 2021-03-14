@extends('layout.main')

@section('titulo', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    @if (count(eventos) > 0)
        
    @else
        <p>Você ainda não tem eventos, <a href="/eventos/create">Criar evento</a></p>
    @endif
</div>


@endsection