@extends('layouts/padrao')

@section('content')

    <!-- Aqui é uma tela com um select que lista todos os projetos dd sistema,
    essa tela é importante pois é ela que associa cada atividade com seu projeto correspondente
    -->
    <div class="col-12  bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">SELECIONE O PROJETO DA ATIVIDADE:</p>
    </div>
    <div class="container-fluid">
        <div class="row text-center d-flex justify-content-center mt-2">
            <form action="{{Route('cadastrarAtividade')}}" class="col-8" method="get">
                <select class="form-control" id="projeto" name="projeto" required>
                    <option value="-1" disabled>Selecione o Projeto:</option>
                    @foreach($projetos as $projeto)
                        <option value="{{$projeto->id}}">{{$projeto->nome}}</option>
                    @endforeach
                </select>
                <input type="submit" class="btn btn-primary mt-2 col-12" VALUE="Continuar">

            </form>

        </div>
@endsection
