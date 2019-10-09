drop database IF EXISTS db_votos;

create database db_votos;
use  db_votos;

CREATE TABLE Votacion(
	id int auto_increment primary key,
    nombre varchar(255) ,
    fecha_inicio date,
	estado int,
    fecha_fin date
);

CREATE TABLE cargo(
	id int auto_increment primary key,
    nombre varchar(255),
    descripcion text
);


CREATE TABLE facultad(
 id int auto_increment primary key,
 nombre varchar(255)
);
CREATE TABLE escuela(
	id int auto_increment primary key,
    id_facultad int,
    nombre varchar(255)
    ,foreign key(id_facultad) references facultad(id)
);

create table usuario(
	carne int primary key,
    pass varchar(255),
    tipo_usuario int,
    nombre varchar(255),
    correo varchar(255),
	fotografia varchar(500)
);


CREATE TABLE candidato(
	usuario INT ,
    cargo INT, 
    votacion int,
    nvotos int,
    primary key(usuario , cargo , votacion),
    foreign key(usuario) REFERENCES usuario(carne),
    foreign key(cargo) REFERENCES cargo(id),
    foreign key(votacion) REFERENCES votacion(id)
);

CREATE TABLE usuario_escuela(
	usuario int ,
    escuela int ,
    primary key(usuario , escuela),
	foreign key(escuela) references escuela(id),
    foreign key(usuario) references usuario(carne)
);

create table ya_voto(
	usuario int ,
    votacion int,
    cargo INT,
    primary key (usuario , votacion , cargo),
    foreign key(usuario) references usuario(carne),
    foreign key(votacion) references votacion(id),
    foreign key(cargo) REFERENCES cargo(id)
);

CREATE TABLE noticia(
	id int auto_increment primary key,
    nombre_noticia varchar(255),
    texto text,
    creador INT,
    imagen varchar(255),
    foreign key(creador) references usuario(carne)
);

CREATE TABLE foro(
	id int auto_increment primary key,
    creador int,
    texto text,
    titulo varchar(255),
    imagen varchar(255),
    foreign key(creador) references usuario(carne)
);


CREATE TABLE mensaje_foro(
	id int auto_increment primary key,
    texto text,
    foro int,
    comentarista int ,
    foreign key(foro) references foro(id),
    foreign key(comentarista) references usuario(carne)
);



ALTER TABLE `db_votos`.`candidato` 
ADD COLUMN `informacion` MEDIUMTEXT NULL AFTER `nvotos`;
