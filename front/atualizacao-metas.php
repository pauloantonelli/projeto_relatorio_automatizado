<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Atualizar metas(mês a mês)</title>
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
            <span class="mdl-layout-title">Atualizar metas(mês a mês)</span>
            <div class="mdl-layout-spacer"></div>
          </div>
        </header>
        <div class="mdl-layout__drawer">
          <span class="mdl-layout-title">Atualizar metas(mês a mês)</span>
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

    <section class="atualiza-metas">
        <?php 
        $ano = date("Y", time());

        $conectId = mysqli_connect('localhost','root','','relatorio');
        mysqli_select_db($conectId,"metamensal");
        $queryId = mysqli_query($conectId, "SELECT * FROM metamensal");
        
        //conecta para fazer a atualizacao de entrada
        $conectAno = mysqli_connect('localhost','root','','relatorio');
        mysqli_select_db($conectAno,"metamensal");

        //criar query com soma para retornar os valores direto do banco somados
        $queryAno = mysqli_query($conectAno, "SELECT sum(horas), sum(minutos), sum(revisitas), sum(revistas), sum(livros), sum(broxuras) 
        FROM entrada WHERE YEAR(dia) = $ano;");
        ?>
        <h1>Atualizar metas</h1>
        <!--Inicio formulario mes-->
        <label>Escolha o mês desejado: </label>
        <select id="escolhaMes">
            <option selected>Selecione...</option>
            <!--contador while enquanto houver registros ele continua no loopin-->
            <?php while($mesId = mysqli_fetch_array($queryId)) { ?>
                <option form="atualizacao" id="optSelect" value="<?php echo "id".$mesId['idMes']."mes".$mesId['mes']."hora".$mesId['hora']."revisita".$mesId['revisita']."revista".$mesId['revista']."livro".$mesId['livro']."broxura".$mesId['broxura']?>"><?php echo $mesId['mes']?></option>
            <?php } ?>
        </select>
            <div>
            <?php while($metaAno = mysqli_fetch_array($queryAno)) { ?>
                <option form="atualizacao" id="optAno" value="<?php echo "horas".$metaAno['sum(horas)']."minutos".$metaAno['sum(minutos)']."revisitas".$metaAno['sum(revisitas)']."revistas".$metaAno['sum(revistas)']."livros".$metaAno['sum(livros)']."broxuras".$metaAno['sum(broxuras)']?>"><?php echo $mesId['mes']?></option>
            <?php } ?>
            <input type="hidden" id="metaAnualHor" name="metaAnualHors" form="atualizacao"/>
            <input type="hidden" id="metaAnualRevi" name="metaAnualRevis" form="atualizacao"/>
            <input type="hidden" id="metaAnualRev" name="metaAnualRevs" form="atualizacao"/>
            <input type="hidden" id="metaAnualLivr" name="metaAnualLivrs" form="atualizacao"/>
            <input type="hidden" id="metaAnualBrox" name="metaAnualBroxs" form="atualizacao"/>
            </div>

            <input type="hidden" id="id" name="idMes" form="atualizacao"/>
            <input type="hidden" id="mes" name="mes" form="atualizacao"/>
            <br/>
            <label for="horas">Alvo de Horas: </label>
            <input type="number" id="hora" name="horas" form="atualizacao" min="0" value="1" onblur="" required/>
            <div id="msgHora">Atenção defina pelo menos 1 hora como alvo</div>
            <br/>
            <label for="revisitas">Alvo de revisitas: </label>
            <input type="number" id="revisita" name="revisitas" form="atualizacao" value="1"/>
            <div id="msgRevi">Atenção defina pelo menos 1 revisita como alvo</div>
            <br/>
            <label for="revistas">Alvo de revistas: </label>
            <input type="number" id="revista" name="revistas" form="atualizacao" value="1"/>
            <div id="msgRev">Atenção defina pelo menos 1 revista como alvo</div>
            <br/>
            <label for="livros">Alvo de livros: </label>
            <input type="number" id="livro" name="livros" form="atualizacao" value="1"/>
            <div id="msgLivr">Atenção defina pelo menos 1 livro como alvo</div>
            <br/>
            <label for="broxuras">Alvo de broxuras: </label>
            <input type="number" id="broxura" name="broxuras" form="atualizacao" value="1"/>
            <div id="msgBrox">Atenção defina pelo menos 1 broxura como alvo</div>
            <br/>

            <form id="atualizacao" method="GET" action="../back/controle/atualiza-metas.php">
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
<script src="../node_modules/material-design-lite/material.min.js"></script>
<script src="../back/model/funcoes-atualizacao-metas.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</html>