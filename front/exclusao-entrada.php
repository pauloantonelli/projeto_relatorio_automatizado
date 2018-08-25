<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Deletar registro relatório</title>
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
            <span class="mdl-layout-title">Deletar registro relatório</span>
            <div class="mdl-layout-spacer"></div>
          </div>
        </header>
        <div class="mdl-layout__drawer">
          <span class="mdl-layout-title">Deletar registro relatório</span>
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

    <section class="exclui-entrada">
        <?php 
        $conectDia = mysqli_connect('localhost','root','','relatorio');
        mysqli_select_db($conectDia,"entrada");
        $queryDia = mysqli_query($conectDia, "SELECT * FROM entrada");
        ?>
        <h1>Administração dos dias</h1>
        <!--Inicio formulario mes-->
        <label>Escolha o dia: </label>
        <select id="escolhaDia">
            <option selected>Selecione...</option>
            <!--contador while enquanto houver registros ele continua no loopin-->
            <?php while($diaId = mysqli_fetch_array($queryDia)) { ?>
                <option form="atualizacao" id="optSelectDia" value="<?php echo "id".$diaId['idDia']."dia".$diaId['dia']."horas".$diaId['horas']."minutos".$diaId['minutos']."revisitas".$diaId['revisitas']."revistas".$diaId['revistas']."livros".$diaId['livros']."broxuras".$diaId['broxuras']."obs".$diaId['observacoes']?>"><?php echo $diaId['dia']?></option>
            <?php } ?>
        </select>
            <input type="hidden" id="id" name="ids" form="atualizacao"/>
            <input type="hidden" id="edito" name="editou" value="ok" form="atualizacao"/>
            <br/>
            <h1>Se quiser somente editar algum dado do dia edite aqui: </h1>
            <input type="date" id="dia" name="dias" form="atualizacao" value=""/>
            <br/>
            <label for="horas">Horas: </label>
            <br/>
            <input type="text" id="hora" name="horas" form="atualizacao" value="" placeholder="*opcional"/>
            <br/>
            <label for="minutos">Minutos: </label>
            <br/>
            <input type="text" id="minuto" name="minutos" form="atualizacao" value="" placeholder="*opcional"/>
            <br/>
            <label for="revisitas">Revisitas: </label>
            <br/>
            <input type="text" id="revisita" name="revisitas" form="atualizacao" value="" placeholder="*opcional"/>
            <br/>
            <label for="revistas">Revistas: </label>
            <br/>
            <input type="text" id="revista" name="revistas" form="atualizacao" value="" placeholder="*opcional"/>
            <br/>
            <label for="livros">Livros: </label>
            <br/>
            <input type="text" id="livro" name="livros" form="atualizacao" value="" placeholder="*opcional"/>
            <br/>
            <br/>
            <label for="broxuras">Broxuras: </label>
            <br/>
            <input type="text" id="broxura" name="broxuras" form="atualizacao" value="" placeholder="*opcional"/>
            <br/>
            <br/>
            <label for="obs">Observacoes: </label>
            <br/>
            <textarea id="ob" name="obs" form="atualizacao" value="" placeholder="*opcional"></textarea>
            <br/>
            <form id="atualizacao" method="GET" action="../back/controle/exclui-entrada.php">
                <input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" id="edita" value="Editar!"/>
            </form>
            <div id="msg-sucesso-edicao">Atualizado com sucesso!</div>
        <!--Final formulario-->
            <hr/>
        <h1 id="warningEstudante">Atenção!</h1>
        <h2>Se quiser deletar permanentemente use o botão abaixo!</h2>
        <br/>
        <input type="hidden" id="idCopy" name="idsCopy" form="deletando"/>
        <input type="hidden" id="edito" name="editou" value="nao" form="deletando"/>
        <form id="deletando" method="GET" action="../back/controle/exclui-entrada.php">
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
<script src="../back/model/funcoes-exclusao-entrada.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</html>