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
var btnEstudante = document.querySelector('select[id="estudantes2"]');
//evento ativado pelo select > option que pega o valor do id de cada pessoa e repassa para a funcao dados estudantes
btnEstudante.onchange = function(){
    btnEstudante = document.querySelector('select[id="estudantes2"]').value;
    var x = btnEstudante.indexOf("[0]");
        console.log(x);
    ///funcao para ver a iteracao no objeto e enumerar suas posicoes
    dadosEstudantes(2);
}