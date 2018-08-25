//pega e exibe o dia
function diaHoje() {
    var dia = new Date().toDateString();
    document.getElementById('diaHoje').innerHTML = dia;
}
//funcao que pega dia/mes/ano atual e autopreenche a data
function valorDia() {
    var d = new Date();
    var ano = d.getFullYear();
    var mes = d.getMonth() + 1;
    var dia = d.getDate();
    if (mes <= 9) {
        mes = "0" + mes;
    }
    if (dia <= 9) {
        dia = "0" + dia;
    }
    var autoCompl = ano + "-" + mes + "-" + dia;
    document.getElementById('diaPadrao').value = autoCompl;
}
//monitora o campo minutos c/ mensagem
function minAlert() {
    setInterval(function () {
        var verifica = document.getElementById('minuto').value;
        if (verifica == 0 || verifica == "") {
            document.getElementById('msgMin').style.display = "block";
        } else {
            document.getElementById('msgMin').style.display = "none";
        }
    }, 1000);
}
//id e dia
//funcao captura o dia e seu id para atualizar os dados do dia
function idEstudante(opcao) {
    setTimeout(function () {
        var x = opcao;
        //id
        var inicioID = x.indexOf("acao")+4;
        var finalID = x.indexOf("idPessoa");
        var corteID = x.slice(inicioID, finalID);
        document.getElementById('id').value = corteID;
        //id pessoa
        var inicioPessID = x.indexOf("ssoa")+4;
        var finalPessID = x.indexOf("dia");
        var cortePessID = x.slice(inicioPessID, finalPessID);
        document.getElementById('identPessoa').value = cortePessID;
        //pessoa
        var inicioPess = x.indexOf("nome") + 4;
        var finalPess = x.indexOf("apelido");
        var cortePess = x.slice(inicioPess, finalPess);
        document.getElementById('nomePessoa').value = cortePess;
        //dia
        var inicioMes = x.indexOf("dia") + 3;
        var finalMes = x.indexOf("nome");
        var corteMes = x.slice(inicioMes, finalMes);
        document.getElementById('diaEscolhido').value = corteMes;
        //horas
        var inicioHr = x.indexOf("ras") + 3;
        var finalHr = x.indexOf("minutos");
        var corteHr = x.slice(inicioHr, finalHr);
        document.getElementById("hora").value = corteHr;
        //minutos
        var inicioHr = x.indexOf("tos") + 3;
        var finalHr = x.indexOf("revisitas");
        var corteHr = x.slice(inicioHr, finalHr);
        document.getElementById("minuto").value = corteHr;
        //revisitas
        var inicioRevi = x.indexOf("itas") + 4;
        var finalRevi = x.indexOf("revistas");
        var corteRevi = x.slice(inicioRevi, finalRevi);
        document.getElementById("revisita").value = corteRevi;
        //revistas
        var inicioRev = x.indexOf("stas") + 4;
        var finalRev = x.indexOf("livros");
        var corteRev = x.slice(inicioRev, finalRev);
        document.getElementById("revista").value = corteRev;
        //livros
        var inicioLivr = x.indexOf("ros") + 3;
        var finalLivr = x.indexOf("broxuras");
        var corteLivr = x.slice(inicioLivr, finalLivr);
        document.getElementById("livro").value = corteLivr;
        //broxuras
        var inicioBrox = x.indexOf("uras") + 4;
        var finalBrox = x.indexOf("obs");
        var corteBrox = x.slice(inicioBrox, finalBrox);
        document.getElementById("broxura").value = corteBrox;
        //obs dia
        var inicioObs = x.indexOf("obs") + 3;
        var finalObs = x.length;
        var corteObs = x.slice(inicioObs, finalObs);
        document.getElementById("observacao").value = corteObs;
    }, 1000);
}

//instancia dos options com seus respectivos dados vindo do banco
var id = document.querySelector('select[id="escolhaEstudante"]');
//evento ativado pelo select > option que pega o valor do select de cada pessoa e repassa para a funcao dados estudantes
id.onchange = function () {
    var opcao = id.value;
    if (opcao == "Selecione...") {
        opcao = "";
    }
    idEstudante(opcao);
}

//exibe a mensagem de sucesso apos atualizar dados
//var voltou = window.sessionStorage.getItem('cadastro');
var enviaBtn = document.getElementById('envia');
var flag = false;
//evento ativado pelo select > option, ativa a flag
function flegear() {
    return flag = true;
}
//dispara o evento flegear
id.addEventListener("change", flegear);
//funcao que testa se o navegador tem tem armazenado no local storage o valor da pagina de conexao do banco, se o valor do seletor de data esta em alguma data, e se a flag esta true para poder ativar a mensagem de sucesso!
function edita() {
    setTimeout(function () {
        if (flag == true) {
            function sucesso() {
                document.getElementById("msg-sucesso").style.display = "block";
                setTimeout(function () {
                    escolhaEstudante.options[0].selected="selected";
                    document.getElementById("diaEscolhido").value = "";
                    document.getElementById("nomePessoa").value = "";
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
        } else {
            document.getElementById('msg-sucesso').style.display = "none";
        }
    }, 1000);
}
//dispara a funcao recolhe para enviar ao banco de dados
enviaBtn.addEventListener("click", edita);