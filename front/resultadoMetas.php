<?php
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

//seleciona os dados da meta anual
$queryAno = mysqli_query($conectAnual, "SELECT * FROM metaAnual");
$queryMes = mysqli_query($conectMensal, "SELECT * FROM metaMensal");
$queryPessoa = mysqli_query($conectPessoa, "SELECT * FROM pessoa");
$queryEntrada = mysqli_query($conectEntrada, "SELECT * FROM entrada");
?>
<!--formulário em html com o select dos dados-->
<form name="metaAnual" method="GET" action="">
  <label>Meta Anual</label>
  <select id="anualMeta">
    <option>Selecione...</option>
<!--contador while enquanto houver registros ele continua no loopin-->
    <?php while($metaAno = mysqli_fetch_array($queryAno)) { ?>
    <option class="ano" value="<?php echo " Ano: " . $metaAno['idAno'] . " Horas pretendidas: " . $metaAno['hora'] . " Revisitas pretendidas: " . $metaAno['revisita'] . " Revistas pretendidas: " . $metaAno['revista'] . " Livros pretendidos: " . $metaAno['livro'] . " Broxuras pretendidas: " . $metaAno['broxura']?>"><?php echo $metaAno['idAno'] ?></option>
    <?php } ?>
  </select>
  <div id="metaDoAno"></div>
  <div id="metaHoraAno"></div>
  <div id="metaReviAno"></div>
  <div id="metaRevAno"></div>
  <div id="metaLivrAno"></div>
  <div id="metaBroxAno"></div>
<hr/>

  <label>Meta Mensal</label>
  <select id="mensalMeta">
    <option>Selecione...</option>
<!--contador while enquanto houver registros ele continua no loopin-->
    <?php while($metaMes = mysqli_fetch_array($queryMes)) { ?>
      <option id="optMes" class="mes" value="<?php echo " Mes:" . $metaMes['idMes'] . " Horas pretendidas: " . $metaMes['hora'] . " Revisitas pretendidas: " . $metaMes['revisita'] . " Revistas pretendidas: " . $metaMes['revista'] . " Livros pretendidos: " . $metaMes['livro'] . " Broxuras pretendidas: " . $metaMes['broxura']?>"><?php echo $metaMes['mes'] ?></option>
    <?php } ?>
  </select>
  <div id="metaDoMes"></div>
  <div id="metaHoraMes"></div>
  <div id="metaReviMes"></div>
  <div id="metaRevMes"></div>
  <div id="metaLivrMes"></div>
  <div id="metaBroxMes"></div>
<hr/>

<label>Estudantes</label>
  <select id="estudantes">
    <option>Selecione...</option>
<!--contador while enquanto houver registros ele continua no loopin-->
    <?php while($pessoa = mysqli_fetch_array($queryPessoa, MYSQLI_ASSOC)) { ?>
      <option class="estudantes" value='<?php echo "id" . $pessoa["id"]."Nome: " . $pessoa["nome"]."Apelido: ".$pessoa["apelido"]?>'><?php echo $pessoa['nome'] ?></option>
    <?php } ?>
  </select>
  <div id="nomeEstudante"></div>
  <div id="apelidoEstudante"></div>
<hr/>

<label>Dia a Dia</label>
  <select id="diario">
    <option>Selecione...</option>
<!--contador while enquanto houver registros ele continua no loopin-->
    <?php while($entrada = mysqli_fetch_array($queryEntrada, MYSQLI_ASSOC)) { ?>
    <option class="diario" value="<?php echo "idDia".$entrada['idDia']."dia: ".$entrada['dia']."Horas: ".$entrada['horas']."Minutos: ".$entrada['minutos']."Revisitas: ".$entrada['revisitas']."Revistas: ".$entrada['revistas']."Livros: ".$entrada['livros']."Broxuras: ".$entrada['broxuras']."Observacoes: ".$entrada['observacoes']?>"><?php echo $entrada['dia'] ?></option>
    <?php } ?>
  </select>
  <div id="hora"></div>
  <div id="minutos"></div>
  <div id="revisitas"></div>
  <div id="revistas"></div>
  <div id="livros"></div>
  <div id="broxuras"></div>
  <div id="obs"></div>
<hr/>
</form>
<div id="msg"></div>
<script type="text/javascript" src="../front/view-relatorio/metaAnual.js"></script>
<script type="text/javascript" src="../front/view-relatorio/metaMensal.js"></script>
<script type="text/javascript" src="../front/view-relatorio/estudantes1.js"></script>
<script type="text/javascript" src="../front/view-relatorio/diario1.js"></script>

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