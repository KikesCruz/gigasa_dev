-- create datababase
create database gigasa_db;

drop database gigasa_db;

use database gigasa_db;

create table departments(
id_depto int auto_increment,
depto_name varchar(50) not null,
img_name varchar(30),
view_web varchar(10) default 'off',
status_depto varchar(10) default 'on',

create_at DATETIME default CURRENT_TIMESTAMP,
      
      constraint PK_deptos primary key(
            id_depto asc
      )

)engine=InnoDB default CHARSET=utf8mb4 auto_increment = 100;

create table category(
id_category int auto_increment,
category_name varchar(50) not null,
status_category varchar(10)  default 'on',
create_at DATETIME default current_timestamp,
id_depto int,

      constraint PK_category primary key(
            id_category asc
      ),
      
      constraint FK_depto_category foreign key(id_depto)
            references departments (id_depto)


)engine=InnoDB default CHARSET=utf8mb4 auto_increment=200;


create table sub_category(
id_subcategory int auto_increment,
subcategory_name varchar(50) not null,
status_subcategory varchar(10) default 'on',
create_at DATETIME default current_timestamp,
-- FK --
id_category int,

      constraint PK_sub_category primary key(id_subcategory asc),
      
      constraint FK_category_sub_category foreign key(id_category)
            references category(id_category)

)engine=InnoDB default CHARSET=utf8mb4 auto_increment=300;

create table brands(
id_brand int auto_increment,
brand_name varchar(60) not null,
status_brand varchar(10) default 'on',
create_at DATETIME default current_timestamp,

      constraint PK_brands primary key(id_brand asc)

)engine=InnoDB default CHARSET=utf8mb4 auto_increment=400;


create table product_catalog(
id_catalog int auto_increment,
name_product varchar(200) not null,
image_path_one varchar(30),
image_path_two varchar(30),
image_path_three varchar(30),
product_description TEXT not null,
sku varchar(255) not null,
regular_price decimal(12,2),
wieght int not null,
create_at DATETIME default CURRENT_TIMESTAMP,
-- FK --
id_brand int,
id_subcategory int,

      constraint PK_product_catalog primary key(id_catalog asc),
      
      constraint FK_brands_catalog foreign key(id_brand)
            references brands(id_brand),
            
      constraint FK_sub_category_catalog foreign key(id_subcategory)
            references sub_category(id_subcategory),
            
      constraint UQ_sku unique(sku)
      
)engine=InnoDB default CHARSET=utf8mb4 auto_increment=500;

-- users 
create table users_type(
id_type int auto_increment,
type_name varchar(20) not null,
create_at DATETIME default CURRENT_TIMESTAMP,
modified_at DATETIME,

      constraint PK_user_type primary key(id_type)
)engine=InnoDB default CHARSET=utf8mb4 auto_increment=100;

drop table users_type 

SET FOREIGN_KEY_CHECKS=1;
create table users(
id_user int auto_increment ,
user_name varchar(50) not null,
password text not null,
create_at DATETIME default CURRENT_TIMESTAMP,
modified_at DATETIME,
id_type int,
      
      constraint PK_users primary key(id_user),
      
      constraint FK_users_user_type foreign key(id_type)
            references users_type(id_type)

)engine=InnoDB default CHARSET=utf8mb4 auto_increment=200;