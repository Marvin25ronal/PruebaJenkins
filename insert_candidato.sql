USE DB_VOTOS;

SELECT * FROM USUARIO;

update usuario set fotografia  = 'img1.png' where carne= 1;
insert into usuario values(1 , 'j2' , 1 , 'jua2n' , 'perez' , 'img2.png');
insert into usuario values('2' , 'j' , 1 , 'jua2n' , 'perez' , 'img2.png');

select * from cargo;
insert into cargo values(1 , 'decano' , 'el decano');

select * from votacion;
insert into votacion values(1 , 'votaciones 2019' , '2019-01-01' , 1 , '2019-04-04');

select * from candidato;
insert into candidato values(1 , 1 , 1 , 0);
insert into candidato values(2 , 1 , 1 , 0);




update candidato set nvotos = 1 where usuario = 1 and cargo = 1 and votacion = 1;



select * from candidato;
