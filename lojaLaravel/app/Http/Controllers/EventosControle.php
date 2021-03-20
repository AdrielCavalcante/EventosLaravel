<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eventos;
use App\Models\User;
use PhpParser\Node\Stmt\Return_;

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

        $user = auth()->user();
        $evento->user_id = $user->id;

        $evento->save();

        return redirect('/')->with('msg','Evento criado com sucesso!');
    }
    
    public function show($id) {
        $evento = Eventos::findOrFail($id);

        $donoEvento = User::where('id', $evento->user_id)->first()->toArray();

        return view('eventos.show', ['evento' => $evento, 'donoEvento' => $donoEvento]);
    }

    public function dashboard(){
        $user = auth()->user();

        $eventos = $user->eventos;

        $eventosAsParticipant = $user->eventosAsParticipant;


        return view('eventos.dashboard', ['eventos' => $eventos, 'eventosAsParticipant' => $eventosAsParticipant]);
    }

    public function destroy($id){
        Eventos::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg','Evento excluido com sucesso!');
        
    }

    public function edit($id){
        $user = auth()->user();
        
        $evento = Eventos::findOrFail($id);

        if ($user->id != $evento->user->id) {
            return redirect('/dashboard');
        }

        return view('eventos.edit', ['evento' => $evento]);
    }

    public function update(Request $request){
        Eventos::findOrFail($request->id)->update($request->all());

        return redirect('/dashboard')->with('msg','Evento editado com sucesso!');
    }

    public function joinEvento($id){
        $user = auth()->user();

        $user->eventosAsParticipant()->attach($id);

        $evento = Eventos::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento: '.$evento->titulo);
    }
}
