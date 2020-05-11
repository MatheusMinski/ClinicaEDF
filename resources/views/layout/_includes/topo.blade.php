<!DOCTYPE html>


<html>
<head>
    <title>@yield('titulo')</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


</head>

<body>
<header>

    <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">


    <nav class="yellow">
        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
        <a href="{{route('home')}}"  style="color: #1d2124" class="brand-logo center">Home</a>
        <ul class="right hide-on-med-and-down">
            @if(!Auth::guest())
                <li><a class="upBtn" name="btnSair" href="{{route('sair')}}" style="color: #1d2124">Sair</a></li>
            @else
                <li><a class="upBtn" name="Btnlog" style="color: #1d2124" href="{{route('login')}}">Login</a></li>
            @endif
        </ul>
    </nav>

    <ul id="slide-out" class="sidenav">
        @if(!Auth::guest())
            @php
                $fullName = Auth::user()->nome;
                $firstName = explode(" ", $fullName);
            @endphp
            <li><a class = "upBtn"style=" color: #1d2124">{{$firstName[0]}}</a></li>
            <li><a class="upBtn" name="btnAlunos" href=""style=" color: #1d2124">Alunos</a></li>
            <li><a class="upBtn" name="btnListaEspera" href="{{route('lista.espera')}}" style="color: #1d2124">Lista de Espera</a></li>
            <li><a class="upBtn" name="btnCalendario" href="" style="color: #1d2124">Calendario</a></li>
            <li><a class="upBtn" name="btnProf" href="{{route('lista.professor')}}" style="color: #1d2124">Professores</a></li>
            <li><a class="upBtn" name="BtnEmp" href="{{route('lista.emprestimos')}}" style="color: #1d2124">Empréstimos</a></li>
            <li><a class="upBtn" name="BtnEq" href="{{route('lista.equipamentos')}}" style="color: #1d2124">Equipamentos</a></li>
        @endif
        @if(!Auth::guest())
            <li><a class="upBtn" name="btnSair" href="{{route('sair')}}" style="color: #1d2124">Sair</a></li>
        @else
            <li><a class="upBtn" name="Btnlog" style="color: #1d2124" href="{{route('login')}}">Login</a></li>
        @endif

    </ul>


    <script async="" src="//www.google-analytics.com/analytics.js" style="display: none !important;"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script>

</header>

