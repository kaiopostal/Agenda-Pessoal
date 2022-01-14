<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListTarefa;

class ListController extends Controller
{
    public function listagem(Request $request){
        $ListTaref = ListTarefa::all();

        return response()->json($ListTaref);
    }

    public function adicionar(Request $request){
       $newTar = new ListTarefa();

        $newTar->descricao = $request->descricao;
        $newTar->datas = $request->data;
        $newTar->save();

        return response()->json('success');
    }

    public function update(Int $tarefa, Request $request){
        $tar = ListTarefa::find($tarefa);
        $tar->descricao = $request->descricao;
        $tar->datas = $request->data;
        $tar->save();

        return response()->json('success');
    }

    public function editar(Int $tarefa){
        $tudo = ListTarefa::find($tarefa);

        return response()->json($tudo);
    }

    public function delete(Int $tarefa){
        $tar = ListTarefa::find($tarefa);
        $tar->delete();

        return response()->json('deletado');
    }    
}
