//pega e exibe o dia
function diaHoje() {
    var dia = new Date().toDateString();
    document.getElementById('diaHoje').innerHTML = dia;
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
        document.getElementById('idCopy').value = corteID;
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
//var voltou = window.sessionStorage.getItem('enviou');
var enviaBtn = document.getElementById('edita');
var delBtn = document.getElementById('delet');
var optData = document.getElementById('escolhaEstudante');
var flag = false;
//evento ativado pelo select > option, ativa a flag
function flegear() {
    return flag = true;
}
//dispara o evento flegear
optData.addEventListener("change", flegear);
//funcao que testa se o navegador tem tem armazenado no local storage o valor da pagina de conexao do banco, se o valor do seletor de data esta em alguma data, e se a flag esta true para poder ativar a mensagem de sucesso!
function editar() {
    document.getElementById('edito').value = "ok";
    setTimeout(function () {
        if (flag == true) {
            function sucesso() {
                document.getElementById("msg-sucesso-edicao").style.display = "block";
                setTimeout(function () {
                    optData.selectedIndex = 0;
                    document.getElementById("nomeEditar").value = "";
                    document.getElementById("apelido").value = "";
                    document.getElementById("msg-sucesso-edicao").style.display = "none";
                }, 5000);
            }
            sucesso();
        } else {
            document.getElementById('msg-sucesso-edicao').style.display = "none";
        }
    }, 1000);
}
//funcao que testa se o navegador tem tem armazenado no local storage o valor da pagina de conexao do banco, se o valor do seletor de data esta em alguma data, e se a flag esta true para poder ativar a mensagem de sucesso!
function deletar() {
    document.getElementById('edito').value = "nao";
    setTimeout(function () {
        if (flag == true) {
            function sucesso() {
                document.getElementById("msg-sucesso-delete").style.display = "block";
                setTimeout(function () {
                    optData.selectedIndex = 0;
                    document.getElementById("nomeEditar").value = "";
                    document.getElementById("apelido").value = "";
                    document.getElementById("msg-sucesso-delete").style.display = "none";
                }, 5000);
            }
            sucesso();
        } else {
            document.getElementById('msg-sucesso-delete').style.display = "none";
        }
    }, 1000);
}
//dispara a funcao recolhe para enviar ao banco de dados
enviaBtn.addEventListener("click", editar);
delBtn.addEventListener("click", deletar);