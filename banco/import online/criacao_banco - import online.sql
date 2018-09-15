create table if not exists pessoa(
    id int not null,
    nome varchar(255) not null,
    apelido varchar(255),
    primary key(id)
)ENGINE=InnoDB default charset = utf8;

create table if not exists regPessoa(
    id int not null auto_increment,
    idPessoa int not null,
    dia date not null,
    horasPessoa int(24) unsigned,
    minutosPessoa int(60) unsigned,
    revisitasPessoa int unsigned,
    revistasPessoa int unsigned,
    livrosPessoa int unsigned,
    broxurasPessoa int unsigned,
    observacoes text,
    primary key(id),
    foreign key(idPessoa) references pessoa(id)
);

create table if not exists entrada(
    idDia int not null auto_increment,
    dia date not null,
    horas int(24) unsigned,
    minutos int(60) unsigned,
    revisitas int unsigned,
    revistas int unsigned,
    livros int unsigned,
    broxuras int unsigned,
    observacoes text,
    primary key(idDia)
)ENGINE=InnoDB default charset = utf8;

create table if not exists metaAnual(
	idAno year not null,
    hora int not null default '1',
    revisista int not null default '1',
    revista int not null default '1',
    livro int not null default '1',
    broxura int not null default '1',
    primary key(idAno)
)ENGINE=InnoDB default charset = utf8;

create table if not exists metaMensal(
	idMes int(12) not null auto_increment,
    hora int not null default '1',
    revisista int not null default '1',
    revista int not null default '1',
    livro int not null default '1',
    broxura int not null default '1',
    primary key(idmes)
)ENGINE=InnoDB default charset = utf8;