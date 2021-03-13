<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eventos;

class EventosControle extends Controller
{
    public function index(){
        
        $busca = request('busca');

        if ($busca) {
            $eventos = Eventos::where([
                ['titulo', 'like','%'.$busca.'%']])->get();
        } else {
            $eventos = Eventos::all();
        }

        return view('welcome', ['eventos' => $eventos, 'busca'=> $busca]);
    }

    public function create(){
        return view('eventos.create');
    }

    public function store(Request $request){
        $evento = new Eventos;

        $evento->titulo = $request->titulo; 
        $evento->data = $request->data;
        $evento->cidade = $request->cidade;
        $evento->privado = $request->privado;
        $evento->descricao = $request->descricao;
        $evento->items = $request->items;

        // Upload de imagem
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            
            $requestImagem = $request->image;
            $extensao = $requestImagem->extension();
            $nomeImagem = md5($requestImagem->getClientOriginalName() . strtotime("now") . "." . $extensao);

            $requestImagem->move(public_path('img/events'), $nomeImagem);
            $evento->image = $nomeImagem;

        }

        $evento->save();

        return redirect('/')->with('msg','Evento criado com sucesso!');
    }
    
    public function show($id) {
        $evento = Eventos::findOrFail($id);

        return view('eventos.show', ['evento' => $evento]);
    }
}
