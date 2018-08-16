use relatorio;

drop database relatorio;

drop table regpessoa;

ALTER TABLE `relatorio`.`entrada` DROP COLUMN `idpessoa`;

delete from pessoa where idpessoa = '3';