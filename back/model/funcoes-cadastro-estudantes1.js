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
        //id pessoa
        var inicioID = x.indexOf("id") + 2;
        var finalID = x.indexOf("nome");
        var corteID = x.slice(inicioID, finalID);
        document.getElementById('id').value = corteID;
        //nome pessoa / edicao nome
        var inicioPessID = x.indexOf("nome") + 4;
        var finalPessID = x.indexOf("apelido");
        var cortePessID = x.slice(inicioPessID, finalPessID);
        document.getElementById('nomeEditar').value = cortePessID;
        //apelido pessoa
        var inicioApelido = x.indexOf("lido") + 4;
        var finalApelido = x.length;
        var corteApelido = x.slice(inicioApelido, finalApelido);
        document.getElementById('apelido').value = corteApelido;
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
var voltou = window.sessionStorage.getItem('enviou');
var enviaBtn = document.getElementById('envia');
//var optData = document.getElementById('escolhaEstudante');
var flag = false;
//evento ativado pelo select > option, ativa a flag
function flegear() {
    return flag = true;
}
//dispara o evento flegear
enviaBtn.addEventListener("click", flegear);
//funcao que testa se o navegador tem tem armazenado no local storage o valor da pagina de conexao do banco, se o valor do seletor de data esta em alguma data, e se a flag esta true para poder ativar a mensagem de sucesso!
function recolhe() {
    setTimeout(function () {
        console.log(voltou);
        if (voltou == "sim" && flag == true) {
            function sucesso() {
                document.getElementById("msg-sucesso").style.display = "block";
                setTimeout(function () {
                    escolhaEstudante.options[0].selected = "selected";
                    document.getElementById("nomeEditar").value = "";
                    document.getElementById("pessoa").value = "";
                    document.getElementById("apelido").value = "";
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
enviaBtn.addEventListener("click", recolhe);

//instancia dos options com seus respectivos dados vindo do banco
var id = document.querySelector('select[id="escolhaEstudante"]');
//evento ativado pelo select > option que pega o valor do select de cada pessoa e repassa para a funcao dados estudantes
var cont = id.length;
document.getElementById('id').value = cont;

//instancia dos options com seus respectivos dados vindo do banco
var selectId = document.querySelector('select[id="escolhaId"]');
//evento ativado pelo select > option que pega o valor do select de cada pessoa e repassa para a funcao dados estudantes
var cont2 = selectId.length;
document.getElementById('idTran').value = cont2+1;