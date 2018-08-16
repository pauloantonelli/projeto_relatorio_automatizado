//pega e exibe o dia
/*function diaHoje(){
    var dia = new Date().toDateString();
    document.getElementById('diaHoje').innerHTML = dia;
    }
function limiteMetas(){
    setInterval(function(){
    var x = document.getElementById('metaMe').value;
    var y = document.getElementById('metaAno').value;
    if(x == 0 && y ==0){
        document.getElementById("msg").style.display = "block";
    }else{
        document.getElementById("msg").style.display = "none";
    }
    }), 5000;
}*/

//funcao escolhe o estudante e exibe seus dados
function dadosEstudantes(a){
    setTimeout(function(){
        var x = document.querySelector("select option[name='"+a+"']").value;
    if(x){
        document.getElementById("msg").style.display = "block";
        document.querySelector('div#msg').innerHTML = x;
        for(var y = 0; y < x.length; y++){
            console.log(y + " = " + x[y]);
        }
    }else{
        document.getElementById("msg").style.display = "none";
    }
    }), 1000;
}
//instancia dos options com seus respectivos dados vindo do banco
var btnEstudante = document.querySelector('select[id="estudantes"]');
//evento ativado pelo select > option que pega o valor do id de cada pessoa e repassa para a funcao dados estudantes
btnEstudante.onchange = function(){
    btnEstudante = document.querySelector('select[id="estudantes"]').value;
    var x = btnEstudante.indexOf("[0]");
        console.log(x);
    ///funcao para ver a iteracao no objeto e enumerar suas posicoes
    dadosEstudantes(btnEstudante[39]);
}