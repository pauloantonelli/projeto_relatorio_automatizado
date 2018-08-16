//METAS Mensal
//funcao escolhe os dados e exibe
function dadosMensal(opcao) {
    setTimeout(function () {
        //Ano
        var x = opcao;
        var inicioMes = x.indexOf(":")+1;
        var finalMes = x.indexOf("Horas pretendidas");
        var corteMes = x.slice(inicioMes, finalMes);
        corteMes = Number(corteMes);
        var mes = "";
        if (x) {
            switch(corteMes){
                case 1 : mes = "Janeiro";
                break;
                case 2 : mes = "Fevereiro";
                break;
                case 3 : mes = "Março";
                break;
                case 4 : mes = "Abril";
                break;
                case 5 : mes = "Maio";
                break;
                case 6 : mes = "Junho";
                break;
                case 7 : mes = "Julho";
                break;
                case 8 : mes = "Agosto";
                break;
                case 9 : mes = "Setembro";
                break;
                case 10 : mes = "Outubro";
                break;
                case 11 : mes = "Novembro";
                break;
                case 12 : mes = "Dezembro";
                break;
            }
            document.getElementById("metaDoMes").style.display = "block";
            document.querySelector('div#metaDoMes').innerHTML = mes;
        }else{
            document.getElementById("metaDoMes").style.display = "none";
        }
        //Horas
        var x = opcao;
        var inicioHrAno = x.indexOf("Horas pretendidas");
        var finalHrAno = x.indexOf("Revisitas pretendidas");
        var corteHrAno = x.slice(inicioHrAno, finalHrAno);
        if (x) {
            document.getElementById("metaHoraMes").style.display = "block";
            document.querySelector('div#metaHoraMes').innerHTML = corteHrAno;
        } else {
            document.getElementById("metaHoraMes").style.display = "none";
        }
        //Revisitas
        var x = opcao;
        var inicioReviAno = x.indexOf("Revisitas pretendidas");
        var finalReviAno = x.indexOf("Revistas pretendidas");
        var corteReviAno = x.slice(inicioReviAno, finalReviAno);
        if (x) {
            document.getElementById("metaReviMes").style.display = "block";
            document.querySelector('div#metaReviMes').innerHTML = corteReviAno;
        } else {
            document.getElementById("metaReviMes").style.display = "none";
        }
        //Revistas
        var x = opcao;
        var inicioRevAno = x.indexOf("Revistas pretendidas");
        var finalRevAno = x.indexOf("Livros pretendidos");
        var corteRevAno = x.slice(inicioRevAno, finalRevAno);
        if (x) {
            document.getElementById("metaRevMes").style.display = "block";
            document.querySelector('div#metaRevMes').innerHTML = corteRevAno;
        } else {
            document.getElementById("metaRevMes").style.display = "none";
        }
        //Livros
        var x = opcao;
        var inicioLivrAno = x.indexOf("Livros pretendidos");
        var finalLivrAno = x.indexOf("Broxuras pretendidas");
        var corteLivrAno = x.slice(inicioLivrAno, finalLivrAno);
        if (x) {
            document.getElementById("metaLivrMes").style.display = "block";
            document.querySelector('div#metaLivrMes').innerHTML = corteLivrAno;
        } else {
            document.getElementById("metaLivrMes").style.display = "none";
        }
        //broxuras
        var x = opcao;
        var inicioLivrAno = x.indexOf("Broxuras pretendidas");
        //var finalLivrAno = x.indexOf("Broxuras pretendidas");
        var corteLivrAno = x.slice(inicioLivrAno, x.length);
        if (x) {
            document.getElementById("metaBroxMes").style.display = "block";
            document.querySelector('div#metaBroxMes').innerHTML = corteLivrAno;
        } else {
            document.getElementById("metaBroxMes").style.display = "none";
        }
    }), 1000;
}
//instancia dos options com seus respectivos dados vindo do banco
var btnMensal = document.querySelector('select[id="mensalMeta"]');
//evento ativado pelo select > option que pega o valor do select de cada pessoa e repassa para a funcao dados estudantes
btnMensal.onchange = function () {
    var opcao = btnMensal.value;
    if (opcao == "Selecione...") {
        opcao = "";
    }
    dadosMensal(opcao);
}