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
        var finalID = x.indexOf("dia");
        var corteID = x.slice(inicioID, finalID);
        document.getElementById('id').value = corteID;
        document.getElementById('idCopy').value = corteID;
        //dia
        var inicioDia = x.indexOf("dia") + 3;
        var finalDia = x.indexOf("horas");
        var corteDia = x.slice(inicioDia, finalDia);
        document.getElementById('dia').value = corteDia;
        //horas
        var inicioPessID = x.indexOf("oras") + 4;
        var finalPessID = x.indexOf("minutos");
        var cortePessID = x.slice(inicioPessID, finalPessID);
        document.getElementById('hora').value = cortePessID;
        //minutos
        var inicioApelido = x.indexOf("utos") + 4;
        var finalApelido = x.indexOf("revisitas");
        var corteApelido = x.slice(inicioApelido, finalApelido);
        document.getElementById('minuto').value = corteApelido;
        //revisitas
        var inicioRevi = x.indexOf("itas") + 4;
        var finalRevi = x.indexOf("revistas");
        var corteRevi = x.slice(inicioRevi, finalRevi);
        document.getElementById('revisita').value = corteRevi;
        //revistas
        var inicioRev = x.indexOf("stas") + 4;
        var finalRev = x.indexOf("livros");
        var corteRev = x.slice(inicioRev, finalRev);
        document.getElementById('revista').value = corteRev;
        //livros
        var inicioLivr = x.indexOf("vros") + 4;
        var finalLivr = x.indexOf("broxuras");
        var corteLivr = x.slice(inicioLivr, finalLivr);
        document.getElementById('livro').value = corteLivr;
        //broxuras
        var inicioBrox = x.indexOf("uras") + 4;
        var finalBrox = x.indexOf("obs");
        var corteBrox = x.slice(inicioBrox, finalBrox);
        document.getElementById('broxura').value = corteBrox;
        //observacoes
        var inicioObs = x.indexOf("obs") + 3;
        var finalObs = x.length;
        var corteObs = x.slice(inicioObs, finalObs);
        document.getElementById('ob').value = corteObs;
    }, 1000);
}

//instancia dos options com seus respectivos dados vindo do banco
var id = document.querySelector('select[id="escolhaDia"]');
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
var enviaBtn = document.getElementById('edita');
var delBtn = document.getElementById('delet');
//var optData = document.getElementById('escolhaEstudante');
var flag = false;
//evento ativado pelo select > option, ativa a flag
function flegear() {
    return flag = true;
}
//dispara o evento flegear
delBtn.addEventListener("click", flegear);
enviaBtn.addEventListener("click", flegear);
//funcao que testa se o navegador tem tem armazenado no local storage o valor da pagina de conexao do banco, se o valor do seletor de data esta em alguma data, e se a flag esta true para poder ativar a mensagem de sucesso!
function recolhe() {
    document.getElementById('edito').value = "ok";
    console.log(voltou);
    setTimeout(function () {
        if (voltou == "sim" && flag == true) {
            function sucesso() {
                document.getElementById("msg-sucesso").style.display = "block";
                setTimeout(function () {
                    escolhaDia.options[0].selected = "selected";
                    document.getElementById("dia").value = "";
                    document.getElementById("hora").value = "";
                    document.getElementById("minuto").value = "";
                    document.getElementById("revisita").value = "";
                    document.getElementById("revista").value = "";
                    document.getElementById("livro").value = "";
                    document.getElementById("broxura").value = "";
                    document.getElementById("ob").value = "";
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
delBtn.addEventListener("click", recolhe);