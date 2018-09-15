//pega e exibe o dia
function diaHoje(){
var dia = new Date().toDateString();
document.getElementById('diaHoje').innerHTML = dia;
}
//funcao que pega dia/mes/ano atual e autopreenche a data
function valorDia(){
    var d = new Date();
    var ano = d.getFullYear(); 
    var mes = d.getMonth() + 1;
    var dia = d.getDate();
    if(mes <= 9){
        mes = "0" + mes;
    }
    if(dia <= 9){
        dia = "0" + dia;
    }
    var autoCompl = ano + "-" + mes + "-" + dia;
    document.getElementById('diaPadrao').value = autoCompl;
}
//funcao que monitora se o valor zero esta no campo, e se tiver mostra o alerta de folga
function folga(){
    setInterval(function(){
    var x1 = document.getElementById('hora').value;
    var x2 = document.getElementById('revisita').value;
    var x3 = document.getElementById('revista').value;
    var x4 = document.getElementById('livro').value;
    var x5 = document.getElementById('broxura').value;
    if(x1 == 0){
        document.getElementById("msgHora").style.display = "block";
    }else{
        document.getElementById("msgHora").style.display = "none";
    }
    if(x2 == 0){
        document.getElementById("msgRevi").style.display = "block";
    }else{
        document.getElementById("msgRevi").style.display = "none";
    }
    if(x3 == 0){
        document.getElementById("msgRev").style.display = "block";
    }else{
        document.getElementById("msgRev").style.display = "none";
    }
    if(x4 == 0){
        document.getElementById("msgLivr").style.display = "block";
    }else{
        document.getElementById("msgLivr").style.display = "none";
    }
    if(x5 == 0){
        document.getElementById("msgBrox").style.display = "block"; 
    }else{        
        document.getElementById("msgBrox").style.display = "none";
    }
    }), 5000;
}

//id e mes
//funcao captura o dia e seu id para atualizar os dados do dia
function idEdia(opcao) {
    setTimeout(function () {
        var x = opcao;
        //id
        var inicioID = x.indexOf("id")+2;
        var finalID = x.indexOf("mes");
        var corteID = x.slice(inicioID, finalID);
        document.getElementById('id').value = corteID;
        //mes
        var inicioMes = x.indexOf("mes")+3;
        var finalMes = x.indexOf("hora");
        var corteMes = x.slice(inicioMes, finalMes);
        document.getElementById('mes').value = corteMes;
        //horas
        var inicioHr = x.indexOf("ora")+3;
        var finalHr = x.indexOf("revisita");
        var corteHr = x.slice(inicioHr, finalHr);
        document.getElementById("hora").value = corteHr; 
        //revisitas
        var inicioRevi = x.indexOf("sita")+4;
        var finalRevi = x.indexOf("revista");
        var corteRevi = x.slice(inicioRevi, finalRevi);
        document.getElementById("revisita").value = corteRevi; 
        //revistas
        var inicioRev = x.indexOf("sta")+3;
        var finalRev = x.indexOf("livro");
        var corteRev = x.slice(inicioRev, finalRev);
        document.getElementById("revista").value = corteRev; 
        //livros
        var inicioLivr = x.indexOf("vro")+3;
        var finalLivr = x.indexOf("broxura");
        var corteLivr = x.slice(inicioLivr, finalLivr);
        document.getElementById("livro").value = corteLivr; 
        //broxuras
        var inicioBrox = x.indexOf("xura")+4;
        var finalBrox = x.length;
        var corteBrox = x.slice(inicioBrox, finalBrox);
        document.getElementById("broxura").value = corteBrox; 
    }), 1000;
}

//instancia dos options com seus respectivos dados vindo do banco
var id = document.querySelector('select[id="escolhaMes"]');
//evento ativado pelo select > option que pega o valor do select e repassa
id.onchange = function () {
    var opcao = id.value;
    if (opcao == "Selecione...") {
        opcao = "";
    }
    idEdia(opcao);
}

//exibe a mensagem de sucesso apos atualizar dados
var voltou = window.sessionStorage.getItem('pagina');
var enviaBtn = document.getElementById('envia');
var optData = document.getElementById('escolhaMes');
var flag = false;
//evento ativado pelo select > option, ativa a flag
function flegear(){
    return flag = true;
}
//dispara o evento flegear
optData.addEventListener("change", flegear);
//funcao que testa se o navegador tem tem armazenado no local storage o valor da pagina de conexao do banco, se o valor do seletor de data esta em alguma data, e se a flag esta true para poder ativar a mensagem de sucesso!
function recolhe(){
    setTimeout(function(){
        if(flag == true){
            function sucesso() {
                document.getElementById("msg-sucesso").style.display = "block";
                setTimeout(function(){
                    escolhaMes.options[0].selected="selected";
                    document.getElementById("id").value = "";
                    document.getElementById("mes").value = "";
                    document.getElementById("hora").value = "1";
                    document.getElementById("revisita").value = "1";
                    document.getElementById("revista").value = "1";
                    document.getElementById("livro").value = "1";
                    document.getElementById("broxura").value = "1";
                    document.getElementById("msg-sucesso").style.display = "none";
                }, 5000);
            }
            sucesso();
        }else{
            document.getElementById('msg-sucesso').style.display = "none";
        }
    },1000);
}
//dispara a funcao recolhe para enviar ao banco de dados
enviaBtn.addEventListener("click", recolhe);

//funcao captura os dados gerais do ano para preencher as metas
var optSelect = document.getElementById('optAno');
totMetaAnual(optSelect)
function totMetaAnual(opcao) {
    setTimeout(function () {
        var x = opcao.value;
        //horas
        var inicioID = x.indexOf("oras")+4;
        var finalID = x.indexOf("minutos");
        var corteID = x.slice(inicioID, finalID);
        document.getElementById('metaAnualHor').value = corteID;
        //revisitas
        var inicioHr = x.indexOf("itas")+4;
        var finalHr = x.indexOf("revistas");
        var corteHr = x.slice(inicioHr, finalHr);
        document.getElementById("metaAnualRevi").value = corteHr; 
        //revistas
        var inicioRevi = x.indexOf("stas")+4;
        var finalRevi = x.indexOf("livros");
        var corteRevi = x.slice(inicioRevi, finalRevi);
        document.getElementById("metaAnualRev").value = corteRevi; 
        //livros
        var inicioRev = x.indexOf("vros")+4;
        var finalRev = x.indexOf("broxuras");
        var corteRev = x.slice(inicioRev, finalRev);
        document.getElementById("metaAnualLivr").value = corteRev; 
        //broxuras
        var inicioBrox = x.indexOf("uras")+4;
        var finalBrox = x.length;
        var corteBrox = x.slice(inicioBrox, finalBrox);
        document.getElementById("metaAnualBrox").value = corteBrox; 
    }), 1000;
}




//cria divs dinamicas vindas do php para enviar via formulario
/*function criaId(){
    var x = document.getElementById('idDia');
    var y = document.getElementById('dia');
    var c = 2;
    var d = 2018-06-06;
    x.insertAdjacentHTML("afterend", "<input type='text' name='id' form='atualizacao'/>");
    y.insertAdjacentHTML("afterend", "<input type='text' name='dia' form='atualizacao'/>");
}*/
//funcoes que criam dinamicamente novos campos html e auto renomeia com uma id unica
//(FUNCOES GUARDADAS PARA O FUTURO)
/*var contHor = 0;
var contMIn = 0;
var contRev = 0;
var contRevis = 0;
var contLivr = 0;
var contBrox = 0;
var contPess = 0;
var flag = false;
//cria novos campos das horas
function maisHors(){
    var totalInputHora = [];
    var horaTotal = 0;
    var x = document.getElementById("hora0");
    var horDinamica = parseInt(document.getElementById("hora"+contHor).value);
    var aux = horDinamica;
    contHor += 1;
    x.insertAdjacentHTML("afterend", "<input type='number' id='hora" + contHor + "' name='horas[]=" + contHor + "' placeholder='Digite o nome' form='dados' min='0' max='24' value='13' onblur=''/>");
    for(var i = 0; i <= contHor; i++){
        totalInputHora[0] = aux;
        totalInputHora[i] = horDinamica;
        console.log(totalInputHora[i]);
    }
    function somaHora(){
        for(var i = 0; i < totalInputHora.length; i++){
            horaTotal += totalInputHora[i];
            console.log(totalInputHora[i]);
        }
        console.log(horaTotal);
    }
    somaHora();
}
function maisMins(){
    var x = document.getElementById("minuto");
    contMIn += 1;
    x.insertAdjacentHTML("afterend", "<input type='number' id='minuto" + contMIn + "' name='minutos[]=" + contMIn + "' form='dados' min='0' max='60' value='0'/>");
}
function maisRev(){
    var x = document.getElementById("revisita");
    contRev += 1;
    x.insertAdjacentHTML("afterend", "<input type='number' id='revisita" + contRev + "' name='revisitas[]=" + contRev + "' form='dados' value='0'/>");
}
function maisRevis(){
    var x = document.getElementById("revista");
    contRevis += 1;
    x.insertAdjacentHTML("afterend", "<input type='number' id='revista" + contRevis + "' name='revistas[]=" + contRevis + "' form='dados' value='0'/>");
}
function maisLivr(){
    var x = document.getElementById("livro");
    contLivr += 1;
    x.insertAdjacentHTML("afterend", "<input type='number' id='livro" + contLivr + "' name='livros[]=" + contLivr + "' form='dados' value='0'/>");
}
function maisBrox(){
    var x = document.getElementById("broxura");
    contBrox += 1;
    x.insertAdjacentHTML("afterend", "<input type='number' id='broxura" + contBrox + "' name='broxuras[]=" + contBrox + "' form='dados' value='0'/>");
}
function maisPess(){
    var x = document.getElementById("pessoa");
    contPess += 1;
    x.insertAdjacentHTML("afterend", "<input type='text' id='pessoa" + contPess + "' name='pessoas[]=" + contPess + "' form='dados' placeholder='Digite o nome'/>");
}*/