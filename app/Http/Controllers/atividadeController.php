<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\Porcentagem;
use App\Models\Projeto;
use Illuminate\Http\Request;

class atividadeController extends Controller
{
    public function listar(Request $request)
    {
        $projeto=Projeto::where('id','=',$request->id_projeto)->first();
        $atividades = Atividade::where("id_projeto","=",$request->id_projeto)->get();
        return view("listaAtividade")->with(["projeto"=>$projeto,"atividades"=>$atividades]);
    }
    public function concluida(Request $request)
    {
        $atividade= Atividade::where('id','=',$request->id_atividade)->first();
        $projeto=Projeto::where("id",'=',$atividade->id_projeto)->first();
        $porcentagem=Porcentagem::where("id_projeto","=",$projeto->id)->first();
        $porcentagem->finalizadas=$porcentagem->finalizadas+1;
        $porcentagem->porcentagem=$porcentagem->finalizadas*100/$porcentagem->total;
        $porcentagem->save();
        $atividade->finalizada=1;
        $atividade->save();
        return redirect()->route("welcome");
    }

    public function cadastrar(Request $request)
    {
        $projeto = Projeto::where("id","=",$request->projeto)->first();
        return view("cruds.atividade.create")->with(["projeto"=>$projeto]);
    }
    public function selecionarProjeto(){
            $projetos=Projeto::all();
            return view("CadastrarAtividade")->with(["projetos"=>$projetos]);
    }

    public function store(Request $request)
    {
        $projeto=Projeto::where("id",'=',$request->id_projeto)->first();
        $porcentagem=Porcentagem::where("id_projeto","=",$projeto->id)->first();
        $porcentagem->total=$porcentagem->total+1;
        $porcentagem->porcentagem=$porcentagem->finalizadas*100/$porcentagem->total;
        $porcentagem->save();
        Atividade::create($request->all());
        return redirect()->route("welcome");
    }

    public function show($id)
    {

        $atividade=Atividade::find($id);
        return view("cruds.atividade.show")->with(["atividade"=>$atividade]);
    }


    public function edit($id)
    {
        $atividade=Atividade::find($id);
        return view("cruds.atividade.edit")->with(["atividade"=>$atividade]);
    }


    public function update(Request $request, $id)
    {
        Atividade::find($id)->update($request->all());
        return redirect()->route("welcome");

    }


    public function destroy(Request $request)
    {
        $atividade = Atividade::where("id","=",$request->id)->first();
        $porcentagem=Porcentagem::where("id_projeto","=",$atividade->projeto->id)->first();
        $porcentagem->total=$porcentagem->total-1;
        if($atividade->finalizada==1){
            $porcentagem->finalizadas=$porcentagem->finalizadas-1;
        }
        $porcentagem->porcentagem=$porcentagem->finalizadas*100/$porcentagem->total;
        $porcentagem->save();
        Atividade::destroy($request->id);
        return redirect()->route("welcome");
    }
}
