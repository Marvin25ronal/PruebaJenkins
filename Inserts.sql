-- Votaciones
-- delete from votacion;
-- truncate table votacion;
Insert into votacion (fecha_inicio,fecha_fin) values('2018-03-01','2018-03-10');
Insert into votacion (fecha_inicio,fecha_fin) values('2017-03-01','2017-03-10');
Insert into votacion (fecha_inicio,fecha_fin) values('2019-03-01','2019-03-10');
Insert into votacion (fecha_inicio,fecha_fin) values('2016-03-01','2016-03-10');
-- select * from votacion;
-- Planillas
-- select * from planilla;
-- delete from planilla;
-- truncate table Planilla;
Insert into Planilla(votacion,cargo,nvotos,nplanilla) values (1,0,0,1);
Insert into Planilla(votacion,cargo,nvotos,nplanilla) values (1,0,0,2);
Insert into Planilla(votacion,cargo,nvotos,nplanilla) values (1,0,0,3);
Insert into Planilla(votacion,cargo,nvotos,nplanilla) values (1,0,0,4);
Insert into Planilla(votacion,cargo,nvotos,nplanilla) values (1,0,0,5);
Insert into Planilla(votacion,cargo,nvotos,nplanilla) values (1,0,0,6);
Insert into Planilla(votacion,cargo,nvotos,nplanilla) values (1,0,0,7);

insert into facultad(nombre) values ("Ingenieria");
insert into facultad(nombre) values ("Agronomia");
insert into facultad(nombre) values ("Arquitectura");
insert into facultad(nombre) values ("Derecho");
insert into facultad(nombre) values ("Humanidades");

insert into escuela(id_facultad,nombre)values(1,"Escuela de Ingenieria Ciencias y Sistemas");
insert into escuela(id_facultad,nombre)values(1,"Escuela Tecnica");
insert into escuela(id_facultad,nombre)values(1,"Escuela de Estudios de Postgrado");
insert into escuela(id_facultad,nombre)values(1,"Escuela de Ingenieria civil");
insert into escuela(id_facultad,nombre)values(1,"Escuela de Ingenieria Quimica");
select carne from usuario;
insert into planilla_usuario(id_usuario,id_planilla,fecha_registro)values(1012086,1,'2018-03-05');
insert into planilla_usuario(id_usuario,id_planilla,fecha_registro)values(3231384,1,'2018-03-05');
insert into planilla_usuario(id_usuario,id_planilla,fecha_registro)values(5075763,'2018-03-05');
insert into planilla_usuario(id_usuario,id_planilla,fecha_registro)values(5111430,1,'2018-03-05');
insert into planilla_usuario(id_usuario,id_planilla,fecha_registro)values(5963978,1,'2018-03-05');
insert into planilla_usuario(id_usuario,id_planilla,fecha_registro)values(6846705,1,'2018-03-05');
select * from usuario_escuela;
insert into usuario_escuela(usuario,escuela) values (1012086,1);
insert into usuario_escuela(usuario,escuela) values (3231384,2);
insert into usuario_escuela(usuario,escuela) values (5075763,3);
insert into usuario_escuela(usuario,escuela) values (5111430,4);
insert into usuario_escuela(usuario,escuela) values (5963978,5);
