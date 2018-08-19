<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar registro relatório</title>
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
<body onload="folga()">
<div class="demo-layout-waterfall mdl-layout mdl-js-layout">
        <header class="mdl-layout__header mdl-layout__header--waterfall">
          <!-- Top row, always visible -->
          <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Editar registro relatório</span>
            <div class="mdl-layout-spacer"></div>
          </div>
        </header>
        <div class="mdl-layout__drawer">
          <span class="mdl-layout-title">Editar registro relatório</span>
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

    <section class="atualiza-entrada">
        <?php 
        $conectId = mysqli_connect('localhost','root','','relatorio');
        mysqli_select_db($conectId,"entrada");
        $queryId = mysqli_query($conectId, "SELECT * FROM entrada");
        ?>
        <h1>Edição do Relatório</h1>
        <!--Inicio formulario-->
        <label>Escolha o dia para modificar: </label>
        <select id="escolhaDia">
            <option selected>Selecione...</option>
            <!--contador while enquanto houver registros ele continua no loopin-->
            <?php while($diaId = mysqli_fetch_array($queryId)) { ?>
                <option form="atualizacao" id="optSelect" value="<?php echo "idDia".$diaId['idDia']."dia".$diaId['dia']."horas".$diaId['horas']."minutos".$diaId['minutos']."revisitas".$diaId['revisitas']."revistas".$diaId['revistas']."livros".$diaId['livros']."broxuras".$diaId['broxuras']."obs".$diaId['observacoes']?>"><?php echo $diaId['dia']?></option>
            <?php } ?>
        </select>
            <input type="text" id="id" name="idDia" form="atualizacao"/>
            <input type="text" id="dia" name="dia" form="atualizacao"/>
            <br/>
            <label for="horas">Suas horas total do dia: </label>
            <input type="number" id="hora" name="horas" form="atualizacao" min="0" value="0" onblur="" required/>
            <br/>
            <label for="minutos">Seus minutos avulsos do dia: </label>
            <input type="number" id="minuto" name="minutos" min="0" form="atualizacao" value="0"/>
            <br/>
            <div id="msg">Aviso! 0 horas e 0 minutos no mesmo registro significa dia de folga</div>
            <label for="revisitas">Total de revisitas do dia: </label>
            <input type="number" id="revisita" name="revisitas" form="atualizacao" value="0"/>
            <br/>
            <label for="revistas">Total de revistas: </label>
            <input type="number" id="revista" name="revistas" form="atualizacao" value="0"/>
            <br/>
            <label for="livros">Total de livros: </label>
            <input type="number" id="livro" name="livros" form="atualizacao" value="0"/>
            <br/>
            <label for="broxuras">Total de broxuras: </label>
            <input type="number" id="broxura" name="broxuras" form="atualizacao" value="0"/>
            <br/>
            <label for="observacoes">Observações do dia: </label>
            <textarea id="observacao" name="observacoes" placeholder="Opcional" value="" form="atualizacao"></textarea>
            <br/>
            <form id="atualizacao" method="GET" action="../back/controle/atualiza-entrada.php">
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
<script src="funcoes.js"></script>
<script src="../node_modules/material-design-lite/material.min.js"></script>
<script src="../back/model/funcoes-atualizacao-entrada1.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</html>