//ESTUDANTES
//funcao escolhe os dados e exibe
function dadosEstudantes(opcao) {
    setTimeout(function () {
        //nome
        var x = opcao;
        var inicioNome = x.indexOf("Nome");
        var finalNome = x.indexOf("Apelido");
        var corteNome = x.slice(inicioNome, finalNome);
        if (x) {
            document.getElementById("nomeEstudante").style.display = "block";
            document.querySelector('div#nomeEstudante').innerHTML = corteNome;
        } else {
            document.getElementById("nomeEstudante").style.display = "none";
        }
        //apelido
        var inicioApelido = x.indexOf("Apelido");
        var finalApelido = x.indexOf("Observação");
        var corteApelido = x.slice(inicioApelido, finalApelido);
        if (x) {
            document.getElementById("apelidoEstudante").style.display = "block";
            document.querySelector('div#apelidoEstudante').innerHTML = corteApelido;
        } else {
            document.getElementById("apelidoEstudante").style.display = "none";
        }
        //observacoes
        var inicioObservacao = x.indexOf("Observação");
        //var finalObservacao = x.indexOf("Observação");
        var corteObservacao = x.slice(inicioObservacao, x.length);
        if (x) {
            document.getElementById("observacoesEstudante").style.display = "block";
            document.querySelector('div#observacoesEstudante').innerHTML = corteObservacao;
        } else {
            document.getElementById("observacoesEstudante").style.display = "none";
        }
    }), 1000;
}
//instancia dos options com seus respectivos dados vindo do banco
var btnEstudante = document.querySelector('select[id="estudantes"]');
//evento ativado pelo select > option que pega o valor do select de cada pessoa e repassa para a funcao dados estudantes
btnEstudante.onchange = function () {
    var opcao = btnEstudante.value;
    if (opcao == "Selecione...") {
        opcao = "";
    }
    dadosEstudantes(opcao);
}