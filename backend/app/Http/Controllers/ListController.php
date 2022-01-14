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

    public function update(ListTarefa $tarefa, Request $request){
        $tarefa->descricao = $request->descricao;
        $tarefa->datas = $request->data;
        $tarefa->save();

        return response()->json('success');
    }

    public function editar(ListTarefa $tarefa, Request $request){
        dd('olá');
        return response()->json($tarefa);
    }

    public function delete(ListTarefa $tarefa, Request $request){
        $tarefa->delete();

        return response()->json('success');
    }




    
}
