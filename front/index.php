<?php
date_default_timezone_set('America/Sao_Paulo');//seta o horario padrao de brasilia para todos os scripts que usam hora
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
$ano = date("Y", time());
$mes = date("m", time());
$mes_desc = date('F', time());
$hora_envio = date("H:i:s", time());//time()chama a time zone definida como padrao

//conexao com meta anual /
$conectAnual = mysqli_connect('localhost','root','','relatorio');
mysqli_select_db($conectAnual,"metaanual");
//conexao com meta mensal
$conectMensal = mysqli_connect('localhost','root','','relatorio');
mysqli_select_db($conectMensal,"metamensal");
//conexao com pessoa
$conectPessoa = mysqli_connect('localhost','root','','relatorio');
mysqli_select_db($conectPessoa,"pessoa");
//conexao com entrada
$conectEntrada = mysqli_connect('localhost','root','','relatorio');
mysqli_select_db($conectEntrada,"entrada");
//conexao com soma entrada
$conectSoma = mysqli_connect('localhost','root','','relatorio');
mysqli_select_db($conectSoma,"entrada");
//conexao estudantes
$conectEstudante = mysqli_connect('localhost','root','','relatorio');
mysqli_select_db($conectEstudante,"pessoa");

//seleciona os dados da meta anual
$queryAno = mysqli_query($conectAnual, "SELECT * FROM metaAnual");
$queryMes = mysqli_query($conectMensal, "SELECT * FROM metaMensal");
$queryPessoa = mysqli_query($conectPessoa, "SELECT * FROM pessoa");
$queryEntrada = mysqli_query($conectEntrada, "SELECT * FROM entrada");
//criar query com soma para retornar os valores direto do banco somados
$querySoma = mysqli_query($conectSoma, "SELECT sum(horas), sum(minutos), sum(revisitas), sum(revistas), sum(livros), sum(broxuras) 
FROM entrada WHERE YEAR(dia) = $ano AND MONTH(dia) = $mes;");

//query com soma para retornar os valores direto do banco somados
$queryEstudante = mysqli_query($conectSoma, "SELECT count(nome) FROM pessoa;");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Consultar Relatório</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/entrada.css"/>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.purple-deep_purple.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/entrada.css"/>
    <link rel="stylesheet" href="css/reset-inicial.css"/>
    <link rel="stylesheet" href="css/estrutura-corpo.css"/>
    <link rel="stylesheet" href="css/detalhes-menu.css"/>
    <link rel="stylesheet" href="css/progress-metas.css"/>
    <link href="main.css?version=12"/><!--engana o cache do navegador para atualizar sempre-->
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
            <span class="mdl-layout-title">Consultar Relatório</span>
            <div class="mdl-layout-spacer"></div>
          </div>
        </header>
        <div class="mdl-layout__drawer">
          <span class="mdl-layout-title">Consultar Relatório</span>
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

  <section>
  <!--tabela superior com relatorio final-->
    <div class="relatorio-resumido">
      <h1>Relatório de Serviço de campo</h1>
      <div class="nomeRelatorio">Aparecida de fátima albino</div>
      <div class="divRel">
      <!--contador while enquanto houver registros ele continua no loopin-->
        <!--div com dados do relatorio geral somados-->
        <?php while($soma = mysqli_fetch_array($querySoma)) { ?>
          <div id="soma"><?php echo "horas".$soma['sum(horas)']."minutos".$soma['sum(minutos)']."revisitas".$soma['sum(revisitas)']."revistas".$soma['sum(revistas)']."livros".$soma['sum(livros)']."broxuras".$soma['sum(broxuras)'] ?></div>
        <?php } ?>

        <!--div com dados do relatorio geral somados-->
        <?php while($estudante = mysqli_fetch_array($queryEstudante)) { ?>
          <div id="estudantes"><?php echo "estudos".$estudante['count(nome)'] ?></div>
        <?php } ?>
        
        <div class="labelRel">Mês:</div><div id="mes" class="infoRel"><?php echo strftime("%B"); ?></div>
      </div>
      <div class="divRel">
        <div class="labelRel">Publicações:</div><div id="pub" class="infoRel">--</div>
      </div>
      <div class="divRel">
        <div class="labelRel">Videos mostrados:</div><div id="mostrVideo" class="infoRel">[em breve]</div>
      </div>
      <div class="divRel">
        <div class="labelRel">Horas: </div><div id="horas" class="infoRel">--</div>
      </div>
      <div class="divRel">
        <div class="labelRel">Revisitas: </div><div id="revisitas" class="infoRel">--</div>
      </div>
      <div class="divRel">
        <div class="labelRel">Estudos Biblicos: </div><div id="estudos" class="infoRel">--</div>
      </div>
    </div>
    <hr class="linha-divisao-Rel"/>
    <!--formulário em html com o select dos dados-->
    <form class="results" name="metaAnual" method="GET" action="">
      <label>Consultar meta Anual</label>
      <br/>
      <select id="anualMeta">
        <option>Selecione...</option>
    <!--contador while enquanto houver registros ele continua no loopin-->
        <?php while($metaAno = mysqli_fetch_array($queryAno)) { ?>
        <option class="ano" value="<?php echo " Ano: " . $metaAno['idAno'] . " Horas pretendidas: " . $metaAno['hora'] . " Revisitas pretendidas: " . $metaAno['revisita'] . " Revistas pretendidas: " . $metaAno['revista'] . " Livros pretendidos: " . $metaAno['livro'] . " Broxuras pretendidas: " . $metaAno['broxura']?>"><?php echo $metaAno['idAno'] ?></option>
        <?php } ?>
      </select>
      <div class="apoio_fundo">
        <div class="results" id="metaDoAno"></div>
        <div class="results" id="metaHoraAno"></div>
        <div id="progressAnual">
          <div id="progressHoraAnual">--</div>
        </div>
        <div class="results" id="metaReviAno"></div>
        <div id="progressAnual">
          <div id="progressReviAnual">--</div>
        </div>
        <div class="results" id="metaRevAno"></div>
        <div id="progressAnual">
          <div id="progressRevAnual">--</div>
        </div>
        <div class="results" id="metaLivrAno"></div>
        <div id="progressAnual">
          <div id="progressLivrAnual">--</div>
        </div>
        <div class="results" id="metaBroxAno"></div>
        <div id="progressAnual">
          <div id="progressBroxAnual">--</div>
        </div>
        <br/>
      </div>
      <hr class="linha-divisao"/>
      <label>Consultar meta Mensal</label>
      <br/>
      <select id="mensalMeta">
        <option value="raizMes">Selecione...</option>
    <!--contador while enquanto houver registros ele continua no loopin-->
        <?php while($metaMes = mysqli_fetch_array($queryMes)) { ?>
          <option id="optMes" class="mes" value="<?php echo " Mes:" . $metaMes['idMes'] . " Horas pretendidas: " . $metaMes['hora'] . " Revisitas pretendidas: " . $metaMes['revisita'] . " Revistas pretendidas: " . $metaMes['revista'] . " Livros pretendidos: " . $metaMes['livro'] . " Broxuras pretendidas: " . $metaMes['broxura']?>"><?php echo $metaMes['mes'] ?></option>
        <?php } ?>
      </select>
      <div class="apoio_fundo">
        <div class="results" id="metaDoMes"></div>
        <div class="results" id="metaHoraMes"></div>
        <div id="progressMensal">
          <div id="progressHoraMes">--</div>
        </div>
        <div class="results" id="metaReviMes"></div>
        <div id="progressMensal">
          <div id="progressReviMes">--</div>
        </div>
        <div class="results" id="metaRevMes"></div>
        <div id="progressMensal">
          <div id="progressRevMes">--</div>
        </div>
        <div class="results" id="metaLivrMes"></div>
        <div id="progressMensal">
          <div id="progressLivrMes">--</div>
        </div>
        <div class="results" id="metaBroxMes"></div>
        <div id="progressMensal">
          <div id="progressBroxMes">--</div>
        </div>
        <br/>
      </div>
      <hr class="linha-divisao"/>
    </form>
    <script type="text/javascript" src="../front/view-relatorio/metaAnual.js"></script>
    <script type="text/javascript" src="../front/view-relatorio/metaMensal.js"></script>
    <script type="text/javascript" src="../front/view-relatorio/diario.js"></script>
  </section>
<!--conteudo proprio-->
</div>
        </main>
      </div>
</body>
<script src="../node_modules/material-design-lite/material.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</html>

 <!--
  $rs = mysqli_query($conectPessoa,'SELECT nome from pessoa');
  $result = array();
  while($row = mysqli_fetch_object($rs)){
      array_push($result, $row);
  }
  
  echo json_encode($result);
  //
  $sth = mysqli_query($conectPessoa, "select * from pessoa");
  $row = array();
  while($r = mysqli_fetch_assoc($sth)){
    $row[] = $r;
  }
  echo (json_encode($row));
 //
  $mysqli = $conectPessoa;
  $resultado = mysqli_query($mysqli, "SELECT * FROM pessoa");
  $data = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
  var_dump(json_encode($data));
  file_put_contents("file.json", json_encode($data));
  /*
  $meus_dados = array();
  for($i = 0; $i < 3; $i++){
    $meus_dados[$i]['nome'] = "nome".($i + 1);
    $meus_dados[$i]['apelido'] = "apelido".($i + 1);
    $meus_dados[$i]['observacoes'] = "observacoes".($i + 1);
  }
  echo json_encode($meus_dados);-->