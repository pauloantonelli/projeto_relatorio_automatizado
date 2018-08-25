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

//BARRA DE PROGRESSO
var dadosNovos = document.getElementById('soma').innerHTML;
//var dadosAntigos = document.getElementById('mensalMeta');
    //soma dos dados
//soma dos Dados Gerais
function contaMetas(dadosNovos){
    setTimeout(function(){
        var x = dadosNovos;
        //dados horas e minutos
        //horas
        var inicioHors = x.indexOf("oras") + 4;
        var finalHors = x.indexOf("minutos");
        var corteHors = x.slice(inicioHors, finalHors);
        //minutos
        var inicioMin = x.indexOf("utos") + 4;
        var finalMin = x.indexOf("revisitas");
        var corteMin = x.slice(inicioMin, finalMin);
        var aux = corteMin / 60;//conta os minutos e somar nas horas
        if (aux >= 1) {
            corteHors = (parseInt(corteHors) + parseInt(aux));
        }
        //dados revisitas
        var inicioRevis = x.indexOf("itas")+4;
        var finalRevis = x.indexOf("revistas");
        var corteRevis = x.slice(inicioRevis, finalRevis);
        //dados revistas
        var inicioRev = x.indexOf("stas")+4;
        var finalRev = x.indexOf("livros");
        var corteRev = x.slice(inicioRev, finalRev);
        //dados livros
        var inicioLivr = x.indexOf('vros')+4;
        var finalLivr = x.indexOf('broxuras');
        var corteLivr = x.slice(inicioLivr, finalLivr);
        //dados broxuras
        var inicioBrox = x.indexOf('uras')+4;
        var finalBrox = x.length;
        var corteBrox = x.slice(inicioBrox, finalBrox);
        
        //var totGeral = (parseInt(corteRevis) + parseInt(corteRevs) + parseInt(corteLivr) + parseInt(corteBrox));//talvez fazer um progresso geral com media de tudo dividido por 100%...
        if (x) {
            var idMes = document.getElementById('mensalMeta');
            //progresso meta ano / hora
            function atualizaHoraMes() {
                //selecao dos dados
                var y = idMes.value;
                var inicioMesHors = y.indexOf('Horas pretendidas: ')+19;
                var finalMesHors = y.indexOf('Revisitas');
                var corteMesHors = y.slice(inicioMesHors, finalMesHors);
                //atualizacao hora
                var elemHora = document.getElementById('progressHoraMes');
                if(corteHors > corteMesHors){
                    var progresso = (corteHors * corteMesHors) / 100;
                }else{
                    var progresso = (corteMesHors * corteHors) / 100;
                }
                progressoWidth = 0;
                console.log(corteHors);
                console.log(corteMesHors);
                console.log(progresso);
                var barra = setInterval(frame, 65);//seta o intervalo da funcao frame para 65 microsegundos
                function frame() {
                    if (progressoWidth >= corteHors) {
                        clearInterval(barra);
                    }else{
                        progresso++;
                        progressoWidth++;
                        elemHora.style.width = progressoWidth + '%';
                        elemHora.innerHTML = 'Progresso: ' + progresso * 1 + '%';
                    }
                }
            }
            function atualizaReviMes() {
                //selecao dos dados
                var y = idMes.value;
                var inicioMesRevi = y.indexOf('Revisitas pretendidas: ') + 23;
                var finalMesRevi = y.indexOf('Revistas');
                var corteMesRevi = y.slice(inicioMesRevi, finalMesRevi);
                console.log(corteMesRevi);
                //atualizacao revisitas
                var elemRevi = document.getElementById('progressReviMes');
                var progresso = corteMesRevi;
                var barra = setInterval(frame, 65);//seta o intervalo da funcao frame para 65 microsegundos
                function frame() {
                    if (progresso >= corteRevis) {
                        clearInterval(barra);
                    } else {
                        progresso++;
                        elemRevi.style.width = progresso + '%';
                        elemRevi.innerHTML = 'Progresso: ' + progresso * 1 + '%';
                    }
                }
            }
            function atualizaRevMes() {
                //selecao dos dados
                var y = idMes.value;
                var inicioMesRev = y.indexOf('Revistas pretendidas: ') + 22;
                var finalMesRev = y.indexOf('Livros');
                var corteMesRev = y.slice(inicioMesRev, finalMesRev);
                console.log(corteMesRev);
                //atualizacao revistas
                var elemRev = document.getElementById('progressRevMes');
                var progresso = corteMesRev;
                var barra = setInterval(frame, 65);//seta o intervalo da funcao frame para 65 microsegundos
                function frame() {
                    if (progresso >= corteRev) {
                        clearInterval(barra);
                    } else {
                        progresso++;
                        elemRev.style.width = progresso + '%';
                        elemRev.innerHTML = 'Progresso: ' + progresso * 1 + '%';
                    }
                }
            }
            function atualizaLivrMes() {
                //selecao dos dados
                var y = idMes.value;
                var inicioMesLivr = y.indexOf('Livros pretendidos: ') + 20;
                var finalMesLivr = y.indexOf('Broxuras');
                var corteMesLivr = y.slice(inicioMesLivr, finalMesLivr);
                console.log(corteMesLivr);
                //atualizacao livros
                var elemLivr = document.getElementById('progressLivrMes');
                var progresso = corteMesLivr;
                var barra = setInterval(frame, 65);//seta o intervalo da funcao frame para 65 microsegundos
                function frame() {
                    if (progresso >= corteLivr) {
                        clearInterval(barra);
                    } else {
                        progresso++;
                        elemLivr.style.width = progresso + '%';
                        elemLivr.innerHTML = 'Progresso: ' + progresso * 1 + '%';
                    }
                }
            }
            function atualizaBroxMes() {
                //selecao dos dados
                var y = idMes.value;
                var inicioMesBrox = y.indexOf('Broxuras pretendidas: ') + 22;
                var finalMesBrox = y.length;
                var corteMesBrox = y.slice(inicioMesBrox, finalMesBrox);
                console.log(corteMesBrox);
                //atualizacao broxuras
                var elemBrox = document.getElementById('progressBroxMes');
                var progresso = corteMesBrox;
                var barra = setInterval(frame, 65);//seta o intervalo da funcao frame para 65 microsegundos
                function frame() {
                    if (progresso >= corteBrox) {
                        clearInterval(barra);
                    } else {
                        progresso++;
                        elemBrox.style.width = progresso + '%';
                        elemBrox.innerHTML = 'Progresso: ' + progresso * 1 + '%';
                    }
                }
            }
            idMes.addEventListener("change", atualizaHoraMes);
            idMes.addEventListener("change", atualizaReviMes);
            idMes.addEventListener("change", atualizaRevMes);
            idMes.addEventListener("change", atualizaLivrMes);
            idMes.addEventListener("change", atualizaBroxMes);
        }




        //dados videos x
        var inicioVideo = x.indexOf("")+4;
        var finalVideo = x.indexOf("");
        var corteVideo = x.slice(inicioVideo, finalVideo);
        if (x) {
            //document.querySelector('div#mostrVideo').innerHTML = corteVideo;
        }
    }, 1000);
}
contaMetas(dadosNovos);