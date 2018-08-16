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
        var inicioDia = x.indexOf("dia");
        var finalDia = x.indexOf("horas");
        var corteDia = x.slice(inicioDia, finalDia);
        if (x) {
            document.getElementById("dia").style.display = "block";
            document.querySelector('div#dia').innerHTML = corteDia;
        } else {
            document.getElementById("dia").style.display = "none";
        }
        //hora
        var inicioHora = x.indexOf("horas");
        var finalHora = x.indexOf("minutos");
        var corteHora = x.slice(inicioHora, finalHora);
        if (x) {
            document.getElementById("hora").style.display = "block";
            document.querySelector('div#hora').innerHTML = corteHora;
        } else {
            document.getElementById("hora").style.display = "none";
        }
        //minutos
        var inicioMin = x.indexOf("minutos");
        var finalMin = x.indexOf("revisitas");
        var corteMin = x.slice(inicioMin, finalMin);
        if (x) {
            document.getElementById("minutos").style.display = "block";
            document.querySelector('div#minutos').innerHTML = corteMin;
        } else {
            document.getElementById("minutos").style.display = "none";
        }
        //revisitas
        var inicioVisitas = x.indexOf("revisitas");
        var finalVisitas = x.indexOf("revistas");
        var corteVisitas = x.slice(inicioVisitas, finalVisitas);
        if (x) {
            document.getElementById("revisitas").style.display = "block";
            document.querySelector('div#revisitas').innerHTML = corteVisitas;
        } else {
            document.getElementById("revisitas").style.display = "none";
        }
        //revistas
        var inicioRevi = x.indexOf("revistas");
        var finalRevi = x.indexOf("livros");
        var corteRevi = x.slice(inicioRevi, finalRevi);
        if (x) {
            document.getElementById("revistas").style.display = "block";
            document.querySelector('div#revistas').innerHTML = corteRevi;
        } else {
            document.getElementById("revistas").style.display = "none";
        }
        //livros
        var inicioLivro = x.indexOf("livros");
        var finalLivro = x.indexOf("broxuras");
        var corteLivro = x.slice(inicioLivro, finalLivro);
        if (x) {
            document.getElementById("livros").style.display = "block";
            document.querySelector('div#livros').innerHTML = corteLivro;
        } else {
            document.getElementById("livros").style.display = "none";
        }
        //broxuras
        var inicioBrox = x.indexOf("broxuras");
        var finalBrox = x.indexOf("estudante");
        var corteBrox = x.slice(inicioBrox, finalBrox);
        if (x) {
            document.getElementById("broxuras").style.display = "block";
            document.querySelector('div#broxuras').innerHTML = corteBrox;
        } else {
            document.getElementById("broxuras").style.display = "none";
        }
        //pessoa
        var inicioIdPessoa = x.indexOf("estudante");
        var finalIdPessoa = x.indexOf("horas feitas");
        var corteIdPessoa = x.slice(inicioIdPessoa, finalIdPessoa);
        if (x) {
            document.getElementById("pessoa").style.display = "block";
            document.querySelector('div#pessoa').innerHTML = corteIdPessoa;
        } else {
            document.getElementById("pessoa").style.display = "none";
        }
        //Horas com o estudante
        var inicioIdRhsPessoa = x.indexOf("horas feitas");
        var finalIdRhsPessoa = x.indexOf("minutos feitos");
        var corteIdRhsPessoa = x.slice(inicioIdRhsPessoa, finalIdRhsPessoa);
        if (x) {
            document.getElementById("horasPessoa").style.display = "block";
            document.querySelector('div#horasPessoa').innerHTML = corteIdRhsPessoa;
        } else {
            document.getElementById("horasPessoa").style.display = "none";
        }
        //minutos com o estudante
        var inicioIdMinPessoa = x.indexOf("minutos feitos");
        var finalIdMinPessoa = x.indexOf("revisitas feitas");
        var corteIdMinPessoa = x.slice(inicioIdMinPessoa, finalIdMinPessoa);
        if (x) {
            document.getElementById("minutosPessoa").style.display = "block";
            document.querySelector('div#minutosPessoa').innerHTML = corteIdMinPessoa;
        } else {
            document.getElementById("minutosPessoa").style.display = "none";
        }
        //revisitas com o estudante
        var inicioIdReviPessoa = x.indexOf("revisitas feitas");
        var finalIdReviPessoa = x.indexOf("revistas entregues");
        var corteIdReviPessoa = x.slice(inicioIdReviPessoa, finalIdReviPessoa);
        if (x) {
            document.getElementById("revisitasPessoa").style.display = "block";
            document.querySelector('div#revisitasPessoa').innerHTML = corteIdReviPessoa;
        } else {
            document.getElementById("revisitasPessoa").style.display = "none";
        }
        //revistas com o estudante
        var inicioIdRevPessoa = x.indexOf("revistas entregues");
        var finalIdRevPessoa = x.indexOf("livros entregues");
        var corteIdRevPessoa = x.slice(inicioIdRevPessoa, finalIdRevPessoa);
        if (x) {
            document.getElementById("revistasPessoa").style.display = "block";
            document.querySelector('div#revistasPessoa').innerHTML = corteIdRevPessoa;
        } else {
            document.getElementById("revistasPessoa").style.display = "none";
        }
        //livros do estudante
        var inicioIdLivPessoa = x.indexOf("livros entregues");
        var finalIdLivPessoa = x.indexOf("broxuras entregues");
        var corteIdLivPessoa = x.slice(inicioIdLivPessoa, finalIdLivPessoa);
        if (x) {
            document.getElementById("livrosPessoa").style.display = "block";
            document.querySelector('div#livrosPessoa').innerHTML = corteIdLivPessoa;
        } else {
            document.getElementById("livrosPessoa").style.display = "none";
        }
        //broxuras do estudante
        var inicioIdBroPessoa = x.indexOf("broxuras entregues");
        var finalIdBroPessoa = x.indexOf("Observação");
        var corteIdBroPessoa = x.slice(inicioIdBroPessoa, finalIdBroPessoa);
        if (x) {
            document.getElementById("broxurasPessoa").style.display = "block";
            document.querySelector('div#broxurasPessoa').innerHTML = corteIdBroPessoa;
        } else {
            document.getElementById("broxurasPessoa").style.display = "none";
        }
        //Observacao do dia do estudante
        var inicioIdObsPessoa = x.indexOf("Observação");
        //var finalIdBroPessoa = x.indexOf("Observação");
        var corteIdObsPessoa = x.slice(inicioIdObsPessoa, x.length);
        if (x) {
            document.getElementById("obsPessoa").style.display = "block";
            document.querySelector('div#obsPessoa').innerHTML = corteIdObsPessoa;
        } else {
            document.getElementById("obsPessoa").style.display = "none";
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