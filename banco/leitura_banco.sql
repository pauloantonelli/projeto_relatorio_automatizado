use relatorio;

describe entrada;

describe pessoa;

describe metaAnual;

describe metaMensal;

/*select * from entrada;*/
select * from entrada;
SELECT sum(horas), sum(minutos), sum(revisitas), sum(revistas), sum(livros), sum(broxuras) 
FROM entrada WHERE YEAR(dia) = 2018 AND MONTH(dia) = 8;

select * from pessoa;
SELECT count(nome) FROM pessoa;

select * from regpessoa;

select * from metaAnual;

select * from metaMensal;

/**/
SELECT idpessoa from pessoa where nome like 'nomePessoa%';
/*ver as infos de entrada e o nome da pessoa*/
select dia, entrada.horas, entrada.minutos, entrada.revisitas, entrada.revistas, entrada.livros, entrada.broxuras, 
pessoa.nome, entrada.horasPessoa, entrada.minutosPessoa, entrada.revisitasPessoa, entrada.revistasPessoa, entrada.livrosPessoa, entrada.broxurasPessoa 
from entrada join pessoa on entrada.idpessoa = pessoa.idpessoa;

/*select com join unindo as tabelas pessoas e registro da pessoa*/
/*preciso obter as ids unicas sem repeticao*/
select p.*, r.*
from pessoa as p inner join regpessoa as r
on p.id = r.idpessoa
order by p.nome;


/*select com join unindo as tabelas pessoas e registro da pessoa*/
/*pesquisar as tuplas de uma determinada id*/
select p.*, r.* 
from pessoa as p inner join regpessoa as r 
on p.id = r.idpessoa
where idPessoa = '1'
order by p.nome;


/*SELECT count (*)
FROM Empregado, Pagamento
WHERE Empregado.id = Pagamento.empregado_id
AND Empregado.idade < 25 AND Pagamento.valor > 1500

O resultado da consulta SQL é:

SELECT Departamento.nome
FROM Departamento, Empregado
WHERE Departamento.id = Empregado.departamento_id
AND Empregado.salario > 2500*/