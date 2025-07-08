create database dbbanhang;
use dbbanhang;
create table Admin (
	id int auto_increment primary key,
    username varchar(50) not null,
    password varchar(255) not null,
    email varchar(100),
    role varchar(20)
);
create table Category (
	id int auto_increment primary key,
	name varchar(100) not null,
    description text,
    status boolean default true
);