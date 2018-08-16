//METAS ANUAIS
//funcao escolhe os dados e exibe
function dadosAnual(opcao) {
    setTimeout(function () {
        //Ano
        var x = opcao;
        var inicioAno = x.indexOf("Ano");
        var finalAno = x.indexOf("Horas pretendidas");
        var corteAno = x.slice(inicioAno, finalAno);
        if (x) {
            document.getElementById("metaDoAno").style.display = "block";
            document.querySelector('div#metaDoAno').innerHTML = corteAno;
        } else {
            document.getElementById("metaDoAno").style.display = "none";
        }
        //Horas
        var x = opcao;
        var inicioHrAno = x.indexOf("Horas pretendidas");
        var finalHrAno = x.indexOf("Revisitas pretendidas");
        var corteHrAno = x.slice(inicioHrAno, finalHrAno);
        if (x) {
            document.getElementById("metaHoraAno").style.display = "block";
            document.querySelector('div#metaHoraAno').innerHTML = corteHrAno;
        } else {
            document.getElementById("metaHoraAno").style.display = "none";
        }
        //Revisitas
        var x = opcao;
        var inicioReviAno = x.indexOf("Revisitas pretendidas");
        var finalReviAno = x.indexOf("Revistas pretendidas");
        var corteReviAno = x.slice(inicioReviAno, finalReviAno);
        if (x) {
            document.getElementById("metaReviAno").style.display = "block";
            document.querySelector('div#metaReviAno').innerHTML = corteReviAno;
        } else {
            document.getElementById("metaReviAno").style.display = "none";
        }
        //Revistas
        var x = opcao;
        var inicioRevAno = x.indexOf("Revistas pretendidas");
        var finalRevAno = x.indexOf("Livros pretendidos");
        var corteRevAno = x.slice(inicioRevAno, finalRevAno);
        if (x) {
            document.getElementById("metaRevAno").style.display = "block";
            document.querySelector('div#metaRevAno').innerHTML = corteRevAno;
        } else {
            document.getElementById("metaRevAno").style.display = "none";
        }
        //Livros
        var x = opcao;
        var inicioLivrAno = x.indexOf("Livros pretendidos");
        var finalLivrAno = x.indexOf("Broxuras pretendidas");
        var corteLivrAno = x.slice(inicioLivrAno, finalLivrAno);
        if (x) {
            document.getElementById("metaLivrAno").style.display = "block";
            document.querySelector('div#metaLivrAno').innerHTML = corteLivrAno;
        } else {
            document.getElementById("metaLivrAno").style.display = "none";
        }
        //broxuras
        var x = opcao;
        var inicioLivrAno = x.indexOf("Broxuras pretendidas");
        //var finalLivrAno = x.indexOf("Broxuras pretendidas");
        var corteLivrAno = x.slice(inicioLivrAno, x.length);
        if (x) {
            document.getElementById("metaBroxAno").style.display = "block";
            document.querySelector('div#metaBroxAno').innerHTML = corteLivrAno;
        } else {
            document.getElementById("metaBroxAno").style.display = "none";
        }
    }), 1000;
}
//instancia dos options com seus respectivos dados vindo do banco
var btnAnual = document.querySelector('select[id="anualMeta"]');
//evento ativado pelo select > option que pega o valor do select de cada pessoa e repassa para a funcao dados estudantes
btnAnual.onchange = function () {
    var opcao = btnAnual.value;
    if (opcao == "Selecione...") {
        opcao = "";
    }
    dadosAnual(opcao);
}