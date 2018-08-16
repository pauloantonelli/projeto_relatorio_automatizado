//pega e exibe o dia
/*function diaHoje(){
    var dia = new Date().toDateString();
    document.getElementById('diaHoje').innerHTML = dia;
    }
function limiteMetas(){
    setInterval(function(){
    var x = document.getElementById('metaMe').value;
    var y = document.getElementById('metaAno').value;
    if(x == 0 && y ==0){
        document.getElementById("msg").style.display = "block";
    }else{
        document.getElementById("msg").style.display = "none";
    }
    }), 5000;
}*/

//RELATORIO DO DIA
//funcao escolhe os dados e exibe
function dadosDiario(opcao) {
    setTimeout(function () {
        //dia
        var x = opcao;
        /*var inicioDia = x.indexOf("dia")+3;
        var finalDia = x.indexOf("horas");
        var corteDia = x.slice(inicioDia, finalDia);
        if (x) {
            document.getElementById("dia").style.display = "block";
            document.querySelector('div#dia').innerHTML = corteDia;
        } else {
            document.getElementById("dia").style.display = "none";
        }*/
        //hora
        var inicioHora = x.indexOf("Horas");
        var finalHora = x.indexOf("Minutos");
        var corteHora = x.slice(inicioHora, finalHora);
        if (x) {
            document.getElementById("hora").style.display = "block";
            document.querySelector('div#hora').innerHTML = corteHora;
        } else {
            document.getElementById("hora").style.display = "none";
        }
        //minutos
        var inicioMin = x.indexOf("Minutos");
        var finalMin = x.indexOf("Revisitas");
        var corteMin = x.slice(inicioMin, finalMin);
        if (x) {
            document.getElementById("minutos").style.display = "block";
            document.querySelector('div#minutos').innerHTML = corteMin;
        } else {
            document.getElementById("minutos").style.display = "none";
        }
        //revisitas
        var inicioVisitas = x.indexOf("Revisitas");
        var finalVisitas = x.indexOf("Revistas");
        var corteVisitas = x.slice(inicioVisitas, finalVisitas);
        if (x) {
            document.getElementById("revisitas").style.display = "block";
            document.querySelector('div#revisitas').innerHTML = corteVisitas;
        } else {
            document.getElementById("revisitas").style.display = "none";
        }
        //revistas
        var inicioRevi = x.indexOf("Revistas");
        var finalRevi = x.indexOf("Livros");
        var corteRevi = x.slice(inicioRevi, finalRevi);
        if (x) {
            document.getElementById("revistas").style.display = "block";
            document.querySelector('div#revistas').innerHTML = corteRevi;
        } else {
            document.getElementById("revistas").style.display = "none";
        }
        //livros
        var inicioLivro = x.indexOf("Livros");
        var finalLivro = x.indexOf("Broxuras");
        var corteLivro = x.slice(inicioLivro, finalLivro);
        if (x) {
            document.getElementById("livros").style.display = "block";
            document.querySelector('div#livros').innerHTML = corteLivro;
        } else {
            document.getElementById("livros").style.display = "none";
        }
        //broxuras
        var inicioBrox = x.indexOf("Broxuras");
        var finalBrox = x.indexOf("Observacoes");
        var corteBrox = x.slice(inicioBrox, finalBrox);
        if (x) {
            document.getElementById("broxuras").style.display = "block";
            document.querySelector('div#broxuras').innerHTML = corteBrox;
        } else {
            document.getElementById("broxuras").style.display = "none";
        }
        //Observacao do dia do estudante
        var inicioIdObsPessoa = x.indexOf("Observacoes");
        //var finalIdBroPessoa = x.indexOf("Observação");
        var corteIdObsPessoa = x.slice(inicioIdObsPessoa, x.length);
        if (x) {
            document.getElementById("obs").style.display = "block";
            document.querySelector('div#obs').innerHTML = corteIdObsPessoa;
        } else {
            document.getElementById("obs").style.display = "none";
        }
    }), 1000;
}
//instancia dos options com seus respectivos dados vindo do banco
var btnDiario = document.querySelector('select[id="diario"]');
//evento ativado pelo select > option que pega o valor do select de cada pessoa e repassa para a funcao dados estudantes
btnDiario.onchange = function () {
    var opcao = btnDiario.value;
    if (opcao == "Selecione...") {
        opcao = "";
    }
    dadosDiario(opcao);
}