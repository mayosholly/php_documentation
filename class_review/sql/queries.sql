create database php_class_db;

use php_class_db;

create table products(
    id int primary key auto_increment,
    price decimal(10,2),
    description varchar(255),
    name varchar(255),
    create_at timestamp default now()
);

insert into products(price, description, name)
values (100, 'a pizza', 'pizza'),
(200, 'a bread', 'bread')

