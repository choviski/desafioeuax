<?php

namespace App\Http\Controllers;

use App\Models\Porcentagem;
use App\Models\Projeto;
use Illuminate\Http\Request;

class projetoController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view("cruds.projeto.create");
    }


    public function store(Request $request)
    {
        $projeto = Projeto::create($request->all());
        $porcentagem = new Porcentagem();
        $porcentagem->id_projeto=$projeto->id;
        $porcentagem->total=0;
        $porcentagem->finalizadas-=0;
        $porcentagem->porcentagem=0;
        $porcentagem->save();
        return redirect()->route("welcome");
    }


    public function show($id)
    {
        $projeto=Projeto::find($id);
        return view("cruds.projeto.show")->with(["projeto"=>$projeto]);
    }

    public function edit($id)
    {
        $projeto=Projeto::find($id);
        return view("cruds.projeto.edit")->with(["projeto"=>$projeto]);
    }


    public function update(Request $request, $id)
    {
        Projeto::find($id)->update($request->all());
        return redirect()->route("welcome");
    }


    public function destroy(Request $request)
    {
        Projeto::destroy($request->id);
        return redirect()->route("welcome");
    }
}
