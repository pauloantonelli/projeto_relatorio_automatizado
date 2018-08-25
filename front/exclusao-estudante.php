<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Deletar cadastro estudante</title>
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
<body>
<div class="demo-layout-waterfall mdl-layout mdl-js-layout">
        <header class="mdl-layout__header mdl-layout__header--waterfall">
          <!-- Top row, always visible -->
          <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Deletar cadastro estudante</span>
            <div class="mdl-layout-spacer"></div>
          </div>
        </header>
        <div class="mdl-layout__drawer">
          <span class="mdl-layout-title">Deletar cadastro estudante</span>
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

    <section class="exclui-estudante">
        <?php 
        $conectId = mysqli_connect('localhost','root','','relatorio');
        mysqli_select_db($conectId,"pessoa");
        $queryId = mysqli_query($conectId, "SELECT * FROM pessoa");
        mysqli_select_db($conectId,"regPessoa");
        $queryRegis = mysqli_query($conectId, "SELECT id FROM regPessoa");
        ?>
        <h1>Administração dos estudantes</h1>
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
            <input type="hidden" id="edito" name="editou" value="ok" form="atualizacao"/>
            <br/>
            <h1>Se quiser somente editar algum dado do estudante edite aqui: </h1>
            <label for="nomeEditado">Nome: </label>
            <br/>
            <input type="text" id="nomeEditar" name="nomeEditado" form="atualizacao" value=""/>
            <br/>
            <label for="apelido">Apelido: </label>
            <br/>
            <input type="text" id="apelido" name="apelidos" form="atualizacao" value="" placeholder="*opcional"/>
            <br/>
            <form id="atualizacao" method="GET" action="../back/controle/exclui-estudante.php">
                <input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" id="edita" value="Editar!"/>
            </form>
        <div id="msg-sucesso-edicao">Atualizado com sucesso!</div>
        <!--Final formulario-->
            <hr/>
        <h1 id="warningEstudante">Atenção!</h1>
        <h2>Se quiser deletar permanentemente esse estudante, use o botão abaixo!</h2>
        <br/>
        <input type="hidden" id="idCopy" name="idsCopy" form="deletando"/>
        <input type="hidden" id="edito" name="editou" value="nao" form="deletando"/>
        <form id="deletando" method="GET" action="../back/controle/exclui-estudante.php">
            <input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" id="delet" value="Deletar!"/>
        </form>
        <div id="msg-sucesso-delete">Excluido com sucesso!</div>
    </section>
<!--conteudo proprio-->
</div>
        </main>
      </div>
</body>
<script src="../node_modules/material-design-lite/material.min.js"></script>
<script src="../back/model/funcoes-exclusao-estudantes.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</html>