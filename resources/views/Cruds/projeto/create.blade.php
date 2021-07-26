@extends('../../layouts/padrao')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Adicionar novo projeto:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">

        <form  class="col-12  mt-2" action="{{Route('projeto.store')}}" method="post">
            @csrf
            <div class="form-group bg-light p-2 rounded">
                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Insira o nome do projeto" name="nome" required>

                <label  for="estado">Data de inicio:</label>

                <input type="date" class="form-control" id="inicio" placeholder="Insira a data de inicio do projeto" name="inicio" required>
                <label  for="estado">Data de término:</label>

                <input type="date" class="form-control" id="fim" placeholder="Insira a data de término do projeto" name="fim" required>
                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="{{route("welcome")}}"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>


@endsection
