
<!--
    Nessa view está contigo o layout de todas as telas do sistema,
    eu fiz ela separadamente assim, para não ter que copiar código
    em todas as views, nela está contigo a imagem de backgound do
    sistema, bem como as importações para todas as bibliotecas utilizadas
    no front-end do sistema como bootstrap, fontawesome, e jquery...
-->
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../../imagens/prancheta.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8ac21f36ef.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.6.0/jszip.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.js"></script>

    <title>Controle de Projetos</title>
    <style>
        /* BACKGROUND */
        body{
            overflow-x: hidden;
            width: 100%;
            height:100%;
            background-image: url("{{asset("imagens/Background low polyv2.png")}}");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size:cover;
        }



    </style>
</head>

<body class="container-fluid">
<!--________________________________________________________________________________________________________________________________________________________________-->
<!--Cabeçalho com a imagem e opções de inicio e cadastro-->
<header class="row">
    <nav class="navbar navbar-expand-lg navbar-light bg-white col-12 ">
        <a class="navbar-brand" href="#">
            <img src="{{asset("imagens/prancheta.png")}}" width="70" height="70" class="d-inline-block align-top " alt=" Controle de projetos" style="margin-right: 100px">
        </a>
        <button class="navbar-toggler text-center" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"  >
                    <a class="nav-link font-weight-light " style="font-size: 20px; margin-right: 30px" href="{{route("welcome")}}" >INICIO<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active" >
                    <a class="nav-link font-weight-light " style="font-size: 20px; margin-right: 30px" href="{{route("projeto.create")}}" >ADICIONAR PROJETO<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active" >
                    <a class="nav-link font-weight-light " style="font-size: 20px" href="{{route("selecionarProjeto")}}" >ADICIONAR ATIVIDADE<span class="sr-only">(current)</span></a>
                </li>
            </ul>

        </div>

    </nav>

</header>
<!--Fim do cabeçalho-->

<!--________________________________________________________________________________________________________________________________________________________________-->
<!-- classe row é usada em todas as telas para a recursividade-->
<div class="row">
    @yield('content')
</div>
</body>

</html>
