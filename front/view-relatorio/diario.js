//RELATORIO DO DIA
//soma dos Dados Gerais
var dados = document.getElementById('soma').innerHTML;
function pegaDados(dados){
    setTimeout(function(){
        var x = dados;
        //console.log(dados);
        //dados publicacoes
        var inicioRevs = x.indexOf("stas")+4;
        var finalRevs = x.indexOf("livros");
        var inicioLivr = x.indexOf('vros')+4;
        var finalLivr = x.indexOf('broxuras');
        var inicioBrox = x.indexOf('uras')+4;
        var finalBrox = x.length;
        var corteRevs = x.slice(inicioRevs, finalRevs);
        var corteLivr = x.slice(inicioLivr, finalLivr);
        var corteBrox = x.slice(inicioBrox, finalBrox);
        var totPubli = (parseInt(corteRevs) + parseInt(corteLivr) + parseInt(corteBrox));
        if (x) {
            document.querySelector('div#pub').innerHTML = totPubli;
        }
        //dados videos x
        var inicioVideo = x.indexOf("")+4;
        var finalVideo = x.indexOf("");
        var corteVideo = x.slice(inicioVideo, finalVideo);
        if (x) {
            //document.querySelector('div#mostrVideo').innerHTML = corteVideo;
        }
        //dados horas e minutos
            //horas
        var inicioHors = x.indexOf("oras")+4;
        var finalHors = x.indexOf("minutos");
        var corteHors = x.slice(inicioHors, finalHors);
            //minutos
        var inicioMin = x.indexOf("utos")+4;
        var finalMin = x.indexOf("revisitas");
        var corteMin = x.slice(inicioMin, finalMin);
        var aux = corteMin / 60;//conta os minutos e somar nas horas
        if(aux >= 1){
            corteHors = (parseInt(corteHors) + parseInt(aux));
            document.querySelector('div#horas').innerHTML = corteHors; 
        }else{
            document.querySelector('div#horas').innerHTML = corteHors;
        }
        //dados revisitas
        var inicioRev = x.indexOf("itas")+4;
        var finalRev = x.indexOf("revistas");
        var corteRev = x.slice(inicioRev, finalRev);
        if (x) {
            document.querySelector('div#revisitas').innerHTML = corteRev;
        }
    }, 1000);
}
pegaDados(dados);

//dados estudos
var estudos = document.getElementById('estudantes').innerHTML;
function quantEstudante(estudos){
    setTimeout(function(){
        var x = estudos;
        //dados publicacoes
        var inicioEstud = x.indexOf("ntes");
        var finalEstud = x.length;
        var corteEstud = x.slice(inicioEstud, finalEstud);
        if (x) {
            document.querySelector('div#estudos').innerHTML = corteEstud;
        }
    },1000)
}
quantEstudante(estudos);