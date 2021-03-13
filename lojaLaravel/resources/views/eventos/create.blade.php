@extends('layout.main')

@section('titulo', 'Criar Evento')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu Evento</h1>
    <form action="/eventos" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="image">Evento:</label>
            <input type="file" class="from-control-file" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="titulo">Evento:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do evento">
        </div>
        <div class="form-group">
            <label for="titulo">Data do evento:</label>
            <input type="date" class="form-control" id="data" name="data">
        </div>
        <div class="form-group">
            <label for="titulo">Cidade:</label>
            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="local do evento">
        </div>
        <div class="form-group">
            <label for="titulo">O evento é privado?</label>
            <select name="privado" id="privado" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
        </div>
        <div class="form-group">
            <label for="titulo">Adicione itens de infraestrutura:</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="cadeiras" > Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="palco" > Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="cerveja grátis" > Cerveja grátis
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open Food" > Open Food
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="brindes" > Brindes
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Evento">
    </form>
</div>

@endsection