create database xoolar;
use xoolar; 

create table user (
	id int not null auto_increment primary key,
	username varchar(50) not null,
	name varchar(50) not null,
	lastname varchar(50) not null,
	email varchar(255) not null,
	password varchar(60) not null,
	is_active boolean not null default 1,
	is_admin boolean not null default 0,
	created_at datetime
);

insert into user (username,password,is_admin,created_at) value ("admin",sha1(md5("admin")),1,NOW());

create table team(
	id int not null auto_increment primary key,
	name varchar(50) not null,
	is_favorite boolean not null,
	user_id int not null,
	foreign key (user_id) references user(id)
);

create table alumn(
	id int not null auto_increment primary key,
	image varchar(50) not null,
	name varchar(50) not null,
	lastname varchar(50) not null,
	email varchar(255) not null,
	address varchar(60) not null,
	phone varchar(60) not null,
	c1_fullname varchar(100),
	c1_address varchar(100),
	c1_phone varchar(100),
	c1_note varchar(100),
	c2_fullname varchar(100),
	c2_address varchar(100),
	c2_phone varchar(100),
	c2_note varchar(100),
	is_active boolean not null default 1,
	created_at datetime,
	user_id int not null,
	foreign key (user_id) references user(id)
);

create table alumn_team(
	id int not null auto_increment primary key,
	alumn_id int not null,
	foreign key (alumn_id) references alumn(id),
	team_id int not null,
	foreign key (team_id) references team(id)
);
/* 1.- Asistencia, 2.- Falta, 3.- Retardo, 4.- Justificacion */
create table assistance(
	id int not null auto_increment primary key,
	kind_id int,
	date_at date not null,
	alumn_id int not null,
	foreign key (alumn_id) references alumn(id),
	team_id int not null,
	foreign key (team_id) references team(id)
);
/* Null Normal, 1.- Buena, 2.- Exelente, 3.- Mala, 4.- Muy Mala */

create table behavior(
	id int not null auto_increment primary key,
	kind_id int,
	date_at date not null,
	alumn_id int not null,
	foreign key (alumn_id) references alumn(id),
	team_id int not null,
	foreign key (team_id) references team(id)
);

create table block(
	id int not null auto_increment primary key,
	name varchar(100),
	team_id int not null,
	foreign key (team_id) references team(id)
);

create table calification(
	id int not null auto_increment primary key,
	val double,
	alumn_id int not null,
	foreign key (alumn_id) references alumn(id),
	block_id int not null,
	foreign key (block_id) references block(id)
);
