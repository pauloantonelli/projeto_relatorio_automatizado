<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar Revisitas dos estudantes</title>
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
<body onload="minAlert()">
<div class="demo-layout-waterfall mdl-layout mdl-js-layout">
        <header class="mdl-layout__header mdl-layout__header--waterfall">
          <!-- Top row, always visible -->
          <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Editar Revisitas dos estudantes</span>
            <div class="mdl-layout-spacer"></div>
          </div>
        </header>
        <div class="mdl-layout__drawer">
          <span class="mdl-layout-title">Editar Revisitas dos estudantes</span>
          <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="index.php">Editar Revisitas dos estudantes</a>
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

    <section class="atualiza-estudantes">
        <?php 
        $conectId = mysqli_connect('localhost','root','','relatorio');
        mysqli_select_db($conectId,"pessoa");
        mysqli_select_db($conectId, "regpessoa");
        $queryId = mysqli_query($conectId, "SELECT * from pessoa");

        $queryDia = mysqli_query($conectId, "SELECT p.*, r.* 
            from pessoa as p inner join regpessoa as r 
            on p.id = r.idpessoa
            order by p.nome;");
        ?>
        <h1>Revisitas dos estudantes</h1>
        <!--Inicio formulario-->
        <label>Escolha uma data para modificar: </label>
        <select id="escolhaEstudante">
            <option selected>Selecione...</option>
            <!--contador while enquanto houver registros ele continua no loopin-->
            <?php
            while($dia = mysqli_fetch_array($queryDia)) { ?>
                <option form="atualizacao" id="optSelect" value="<?php echo "idTransacao".$dia['id']."idPessoa".$dia['idPessoa']."dia".$dia['dia']."nome".$dia['nome']."apelido".$dia['apelido']."horas".$dia['horasPessoa']. "minutos".$dia['minutosPessoa']. "revisitas".$dia['revisitasPessoa']. "revistas".$dia['revistasPessoa']. "livros".$dia['livrosPessoa']. "broxuras".$dia['broxurasPessoa']. "obs".$dia['observacoes']?>"><?php echo "Dia: ".$dia['dia']." - Estudante: ".$dia['nome']?></option>
            <?php } ?>
        </select>
            <input type="hidden" id="id" name="id" form="atualizacao" readonly/>
            <input type="hidden" id="identPessoa" name="idPessoa" form="atualizacao" readonly/>
            <br/>
            <label for="dia">Dia escolhido: </label>
            <input type="date" id="diaEscolhido" name="dia" form="atualizacao" min="0" value=""/>
            <br/>
            <label for="nome">Estudante: </label>
            <input type="text" id="nomePessoa" name="nome" form="atualizacao" min="0" value="" readonly/>
            <br/>
            <label for="horas">Horas usadas nesse estudante: </label>
            <input type="number" id="hora" name="horasPessoa" form="atualizacao" min="0" value="0" onblur="" required/>
            <br/>
            <label for="minutos">Minutos usados nesse estudante: </label>
            <input type="number" id="minuto" name="minutosPessoa" min="0" form="atualizacao" value="0"/>
            <br/>
            <div id="msgMin">se nao tiver minutos avulsos deixe este campo minutos em 0 ou vazio</div>
            <label for="revisitas">Revisitas usados nesse estudante: </label>
            <input type="number" id="revisita" name="revisitasPessoa" form="atualizacao" value="0"/>
            <br/>
            <label for="revistas">Revistas usados nesse estudante: </label>
            <input type="number" id="revista" name="revistasPessoa" form="atualizacao" value="0"/>
            <br/>
            <label for="livros">Livros usados nesse estudante: </label>
            <input type="number" id="livro" name="livrosPessoa" form="atualizacao" value="0"/>
            <br/>
            <label for="broxuras">Broxuras usados nesse estudante: </label>
            <input type="number" id="broxura" name="broxurasPessoa" form="atualizacao" value="0"/>
            <br/>
            <label for="observacoes">Observações do estudante: </label>
            <textarea id="observacao" name="observacoes" placeholder="Opcional" value="" form="atualizacao"></textarea>
            <br/>
            <form id="atualizacao" method="GET" action="../back/controle/atualiza-estudantes.php">
                <input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" id="envia" value="Enviar!"/>
            </form>
            <div id="msg-sucesso">Atualizado com sucesso!</div>
        <!--Final formulario-->
    </section>
<!--conteudo proprio-->
</div>
        </main>
      </div>
</body>
<script src="../node_modules/material-design-lite/material.min.js"></script>
<script src="../back/model/funcoes-atualizacao-estudantes.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</html>