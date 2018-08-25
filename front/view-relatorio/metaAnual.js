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
            var idAno = document.getElementById('anualMeta');
            //progresso meta ano / hora
            function atualizaHoraAno() {
                //selecao dos dados
                var y = idAno.value;
                var inicioAnoHors = y.indexOf('Horas pretendidas: ')+19;
                var finalAnoHors = y.indexOf('Revisitas');
                var corteAnoHors = y.slice(inicioAnoHors, finalAnoHors);
                //atualizacao hora
                var elemHora = document.getElementById('progressHoraAnual');
                var progresso = corteHors % corteAnoHors;
                console.log(corteHors);
                console.log(corteAnoHors);
                console.log(parseInt(progresso));
                var barra = setInterval(frame, 65);//seta o intervalo da funcao frame para 65 microsegundos
                function frame() {
                    if (corteHors < progresso) {
                        clearInterval(barra);
                    }else{
                        progresso++;
                        elemHora.style.width = progresso + '%';
                        elemHora.innerHTML = 'Progresso: ' + progresso * 1 + '%';
                    }
                }
            }
            function atualizaReviAno() {
                //selecao dos dados
                var y = idAno.value;
                var inicioAnoRevi = y.indexOf('Revisitas pretendidas: ') + 23;
                var finalAnoRevi = y.indexOf('Revistas');
                var corteAnoRevi = y.slice(inicioAnoRevi, finalAnoRevi);
                console.log(corteAnoRevi);
                //atualizacao revisitas
                var elemRevi = document.getElementById('progressReviAnual');
                var progresso = corteAnoRevi;
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
            function atualizaRevAno() {
                //selecao dos dados
                var y = idAno.value;
                var inicioAnoRev = y.indexOf('Revistas pretendidas: ') + 22;
                var finalAnoRev = y.indexOf('Livros');
                var corteAnoRev = y.slice(inicioAnoRev, finalAnoRev);
                console.log(corteAnoRev);
                //atualizacao revistas
                var elemRev = document.getElementById('progressRevAnual');
                var progresso = corteAnoRev;
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
            function atualizaLivrAno() {
                //selecao dos dados
                var y = idAno.value;
                var inicioAnoLivr = y.indexOf('Livros pretendidos: ') + 20;
                var finalAnoLivr = y.indexOf('Broxuras');
                var corteAnoLivr = y.slice(inicioAnoLivr, finalAnoLivr);
                console.log(corteAnoLivr);
                //atualizacao livros
                var elemLivr = document.getElementById('progressLivrAnual');
                var progresso = corteAnoLivr;
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
            function atualizaBroxAno() {
                //selecao dos dados
                var y = idAno.value;
                var inicioAnoBrox = y.indexOf('Broxuras pretendidas: ') + 22;
                var finalAnoBrox = y.length;
                var corteAnoBrox = y.slice(inicioAnoBrox, finalAnoBrox);
                console.log(corteAnoBrox);
                //atualizacao broxuras
                var elemBrox = document.getElementById('progressBroxAnual');
                var progresso = corteAnoBrox;
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
            idAno.addEventListener("change", atualizaHoraAno);
            idAno.addEventListener("change", atualizaReviAno);
            idAno.addEventListener("change", atualizaRevAno);
            idAno.addEventListener("change", atualizaLivrAno);
            idAno.addEventListener("change", atualizaBroxAno);
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