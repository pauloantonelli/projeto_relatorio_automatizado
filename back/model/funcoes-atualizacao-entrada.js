//pega e exibe o dia
function diaHoje(){
var dia = new Date().toDateString();
document.getElementById('diaHoje').innerHTML = dia;
}
//funcao que monitora se o valor zero esta no campo, e se tiver mostra o alerta de folga
function folga(){
    setInterval(function(){
    var x = document.getElementById('hora').value;
    var y = document.getElementById('minuto').value;
    if(x == 0 && y ==0){
        document.getElementById("msg").style.display = "block";
    }else{
        document.getElementById("msg").style.display = "none";
    }
    }), 5000;
}

//id e dia
//funcao captura o dia e seu id para atualizar os dados do dia
function idEdia(opcao) {
    setTimeout(function () {
        var x = opcao;
        //id
        var inicioID = x.indexOf("Dia")+3;
        var finalID = x.indexOf("dia");
        var corteID = x.slice(inicioID, finalID);
        document.getElementById("id").value = corteID;
        //dia
        var inicioDIA = x.indexOf("dia")+3;
        var finalDIA = x.indexOf("horas");
        var corteDIA = x.slice(inicioDIA, finalDIA);
        document.getElementById("dia").value = corteDIA;
        //horas
        var inicioHr = x.indexOf("ras")+3;
        var finalHr = x.indexOf("minutos");
        var corteHr = x.slice(inicioHr, finalHr);
        document.getElementById("hora").value = corteHr; 
        //minutos
        var inicioMin = x.indexOf("utos")+4;
        var finalMin = x.indexOf("revisitas");
        var corteMin = x.slice(inicioMin, finalMin);
        document.getElementById("minuto").value = corteMin; 
        //revisitas
        var inicioRevi = x.indexOf("itas")+4;
        var finalRevi = x.indexOf("revistas");
        var corteRevi = x.slice(inicioRevi, finalRevi);
        document.getElementById("revisita").value = corteRevi; 
        //revistas
        var inicioRev = x.indexOf("stas")+4;
        var finalRev = x.indexOf("livros");
        var corteRev = x.slice(inicioRev, finalRev);
        document.getElementById("revista").value = corteRev; 
        //livros
        var inicioLivr = x.indexOf("vros")+4;
        var finalLivr = x.indexOf("broxuras");
        var corteLivr = x.slice(inicioLivr, finalLivr);
        document.getElementById("livro").value = corteLivr; 
        //broxuras
        var inicioBrox = x.indexOf("uras")+4;
        var finalBrox = x.indexOf("obs");
        var corteBrox = x.slice(inicioBrox, finalBrox);
        document.getElementById("broxura").value = corteBrox; 
        //observacao
        var inicioObs = x.indexOf("obs")+3;
        var finalObs = x.length;
        var corteObs = x.slice(inicioObs, finalObs);
        document.getElementById("observacao").value = corteObs;
    }), 1000;
}

//instancia dos options com seus respectivos dados vindo do banco
var id = document.querySelector('select[id="escolhaDia"]');
//evento ativado pelo select > option que pega o valor do select de cada pessoa e repassa para a funcao dados estudantes
id.onchange = function () {
    var opcao = id.value;
    if (opcao == "Selecione...") {
        opcao = "";
    }
    idEdia(opcao);
}

//exibe a mensagem de sucesso apos atualizar dados
var voltou = window.sessionStorage.getItem('enviou');
var enviaBtn = document.getElementById('envia');
var optData = document.getElementById('escolhaDia');
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
                    escolhaDia.options[0].selected="selected";
                    document.getElementById("id").value = "";
                    document.getElementById("dia").value = "";
                    document.getElementById("hora").value = "";
                    document.getElementById("minuto").value = "";
                    document.getElementById("revisita").value = "";
                    document.getElementById("revista").value = "";
                    document.getElementById("livro").value = "";
                    document.getElementById("broxura").value = "";
                    document.getElementById("observacao").value = "";
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