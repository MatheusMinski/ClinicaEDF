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

    <nav>
        <div class="nav-wrapper">
            <a href="{{route('home')}}"  style="color: #1d2124" class="brand-logo center">Home</a>
            <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="left hide-on-med-and-down">
                @if(!Auth::guest())
                    @php
                        $fullName = Auth::user()->nome;
                        $firstName = explode(" ", $fullName);
                    @endphp
                    <li><a class = "upBtn">{{$firstName[0]}}</a></li>
                    <li><a class="upBtn" name="btnAlunos" href="">Alunos</a></li>
                    <li><a class="upBtn" name="btnProf" href="{{route('lista.professor')}}">Professores</a></li>
                @endif
            </ul>

            <ul class="right hide-on-med-and-down">
                @if(!Auth::guest())
                    <li><a class="upBtn" name="BtnEmp" href="{{route('lista.emprestimos')}}">Empréstimos</a></li>
                    <li><a class="upBtn" name="BtnEq" href="{{route('lista.equipamentos')}}">Equipamentos</a></li>
                    <li><a class="upBtn" name="btnSair" href="{{route('sair')}}">Sair</a></li>

                @else
                    <li><a class="upBtn" name="Btnlog" style="color: #1d2124" href="{{route('login')}}">Login</a></li>
                @endif
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
    </ul>

    <script async="" src="//www.google-analytics.com/analytics.js" style="display: none !important;"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</header>

