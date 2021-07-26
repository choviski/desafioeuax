@extends('../../layouts/padrao')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Adicionar nova atividade:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">

        <form  class="col-12  mt-2" action="{{Route('atividade.store')}}" method="post">
            @csrf
            <div class="form-group bg-light p-2 rounded">
                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Insira o nome da atividade" name="nome" required>

                <label  for="estado">Data de inicio da atividade</label>

                <input type="date" class="form-control" id="inicio" placeholder="Insira a data de inicio da atividade" name="inicio" required>
                <label  for="estado">Data de término da atividade</label>


                <input type="hidden" name="id_projeto" value="{{$projeto->id}}">

                <input type="date" class="form-control" id="fim" placeholder="Insira a data de término da atividade" name="fim" required>
                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="{{route("welcome")}}"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>


@endsection
