<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inserção de horas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="css/entrada.css"/>
</head>
<body onload="diaHoje()">
        <?php 
        $conectDia = mysqli_connect('localhost','root','','relatorio');
        mysqli_select_db($conectDia,"entrada");
        $queryDia = mysqli_query($conectDia, "SELECT * FROM entrada");
        ?>
    <section>
        <h1>Administração dos dias</h1>
        <h2>dia</h2><h2 id="diaHoje"></h2>
        <!--Inicio formulario mes-->
        <label>Escolha o estudante: </label>
        <select id="escolhaDia">
            <option selected>Selecione...</option>
            <!--contador while enquanto houver registros ele continua no loopin-->
            <?php while($diaId = mysqli_fetch_array($queryDia)) { ?>
                <option form="atualizacao" id="optSelectDia" value="<?php echo "id".$diaId['idDia']."dia".$diaId['dia']."horas".$diaId['horas']."minutos".$diaId['minutos']."revisitas".$diaId['revisitas']."revistas".$diaId['revistas']."livros".$diaId['livros']."broxuras".$diaId['broxuras']."obs".$diaId['observacoes']?>"><?php echo $diaId['dia']?></option>
            <?php } ?>
        </select>
            <input type="hidden" id="id" name="ids" form="atualizacao"/>
            <br/>
            <h3>Se quiser somente editar algum dado do dia <p id="estudanteDeleta"></p>edite aqui: </h3>
            <label for="dias">Dia: </label>
            <br/>
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
            <textarea id="ob" name="obs" form="atualizacao" value="" placeholder="*opcional"/></textarea>
            <br/>

            <form id="atualizacao" method="GET" action="../back/controle/exclui-entrada.php">
                <input type="submit" id="edita" value="Editar!"/>
            </form>
        <div id="msg-sucesso">Atualizado com sucesso!</div>
        <!--Final formulario-->
            <hr/>
        <h2>Atenção!</h2>
        <h3>Se quiser deletar permanentemente <p id="estudanteDeleta"></p> use o botão abaixo!</h3>
        <br/>
        <form id="deletando" method="GET" action="../back/controle/exclui-entrada.php">
        <input type="hidden" id="edito" name="editou" value="nao" form="deletando"/>
        <input type="hidden" id="idCopy" name="idsCopy" form="deletando"/>
        <input type="submit" id="delet" value="Deletar!"/>
        </form>
    </section>
</body>
<script src="../back/model/funcoes-exclusao-entrada1.js"></script>
</html>