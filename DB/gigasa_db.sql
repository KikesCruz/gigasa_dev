-- create datababase
create database gigasa_db;

drop database gigasa_db;

use database gigasa_db;

create table departments(
id_depto int auto_increment,
depto_name varchar(50) not null,
path_img varchar(200) default 'url_vacio',
view_web varchar(10) default 'off',
status_depto varchar(10) default 'on',

create_at DATETIME default CURRENT_TIMESTAMP,
      
      constraint PK_deptos primary key(
            id_depto asc
      )

)engine=InnoDB default CHARSET=utf8mb4 auto_increment = 100;

create table categories(
id_category int auto_increment,
category_name varchar(50) not null,
img_path varchar(200) default "empty_url",
view_web varchar(10) default 'off',
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
            references categories(id_category)

)engine=InnoDB default CHARSET=utf8mb4 auto_increment=300;

create table brands(
id_brand int auto_increment,
brand_name varchar(60) not null,
img_path varchar(200),
view_web varchar(10) default 'off',
status_brand varchar(10) default 'on',
create_at DATETIME default current_timestamp,

      constraint PK_brands primary key(id_brand asc)

)engine=InnoDB default CHARSET=utf8mb4 auto_increment=400;


drop table product_catalog

create table product_catalog(
id_catalog int auto_increment,
sku varchar(255) not null,
name_product varchar(200) not null,
image_path_one varchar(200) default 'vacio',
image_path_two varchar(200) default 'vacio',
image_path_three varchar(200) default 'vacio',
image_path_four varchar(200) default 'vacio',
image_path_five varchar(200) default 'vacio',
product_description TEXT not null,
price decimal(12,2)not null,
cost decimal(12,2) not null,
status varchar(10) default 'on',
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

create table inventory(
id_inventory int auto_increment,
stock int,
status VARCHAR(10),
date_creat DATETIME default CURRENT_TIMESTAMP,
id_catalog int,

	CONSTRAINT PK_inventory primary key(id_inventory),
		
	CONSTRAINT FK_inventory_catalogo foreign key(id_catalog)
		REFERENCES product_catalog(id_catalog)

)engine=InnoDB default CHARSET=utf8mb4  auto_increment=600;



create table inventario_almacen(
id_cambio int auto_increment,
id_almacen int,
id_inventory int,
cantidad int,
fecha_mov DATETIME default CURRENT_TIMESTAMP,


	CONSTRAINT PK_inventario_almacen PRIMARY KEY(id_cambio asc),

	
	CONSTRAINT FK_movimientos_almacen foreign key(id_almacen)
		REFERENCES almacen(id_almacen),	
		
			
	CONSTRAINT FK_movimientos_inventory foreign key(id_inventory)
		REFERENCES inventory(id_inventory)
);

drop table almacen
create table if not exists almacen(
id_almacen int auto_increment,
stock_almacen int,
precio_venta decimal(12,2) not null,
costo decimal(12,2) not null,
estatus varchar(10) default 'on',
fecha_ingreso DATETIME default CURRENT_TIMESTAMP,
id_suc int,


	CONSTRAINT PK_almacen PRIMARY KEY (id_almacen),
	
	CONSTRAINT FK_almacen_sucursal FOREIGN KEY(id_suc)
		REFERENCES sucursal(id_suc)
	
	
)engine=INNODB default CHARSET=utf8mb4 AUTO_INCREMENT=700;

create table if not exists sucursal(
id_suc int auto_increment,
sucursal_name varchar(60) not null,
fecha_alta DATETIME default CURRENT_TIMESTAMP,
sucursal_status varchar(10) default 'on',
	
	CONSTRAINT PK_sucursal PRIMARY KEY(id_suc asc)

);

-- users 
create table users_type(
id_type int auto_increment,
type_name varchar(20) not null,
create_at DATETIME default CURRENT_TIMESTAMP,
modified_at DATETIME,

      constraint PK_user_type primary key(id_type)
)engine=InnoDB default CHARSET=utf8mb4 auto_increment=100;

drop table users_type 

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


SET FOREIGN_KEY_CHECKS=0;