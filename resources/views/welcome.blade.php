<!--importacao do layout padrao-->
@extends('layouts/padrao')

@section('content')
    <style>
        /*parte visual do circulo contendo o nome do projeto */
        .nomeProjeto{
            text-align: center;
            padding: 0.5rem 0.8rem;
            border-radius: 0.5rem;
            font-size: 18px;
            background-color: #eeeeee;
        }
        /*parte visual dos botões e formularios de editar e exluir, essa parte é necessaria visando a recursividade */
        .formDelBtn{
            position: relative;
            transition: 0.3s ease;
        }
        .delBtn{
            padding: 0px;
            margin: 0px;
            position: absolute;
            font-size: 1.0rem;
            width: 25px;
            height: 25px;
            top:-17px;
            right: 13px;
            z-index: 1;
            background-color: white;
            color: #d92b2b;
            font-weight: lighter;
            border-radius: 5px;
            transform: translateY(+25%);
            align-items: center;
            text-align: center;
            transition: 0.3s ease;
            border-style: solid;
            border-width: 1px;
            border-color: #d92b2b;
        }
        .delBtn:hover{
            background-color: #d92b2b;
            color: white;
        }
        .delBtn:hover{
            background-color: #d92b2b;
        }
        .formEditBtn{
            position: relative;
        }
        .editBtn{
            padding: 0px;
            margin: 0px;
            position: absolute;
            font-size: 1.0rem;
            width: 25px;
            height: 25px;
            top:-17px;
            right: 43px;
            z-index: 1;
            background-color: white;
            color: #228db8;
            font-weight: lighter;
            border-radius: 5px;
            transform: translateY(+25%);
            align-items: center;
            text-align: center;
            border-style: solid;
            border-width: 1px;
            border-color: #0c7eab;
            transition: 0.3s ease;
        }
        .editBtn:hover{
            background-color: #0c7eab;
            color: white;
            align-items: center;
            text-align: center;
        }


    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">PROJETOS:</p>
    </div>
    <div class="container-fluid d-flex justify-content-center flex-column col-md-9 col-sm-10 p-0 rounded-bottom ">

        <div id="dadosProjeto">
            <!-- MAis um "ajuste" de recursividade-->
            <style>
                @media only screen and (max-width: 650px) {
                    .empCard {
                        flex-direction: column;
                    }
                    .visSold{
                        margin-bottom: 8px;
                        margin-left: 7px;
                    }

                }
            </style>
        @foreach($projetos as $projeto)
            <!-- Aqui começa a listagem dos projetos-->

                <div class="warpProjetoCard popin">

                    <!--botões de editar e excluir-->
                        <div class="formDelBtn">
                            <form method="post" action="{{Route("projeto.remover",['id'=>$projeto->id])}}" onsubmit="return confirm('Tem certeza que deseja remover o projeto {{$projeto->nome}} ?')">
                                @csrf
                                @method('DELETE')
                                <button class="delBtn"><i class="fas fa-times"></i></button>                        </form>
                        </div>
                        <div class="formEditBtn">
                            <form method="get" action="{{Route("projeto.edit",['projeto'=>$projeto->id])}}">
                                @csrf
                                <button class="editBtn"><i class="fas fa-pen"></i></button>
                            </form>
                        </div>
                    <!-- fim dos botões de editar e excluir-->

                    <!--nome e icone de projeto-->
                    <div id="ProjetoCard" class="col-12 bg-white rounded shadow-sm d-flex justify-content-between mt-3 popin empCard">
                        <div id="infoProjeto" class="p-2 mt-1 d-flex  justify-content-end flex-column">
                            <img id="iconeProjeto" class="rounded-circle border" src="../imagens/projeto.jpg" height="125 px" width="125px">
                            <p class="nomeProjeto mt-2 border col-12">{{$projeto->nome}}</p>
                        </div>
                        <!-- fim nome e icone de projeto-->

                        <!-- botao ver atividades-->
                        <div id="btnVerAtividades" class="d-flex align-items-center">
                            <form method="get" action="{{route("listarAtividades")}}" class="">
                                <input type="hidden" id="id_projeto" name="id_projeto" value="{{$projeto->id}}">
                                <input type="submit" class="btn btn-primary pt-2 pb-2 pl-3 pr-3 shadow-sm visSold " value="VISUALIZAR ATIVIDADES">
                            </form>
                        </div>
                        <!--fim  botao ver atividades-->
                    </div>

                    <!-- código para encontrar a porcentagem correta para cada projeto-->
                    @php $porcentagem=\App\Models\Porcentagem::where("id_projeto",'=',$projeto->id)->first(); @endphp


                    <!-- Barra de progresso com porcentagem-->
                    <div class=" p-2 d-flex  justify-content-center flex-column col-12 bg-white">
                        <h6>Progresso</h6>
                        <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:{{$porcentagem->porcentagem}}%">
                            {{$porcentagem->porcentagem}}%
                        </div>
                    </div>


                        <!-- código para verificar atrasos-->
                        @php
                            $atividades=\App\Models\Atividade::where("id_projeto","=",$projeto->id)->get();
                            foreach ($atividades as $atividade){
                                if($atividade->fim > $projeto->fim){
                                    echo("
                                    <div class='alert alert-danger mt-3' role='alert'>
                  <p class='text-center'>HAVERÁ ATRASO NESSE PROJETO!!!!</p>

                </div>
                                    ");
                                    break;
                                }
                            }

                        @endphp
                    </div>
                </div>

            @endforeach
        </>
        <!-- Aqui acaba a listagem dos projetos-->
    </div>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"
    >
    </script>
@endsection
