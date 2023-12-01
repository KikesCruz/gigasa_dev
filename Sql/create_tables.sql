create database gigasa_db;
-- drop database gigasa_db

 -- show tables

create table categorias(
 id_cat int auto_increment,
 nombre_cat varchar(50) not null,
 status_category int,
    
      constraint PK_categoria primary key(
            id_cat asc
      )
      
     
)ENGINE=InnoDB default  CHARSET=utf8mb4 auto_increment=100;

-- describe categories;


create table sub_categorias(
  id_catSub int auto_increment,
  nombre_SubCat varchar(60) not null,
  status int not null,
  id_cat int,
      
      constraint PK_subCategoria primary key(
            id_catSub asc
      ),
      
      constraint fk_cat_subCat foreign key(id_cat)
            references categorias(id_cat)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 auto_increment=200;

-- describe categories;


create table marcas(
  id_marca int auto_increment,
  nombre_marca varchar(60) not null,
  status int not null,
  
      constraint PK_id_marca primary key(
            id_marca
      )
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 auto_increment=300;

-- drop table marcas


create table catalogo(
 id_product int auto_increment,
 nombre_product varchar(100),
 img1 varchar(500),
 img2 varchar(500),
 img3 varchar(500),
 sku varchar(100),
 description varchar(600),
 costo decimal(6,2),
 precio decimal(6,2),
 status_product int,
 id_catSub int,
 id_marca int,
 
      constraint PK_category primary key(
            id_product asc
      ),
      
      constraint UQ_sku unique(
            sku
      ),
      
      
         constraint fk_Subcategorias_catalogo foreign key (id_catSub)
            references sub_categorias(id_catSub),
      
         constraint fk_marca_catalogo foreign key (id_marca)
            references marcas(id_marca)

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- describe  catalogo;

create table ecommInvent(
  id_inventario int auto_increment,
  stock int,
  total_stock decimal(12,2),
  id_product int,
  
      constraint PK_catalog_inv primary key(
            id_inventario
      ),
      
      constraint FK_catalog_inv foreign key(id_product)
            references catalogo (id_product)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


create table banners(
id_bin UUID,
banner json not null,
primary key(id_bin)
);

create table if not exists customers(
id_customer UUID not null,
email_ecomm varchar(50) not null,
user_pass VARCHAR(200) not null,
hash_verify VARCHAR(32) not null,
uid_bind_custumer VARCHAR(500),
status INT not null DEFAULT 0,
date_create_user DATETIME DEFAULT CURRENT_TIMESTAMP 
)ENGINE=InnoDB default  CHARSET=utf8mb4;

describe customers

insert into customers values (SYS_GUID(),'enrique','12345','12454654','213423565789978367',1,null)
select * from customers
insert into customers VALUES  
describe customers
create table if not exists shopping_cart(
id_carshop UUID,
products JSON,
date_create_cart DATETIME DEFAULT CURRENT_TIMESTAMP
date_dalete_cart DATETIME,
id_customer_FK UUID,
);






