drop database if exists autoservis;

create database autoservis default character set utf8;

# za byethost
#alter database b17_21947030_autoservis default character set utf8;
#sipavanje
#c:\xampp\mysql\bin\mysql -uedunova -pedunova --default_character_set=utf8 < C:\xampp\htdocs\Servis\mojMaliServis.sql


use autoservis;

create table radionica(
sifra int primary key not null auto_increment,
naziv varchar (20),
nadredjeni int,
datum_osnutka datetime

);

create table zaposlenik(
sifra int primary key  not null auto_increment,
ime varchar(20) not null,
prezime varchar(20) not null,
ulica_i_broj varchar (50) ,
mjesto varchar (20) ,
broj_mobitela varchar(20) ,
email varchar (20) ,
datum_rodjenja datetime ,
datum_pocetka_rada datetime  ,
oib varchar (11) ,
broj_ugovora varchar(20) ,
radionica int ,
radni_nalog int,
napomena varchar (200)

);

create table radni_nalog (
sifra int primary key not null auto_increment,
radionica int not null,
zaposlenik int not null,
vozilo int not null,
kilometraza decimal (10,1),
opis_kvara varchar (200),
datum_pocetka datetime,
datum_zavrsetka datetime,
napomena varchar (200)

);

create table zaposlenik_radni_nalog (
zaposlenik int not null,
radni_nalog int not null

);

create table vozilo(
sifra int not null primary key auto_increment,
broj_sasije varchar(20) not null,
vlasnik int not null,
datum_prve_registracije datetime,
registarska_oznaka varchar (20),
marka_vozila varchar (20),
oznaka_modela varchar (20),
napomena varchar (200)

);

create table vlasnik(
sifra int primary key not null auto_increment,
ime varchar(20) not null,
prezime varchar(20) not null,
ulica_i_broj varchar (50) ,
mjesto varchar (20) ,
broj_mobitela varchar(20) ,
email varchar (20) ,
datum_rodjenja datetime ,
oib varchar (11) ,
napomena varchar (200)

);


alter table zaposlenik add foreign key (radionica) references radionica(sifra);

alter table radni_nalog add foreign key (radionica) references radionica(sifra);
alter table radni_nalog add foreign key (vozilo) references vozilo(sifra);

alter table zaposlenik_radni_nalog add foreign key (zaposlenik) references zaposlenik(sifra);
alter table zaposlenik_radni_nalog add foreign key (radni_nalog) references radni_nalog(sifra);

alter table vozilo add foreign key (vlasnik) references vlasnik(sifra);





insert into radionica (sifra,naziv,datum_osnutka,nadredjeni) values
(null,'mehanika','2008-04-16',1),
(null,'elektrika','2008-04-16',2),
(null,'limarija','2008-04-16',3);

insert into zaposlenik (sifra,ime,prezime,ulica_i_broj,mjesto,broj_mobitela,email,datum_rodjenja,datum_pocetka_rada,oib,broj_ugovora) values
(null,'Ivica','Ivić','Jadranska ulica 5','Vinkovci','098111111','ivicaivic@gmail.com','1964-5-25','2008-04-16','12345678901','1'),
(null,'Marko','Marić','Savska ulica 5','Vinkovci','098111112','markomaric@gmail.com','1969-3-2','2008-04-16','12345678902','2'),
(null,'Tomislav','Tomić','Dravska ulica 14','Osijek','098111113','tomislav@gmail.com','1978-11-04','2008-04-16','12345678903','3'),
(null,'Ivan','Ivić','Zadarska ulica 14','Osijek','098111114','ivica@gmail.com','1987-12-25','2008-04-26','12345678904','4'),
(null,'Andrija','Hebrang','Hebrangova ulica 14','Ilok','098111115','hebrang@gmail.com','1988-01-01','2008-04-26','12345678905','5'),
(null,'Josip','Jozić','Strossmayerova ulica 25','Tovarnik','098111116','joza@gmail.com','1975-01-18','2008-04-26','12345678906','6'),
(null,'Krešo','Jozić','Strossmayerova ulica 27','Tovarnik','098111117','kreso@gmail.com','1977-06-18','2008-04-26','12345678907','7'),
(null,'Karolina','Antolović','Josipa Broza Tita 25','Osijek','098111118','Karolina@gmail.com','1998-05-25','2010-08-06','12345678908','8'),
(null,'Antonela','Harambaša','Vinkovačka ulica 1','Osijek','098111119','a1997@gmail.com','1997-04-20','2018-08-06','12345678909','9');

insert into vlasnik (sifra,ime,prezime,ulica_i_broj,mjesto,broj_mobitela,email,oib) values
(null,'Robert','Marjanović','Kneza Branimira 78','Osijek','091123654789','robi@yahoo.com','22556633221'),
(null,'Alen','Marković','25.svibnja 5' ,'Osijek','091225545554','alen@yahoo.com','25454569874'),
(null,'Ivan','Kobalt','J.J. Strossmayera 34' ,'Osijek','095123456','ivan123@gmail.com','85698541254'),
(null,'Boris','Jozinović','Iločka ulica 5' ,'Osijek','0985632541','boris@gmail.com','98563258745'),
(null,'Ivan','Jnaković','Zapadna ulica 56' ,'Osijek','09325412','zapadni@gmail.com','25874569654'),
(null,'Mario','Kazanović','Istočna ulica 5' ,'Osijek','0985647777','marac@gmail.com','25636666954'),
(null,'Ivan','Kotromanović','Gajeva 5' ,'Bilje','098565656','birtija@gmail.com','22846575251'),
(null,'James','Bond','Baruna Trenka 1','Osijek','0981111120','007@gmail.com','12345678910'),
(null,'Hercul','Stević','Sarajevska ulica 34','Osijek','0981111121','sarajlija@gmail.com','12345678910');

insert into vozilo (sifra,broj_sasije,vlasnik,datum_prve_registracije,registarska_oznaka,marka_vozila,oznaka_modela) values
(null,'WDB2110701A123456','1','2004-05-05','OS123AH','MERCEDES','E55AMG'),
(null,'WDB2110701A525252','1','2006-11-05','OS122AH','MERCEDES','E55AMG'),
(null,'WDB2050701A123456','1','2014-05-05','OS178F','MERCEDES','C220CDI'),
(null,'WDB9612541C125844','2','2018-04-15','OS991','MERCEDES','ACTROS 1841'),
(null,'YGHZ2565HHJ001','3','2018-02-25','NA558GT','OPEL','VECTRA 2,0 GSI'),
(null,'FG12KJ2112LLKO1','4','2011-02-02','BM25811','CITROEN','XM'),
(null,'121GGG111GUOUOUOU','5','2011','OS111AB','ZASTAVA','750'),
(null,'FGRRTAJJE164646','6','2001-11-28','GY2222F','SUZUKI','VITARA'),
(null,'25HH255HKOK1235','7','2017-05-04','KR255KR','KIA','SPORTAGE'),
(null,'GHJJ98569856985','8','2015-12-12','BM1111BM','FERRARI','355'),
(null,'WZZZW123555KOL','9','2011-05-05','GHJ222G','FERRARI','LA FERRARI');


update zaposlenik set  radionica=1 where sifra=4;
update zaposlenik set  radionica=1 where sifra=5;
update zaposlenik set  radionica=2 where sifra=6;
update zaposlenik set  radionica=2 where sifra=7;
update zaposlenik set  radionica=3 where sifra=8;
update zaposlenik set  radionica=3 where sifra=9;

update zaposlenik set radionica=1 where sifra=1;
update zaposlenik set radionica=2 where sifra=2;
update zaposlenik set radionica=3 where sifra=3;

insert into radni_nalog (sifra,radionica,zaposlenik,vozilo,kilometraza,opis_kvara,datum_pocetka) values
(null,'1','4','1','205123','nešto lupa u prednjem trapu sa lijeve strane','2008-04-16'),
(null,'1','5','4','141568','redovni servis na vozilu','2008-04-16'),
(null,'2','6','7','125','update navigacije i pranje vozila','2008-04-16'),
(null,'2','7','10','1','svijetli kontrolna lampica elektronike ABS-a','2008-04-16'),
(null,'3','8','10','1','popraviti oštećenje laka na prednjem braniku','2008-04-16'),
(null,'3','9','9','123','procijena popravka nakon udesa','2008-04-16');

