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
function idEstudante(opcao) {
    setTimeout(function () {
        var x = opcao;
        //id
        var inicioID = x.indexOf("cao")+3;
        var finalID = x.indexOf("idPessoa");
        var corteID = x.slice(inicioID, finalID);
        document.getElementById('id').value = corteID;
        //idPessoa
        var inicioIDPess = x.indexOf("soa")+3;
        var finalIDPess = x.indexOf("dia");
        var corteIDPess = x.slice(inicioIDPess, finalIDPess);
        document.getElementById('identPessoa').value = corteIDPess;
        //dia
        var inicioDIA = x.indexOf("dia")+3;
        var finalDIA = x.indexOf("nome");
        var corteDIA = x.slice(inicioDIA, finalDIA);
        document.getElementById("diaEscolhido").value = corteDIA;
        //nome
        var inicioNome = x.indexOf("nome")+4;
        var finalNome = x.indexOf("apelido");
        var corteNome = x.slice(inicioNome, finalNome);
        document.getElementById("nomePessoa").value = corteNome;
        //horas
        var inicioHoras = x.indexOf("horas")+5;
        var finalHoras = x.indexOf("minutos");
        var corteHoras = x.slice(inicioHoras, finalHoras);
        document.getElementById("hora").value = corteHoras;  
        //minutos
        var inicioMinutos = x.indexOf("minutos")+7;
        var finalMinutos = x.indexOf("revisitas");
        var corteMinutos = x.slice(inicioMinutos, finalMinutos);
        document.getElementById("minuto").value = corteMinutos;  
        //revisitas
        var inicioRevisitas = x.indexOf("revisitas")+9;
        var finalRevisitas = x.indexOf("revistas");
        var corteRevisitas = x.slice(inicioRevisitas, finalRevisitas);
        document.getElementById("revisita").value = corteRevisitas;  
        //revistas
        var inicioRevistas = x.indexOf("revistas")+8;
        var finalRevistas = x.indexOf("livro");
        var corteRevistas = x.slice(inicioRevistas, finalRevistas);
        document.getElementById("revista").value = corteRevistas;  
        //livros
        var inicioLivros = x.indexOf("livros")+6;
        var finalLivros = x.indexOf("broxuras");
        var corteLivros = x.slice(inicioLivros, finalLivros);
        document.getElementById("livro").value = corteLivros;  
        //broxuras
        var inicioBroxuras = x.indexOf("broxuras")+8;
        var finalBroxuras = x.indexOf("obs");
        var corteBroxuras = x.slice(inicioBroxuras, finalBroxuras);
        document.getElementById("broxura").value = corteBroxuras;  
        //observacoes
        var inicioObs = x.indexOf("obs")+3;
        var finalObs = x.length;
        var corteObs = x.slice(inicioObs, finalObs);
        document.getElementById("observacao").value = corteObs;  
    }), 1000;
}

//instancia dos options com seus respectivos dados vindo do banco
var id = document.querySelector('select[id="escolhaDiaEstudante"]');
//evento ativado pelo select > option que pega o valor do select de cada pessoa e repassa para a funcao dados estudantes
id.onchange = function () {
    var opcao = id.value;
    if (opcao == "Selecione...") {
        opcao = "";
    }
    idEstudante(opcao);
}

//exibe a mensagem de sucesso apos atualizar dados
var voltou = window.sessionStorage.getItem('cadastro');
var enviaBtn = document.getElementById('envia');
var optData = document.getElementById('escolhaDiaEstudante');
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
        if(voltou == "sim" && optData.value != "Selecione..." && flag == true){
            function sucesso() {
                document.getElementById("msg-sucesso").style.display = "block";
                setTimeout(function(){
                    escolhaDiaEstudante.options[0].selected="selected";
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
        }else{
            document.getElementById('msg-sucesso').style.display = "none";
        }
    },1000);
}
//dispara a funcao recolhe para enviar ao banco de dados
enviaBtn.addEventListener("click", recolhe);