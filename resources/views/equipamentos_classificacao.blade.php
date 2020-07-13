<!DOCTYPE html>

<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>

<body style="width: 100%">
<header>
    <title>Classificação</title>

    <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">

    <script async="" src="//www.google-analytics.com/analytics.js" style="display: none !important;"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>

</header>

        <div class="row">
            <table>
                <thead>
                <tr>
                    <th class="center" >Classificações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($equipamentos as $equipamento)
                    <tr >
                        <td class="center">{{ $equipamento->classificacao }}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row" align="center">
            {{$equipamentos->links('vendor.pagination.materializecss')}}
        </div>


    </div>
<!--JavaScript at end of body for optimized loading-->


<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"></script>

</body>
</html>

