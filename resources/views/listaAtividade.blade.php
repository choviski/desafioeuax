@extends('layouts/padrao')

@section('content')
    <style>
        /*parte visual do circulo contendo o nome da atividade */

        .nomeAtividade{
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
        <p class="lead p-1 m-0" style="font-size: 22px">ATIVIDADES DO PROJETO {{$projeto->nome}}:</p>
    </div>
    <div class="container-fluid d-flex justify-content-center flex-column col-md-9 col-sm-10 p-0 rounded-bottom ">

        <div id="dadosAtividade">
            <!-- Mais um "ajuste" de recursividade-->
            <style>
                @media only screen and (max-width: 650px) {
                    .empCard {
                        flex-direction: column;
                    }
                    .visCon{
                        margin-bottom: 8px;
                        margin-left: 7px;
                    }

                }
            </style>
        @foreach($atividades as $atividade)
            <!-- Aqui começa a listagem das atividades-->
                <div class="warpAtividadeCard popin">

                    <!--botões de editar e excluir-->
                    <div class="formDelBtn">
                        <form method="post" action="{{Route("atividade.remover",['id'=>$atividade->id])}}" onsubmit="return confirm('Tem certeza que deseja remover a atividade {{$atividade->nome}} ?')">
                            @csrf
                            @method('DELETE')
                            <button class="delBtn"><i class="fas fa-times"></i></button>                        </form>
                    </div>
                    <div class="formEditBtn">
                        <form method="get" action="{{Route("atividade.edit",['atividade'=>$projeto->id])}}">
                            @csrf
                            <button class="editBtn"><i class="fas fa-pen"></i></button>
                        </form>
                    </div>
                    <!-- fim dos botões de editar e excluir-->

                    <!--nome e icone de atividade-->
                    <div id="AtividdadeCard" class="col-12 bg-white rounded shadow-sm d-flex justify-content-between mt-3 popin empCard">
                        <div id="AtividadeEmpresa" class="p-2 mt-1 d-flex  justify-content-end flex-column">
                            <img id="iconeAtividade" class="rounded-circle border" src="../imagens/atividade.jpg" height="125 px" width="125px">
                            <p class="nomeAtividade mt-2 border col-12">{{$atividade->nome}}</p>
                        </div>
                        <!-- fim nome e icone de projeto-->

                        <!-- botao de marcar como resolvido-->
                        <div id="btnConcluido" class="d-flex align-items-center">
                            <form method="get" action="{{route("concluida")}}" class="">
                                <input type="hidden" id="id_atividade" name="id_atividade" value="{{$atividade->id}}">
                                <input type="submit" class="btn btn-outline-success pt-2 pb-2 pl-3 pr-3 shadow-sm visCon "@if($atividade->finalizada ==1) value="ATIVIDADE CONCLUIDA" disabled @else value="FINALIZAR ATIVIDADE" @endif>
                            </form>
                        </div>
                        <!-- fim botao de marcar como resolvido-->


                    </div>
                    <!--INformações das atividades-->
                    <div class=" p-2 d-flex  justify-content-center flex-column col-12 bg-white">
                        <h6>INFORMAÇÕES</h6>
                        <div class="">
                            <span class=" mt-2 border col-12" > Data de inicio: {{$atividade->inicio}}</span>
                            <span class=" mt-2 border col-12"> Data de término: {{$atividade->fim}}</span>
                        </div>
                    </div>
                </div>
                <!--fim das INformações das atividades-->

            @endforeach
        </div>
        <!-- Aqui acaba a listagem das atividades-->
    </div>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"
    >
    </script>
@endsection
