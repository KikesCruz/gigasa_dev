-- create datababase
create database gigasa_db;

drop database gigasa_db;

use database gigasa_db;

drop table sub_categories 

create table categories(
id_category int auto_increment,
name_category varchar(50) not null,
img_path varchar(200) default 'url_empty',
view_web varchar(10) default 'off',
status varchar(15) default 'activado',
created DATETIME default CURRENT_TIMESTAMP,

      constraint PK_category primary key(id_category asc)

)engine=InnoDB default CHARSET=utf8mb4 auto_increment = 100;


drop table sub_categories 
create table sub_categories(
id_sub_category int auto_increment,
id_category int,
name_sub_category varchar(50) not null,
status_subcategory varchar(15) default 'activado',
created DATETIME default current_timestamp,

      constraint PK_category primary key(id_sub_category asc),
      
      constraint FK_depto_category foreign key(id_category)
            references categories (id_category)

)engine=InnoDB default CHARSET=utf8mb4 auto_increment=200;


create table type_products(
id_type_product int auto_increment,
-- FK --
id_sub_category int,
name_type varchar(50) not null,
status varchar(10) default 'on',
created DATETIME default current_timestamp,

      constraint PK_type_products primary key(id_type_product asc),
      
      constraint FK_sub_categories foreign key(id_sub_category)
            references sub_categories(id_sub_category)

)engine=InnoDB default CHARSET=utf8mb4 auto_increment=300;

create table brands(
id_brand int auto_increment,
name_brand varchar(60) not null,
img_path varchar(200),
view_web varchar(10) default 'off',
status_brand varchar(10) default 'on',
created DATETIME default current_timestamp,

      constraint PK_brands primary key(id_brand asc)

)engine=InnoDB default CHARSET=utf8mb4 auto_increment=400;


create table products(
id_product int auto_increment,
-- FK --
id_brand int,
id_type_product int,

sku varchar(255) not null,
name_product varchar(200) not null,
image_path_one varchar(200) default 'vacio',
image_path_two varchar(200) default 'vacio',
image_path_three varchar(200) default 'vacio',
image_path_four varchar(200) default 'vacio',
image_path_five varchar(200) default 'vacio',
product_description TEXT not null,

status varchar(10) default 'on',
created DATETIME default CURRENT_TIMESTAMP,


      constraint PK_products primary key(id_product  asc),
      
      constraint FK_brands_products foreign key(id_brand)
            references brands(id_brand),
            
      constraint FK_type_products_products foreign key(id_type_product)
            references type_products(id_type_product),
            
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