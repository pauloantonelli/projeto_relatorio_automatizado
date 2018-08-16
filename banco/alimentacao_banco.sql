use relatorio;

/*insercao dados pessoa*/
insert into pessoa values('1','Lucia','tia lu');
insert into regpessoa values(default,'1','2018-11-06','1','30','2','1','3','4','quer visita todo domingo');
UPDATE `relatorio`.`pessoa` SET `id` = '3', `nome` = 'Rosanaa', `apelido` = 'vive gravida' WHERE (`id` = '0');



/*insercao dados da entrada*/
insert into entrada values(default,'2018-06-04','07','00','01','00','01','02','vai viajar semana que vem!');
insert into entrada values(default,'2017-05-02','05','10','05','06','09','06','Nem sei oh');
UPDATE `relatorio`.`entrada` SET `dia` = '2018-06-06', `horas` = '8', `minutos` = '3', `revisitas` = '5', `revistas` = '6', `livros` = '7', `broxuras` = '6', `observacoes` = 'dia dificil' WHERE (`idDia` = '2');


/*insercao de dados nas metas anuais*/
insert into metaAnual values('18','100','00','50','80','30','40');
update metaAnual set idAno = '18' where idAno limit 1;

/*insercao de dados nas metas mensais*/
insert into metaMensal values
(default,'Janeiro','10','00','5','8','3'),
(default,'Fevereiro','10','00','5','8','3'),
(default,'Marco','10','00','5','8','3'),
(default,'Abril','10','00','5','8','3'),
(default,'Maio','10','00','5','8','3'),
(default,'Junho','10','00','5','8','3'),
(default,'Julho','10','00','5','8','3'),
(default,'Agosto','10','00','5','8','3'),
(default,'Setembro','10','00','5','8','3'),
(default,'Outubro','10','00','5','8','3'),
(default,'Novembro','10','00','5','8','3'),
(default,'Dezembro','10','00','5','8','3');
update metaMensal set idmes = '1' where idmes limit 12;

alter table metamensal add column mes varchar(10) not null after idMes;

INSERT INTO `relatorio`.`pessoa` (`id`, `nome`, `apelido`) VALUES ('1', 'Lucia', 'tia luh');

INSERT INTO `relatorio`.`regpessoa` (`dia`, `nome`, `horasPessoa`, `minutosPessoa`, `revisitasPessoa`, `revistasPessoa`, `livrosPessoa`, `broxurasPessoa`, `observacoes`) VALUES ('2018-06-08', 'LUCIA', '1', '2', '3', '4', '5', '5', 'nada por enquanto');

