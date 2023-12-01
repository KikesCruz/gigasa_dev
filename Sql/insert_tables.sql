-- insert categorias
insert into categorias values(null,'dermatoligia',1);

select * from categorias;
truncate categorias;
-- insert sub categorias
insert into sub_categorias values (null,'analgesico',1,1)

-- insert marcas
insert into marcas values(null,'Tylenol',1);

-- insert catalogo
insert into catalogo values(null,'Tylenol paracetamol 20 tabletas 500mg','https://hfprod.farmaciasanpablo.com.mx/sys-master-azureproductimages','','','7501100088095',1,1,1);

select * from sub_categorias
select 
catal.nombre_product,
catal.sku,
catal.img1,
catal.img2,
catal.img3,
sc.nombre_SubCat,
cat.nombre_cat,
m.nombre_marca 
from catalogo catal
inner join sub_categorias sc on(sc.id_catSub = catal.id_catSub)
inner join marcas m on (m.id_marca = catal.id_marca)
inner join categorias cat on (cat.id_cat = sc.id_cat)

select * from marcas where nombre_marca regexp 'valuacion'

update catalogo set id_CatSub = 2 where sku = '7501100088095'

select cat.nombre_product,cat.sku,cat.img1,cat.img2,cat.img3,inv.stock,inv.price  from inventario inv
inner join catalogo cat on (cat.id_product = inv.id_product)

insert into inventario values (null,2,330.40,1)

select * from catalogo ;
SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE table1;
TRUNCATE table2;

SET FOREIGN_KEY_CHECKS = 1;

select * from catalogo;
select * from marcas

select count(nombre_SubCat) from sub_categorias 
where
nombre_SubCat like '%analgesicos%' 
and  id_cat = (select id_cat from sub_categorias limit 1) ; 

select * from sub_categorias
select sc.nombre_SubCat, c.nombre_cat  from sub_categorias sc 
inner join categorias c on (sc.id_cat = c.id_cat)

select * from sub_categorias where  id_cat = :id_cat and nombre_SubCat  like '%analgesico%'