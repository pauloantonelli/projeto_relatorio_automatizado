<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar/Cadastrar estudante</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="css/entrada.css"/>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.purple-deep_purple.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/entrada.css"/>
    <link rel="stylesheet" href="css/reset-inicial.css"/>
    <link rel="stylesheet" href="css/estrutura-corpo.css"/>
    <link rel="stylesheet" href="css/detalhes-menu.css"/>
    <!--link href="main.css?version=12"/--><!--engana o cache do navegador para atualizar sempre-->
    <style>
        .demo-layout-waterfall .mdl-layout__header-row .mdl-navigation__link:last-of-type  {
        padding-right: 0;
    }
    </style>
</head>
<body onload="valorDia(), minAlert()">
<div class="demo-layout-waterfall mdl-layout mdl-js-layout">
        <header class="mdl-layout__header mdl-layout__header--waterfall">
          <!-- Top row, always visible -->
          <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Editar/Cadastrar estudante</span>
            <div class="mdl-layout-spacer"></div>
          </div>
        </header>
        <div class="mdl-layout__drawer">
          <span class="mdl-layout-title">Editar/Cadastrar estudante</span>
          <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="index.php">Consultar Relatório</a>
            <hr/>
            <a class="mdl-navigation__link" href="inserir-relatorio.html">Inserir relatório</a>
            <hr/>
            <a class="mdl-navigation__link" href="atualizacao-entrada.php">Editar registro relatório</a>
            <hr/>
            <a class="mdl-navigation__link" href="exclusao-entrada.php">Deletar registro relatório</a>
            <hr/>

            <a class="mdl-navigation__link" href="cadastro-estudante.php">Editar/Cadastrar estudante</a>
            <hr/>
            <a class="mdl-navigation__link" href="atualizacao-estudantes.php">Editar Revisitas dos estudantes</a>
            <hr/>
            <a class="mdl-navigation__link" href="exclusao-estudante.php">Deletar cadastro estudante</a>
            <hr/>

            <a class="mdl-navigation__link" href="atualizacao-metas.php">Atualizar metas(mês a mês)</a>
            <hr/>

            <a class="mdl-navigation__link" href="feito-por.html">Feito por</a>
            <hr/>
          </nav>
        </div>
        <main class="mdl-layout__content">
          <div class="page-content">
<!--conteudo proprio-->

    <section class="estudantes">
        <?php 
        $conectId = mysqli_connect('localhost','root','','relatorio');
        mysqli_select_db($conectId,"pessoa");
        $queryId = mysqli_query($conectId, "SELECT * FROM pessoa");
        mysqli_select_db($conectId,"regPessoa");
        $queryRegis = mysqli_query($conectId, "SELECT id FROM regPessoa");
        ?>
        <h1>Dados dos Estudantes</h1>
        <!--Inicio formulario mes-->
        <label>Escolha o estudante: </label>
        <select id="escolhaEstudante">
            <option selected>Selecione...</option>
            <!--contador while enquanto houver registros ele continua no loopin-->
            <?php while($pessoaId = mysqli_fetch_array($queryId)) { ?>
                <option form="atualizacao" id="optSelectDia" value="<?php echo "id".$pessoaId['id']."nome".$pessoaId['nome']."apelido".$pessoaId['apelido']?>"><?php echo $pessoaId['nome']?></option>
            <?php } ?>
        </select>
        <select id="escolhaId">
            <option selected>Selecione...</option>
            <!--contador while enquanto houver registros ele continua no loopin-->
            <?php while($contDia = mysqli_fetch_array($queryRegis)) { ?>
                <option form="atualizacao" id="optSelect" value="<?php echo "id".$contDia['id']?>"></option>
            <?php } ?>
        </select>
            <input type="hidden" id="id" name="ids" form="atualizacao"/>
            <input type="hidden" id="idTran" name="idTrans" form="atualizacao"/>
            <br/>
            <label for="nomeEditado">Se quiser editar o nome existente edite aqui: </label>
            <input type="text" id="nomeEditar" name="nomeEditado" form="atualizacao" value=""/>
            <br/>
            <label for="pessoa">Ou cadastre um novo estudante aqui</label>
            <input type="text" id="pessoa" name="pessoas" form="atualizacao" placeholder="para estudante novo digite aqui"/>
            <br/>
            <label for="apelido">Apelido: </label>
            <input type="text" id="apelido" name="apelidos" form="atualizacao" value="" placeholder="*opcional"/>
            <br/>
            <label for="dia">Dia do registro: </label>
            <input type="date" id="diaPadrao" name="dias" form="atualizacao" min="0" value=""/>
            <br/>
            <label for="horas">Horas: </label>
            <input type="number" id="hora" name="horas" form="atualizacao" min="0" value="" onblur="" />
            <br/>
            <label for="minutos">Minutos: </label>
            <input type="number" id="minuto" name="minutos" form="atualizacao" min="" value="" onblur=""/>
            <div id="msgMin">se nao tiver minutos avulsos deixe este campo minutos vazio</div>
            <br/>
            <label for="revisitas">Revisitas: </label>
            <input type="number" id="revisita" name="revisitas" form="atualizacao" value=""/>
            <br/>
            <label for="revistas">Revistas: </label>
            <input type="number" id="revista" name="revistas" form="atualizacao" value=""/>
            <br/>
            <label for="livros">Livros: </label>
            <input type="number" id="livro" name="livros" form="atualizacao" value=""/>
            <br/>
            <label for="broxuras">Broxuras: </label>
            <input type="number" id="broxura" name="broxuras" form="atualizacao" value=""/>
            <br/>
            <label for="observacoes">Observações do estudante: </label>
            <textarea id="observacao" name="observacoes" placeholder="Opcional" value="" form="atualizacao"></textarea>
            <br/>
            <form id="atualizacao" method="GET" action="../back/controle/insercaoPessoa.php">
                <input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" id="envia" value="Enviar!"/>
            </form>
            <div id="msg-sucesso">Atualizado com sucesso!</div>
        <!--Final formulario mes-->
    </section>
<!--conteudo proprio-->
</div>
        </main>
      </div>
</body>
<script src="funcoes.js"></script>
<script src="../node_modules/material-design-lite/material.min.js"></script>
<script src="../back/model/funcoes-cadastro-estudantes1.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</html>