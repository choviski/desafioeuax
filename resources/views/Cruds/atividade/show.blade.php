@extends('../../layouts/padrao')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Atividade {{$atividade->nome}}:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center ">

        <div class="col-12">
            <div class="table-responsive">
                <table class="table rounded bg-white mt-2 col-12 shadow">
                    <thead class=" rounded">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOME</th>
                        <th scope="col">INICIO</th>
                        <th scope="col">FIM</th>
                        <th scope="col">CREATED_AT</th>
                        <th scope="col">UPDATED_AT</th>
                        <th scope="col">DELETED_AT</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$atividade->id}}</td>
                        <td>{{$atividade->nome}}</td>
                        <td>{{$atividade->inicio}}</td>
                        <td>{{$atividade->fim}}</td>
                        <td>{{$atividade->created_at}}</td>
                        <td>{{$atividade->updated_at}}</td>
                        <td>{{$atividade->deleted_at}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <a href="{{route("welcome")}}"><button class="btn btn-outline-light text-dark mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>

@endsection
