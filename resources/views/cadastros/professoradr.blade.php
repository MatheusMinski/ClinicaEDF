@extends ('layout.site')

@section('titulo', 'Cadastro De Professores')

@section('conteudo')

    <div class="container" >
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="">

                <br/><br/>
                <h4>Endereço</h4>
                <br/><br/>

                <label >Rua</label>
                <input class="form-control" required="required" type="text" placeholder="Ex. das Laranjeiras" />
                <br/><br/>

                <label>Número</label>
                <input class="form-control" required="required" type="text" placeholder="Ex. 605" />
                <br/><br/>

                <label>Bairro</label>
                <input class="form-control" required="required" type="text" placeholder="Ex. Dos Estados" />
                <br/><br/>

                <labe>Complemento</labe>
                <input class="form-control"  type="text" placeholder="Ex. Casa, Apartamento, Condominio" />
                <br/><br/>


            </form>

            <div class="row">
                <div><a class="next">&laquo; Página Anterior</a></div>
                <div><a class="floatLeft" type="submit">Finalizar Cadastro</a></div>
            </div>
            <br/><br/><br/><br/>

        </div>
    </div>
    </div>

@endsection
