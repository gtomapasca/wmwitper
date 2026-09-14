--
-- 20251228 DML WITPERDB
--
use witperdb;

-- REGISTRAR CUENTA Y USUARIO
-- select * from wip_cuenta_negocio;
insert into wip_cuenta_negocio (ruc_negocio, razon_social, fec_inivig, fec_finvig, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act)
values ('20608326481', 'COMPUCHICLAYO E.I.R.L.', '2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW());
-- select * from wip_cuenta_persona;
insert into wip_cuenta_persona (id_ctapersona, ruc_negocio, tipo_usu, doc_tip, doc_num, fec_inivig, fec_finvig, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act)
values ('1', '20608326481', '0', '99', '99190001', '2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW()),
('2', '20608326481', '0', '99', '99190002', '2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW()),
('3', '20608326481', '0', '99', '99190003', '2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW()),
('4', '20608326481', '0', '99', '99190004', '2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW());
-- select * from wip_usuario;
-- select id_usuario, id_ctapersona, cod_usuario, nick, email, cel, face, cod_tipo_usu, cod_nivel_usu, password, estado from wip_usuario;
insert into wip_usuario (id_ctapersona, cod_usuario, nick, email, password, cod_tipo_usu, cod_nivel_usu, fec_inivig, fec_finvig, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act)
values ('1', '99190001', 'sysadmin', 'sysadmin@mail.com', '12345678', 'UI', '3', '2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW()),
('2', '99190002', 'admin', 'admin@mail.com', '12345678', 'UI', '3', '2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW()),
('3', '99190003', 'operador', 'operador@mail.com', '12345678', 'UI', '1','2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW()),
('4', '99190004', 'anonimo', 'anonimo@mail.com', '12345678', 'UX', '1', '2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW());

-- REGISTRAR CATALOGO DE PRODUCTOS
-- select * from wip_tipo_categoria;
insert into wip_tipo_categoria (cod_tipo, nom_tipo, estado, del, codusu_reg, fecha_reg, codusu_act, fecha_act) 
values ('T1', 'Computo', 0, 0, USER(), NOW(), USER(), NOW());
-- select * from wip_categoria_producto;
insert into wip_categoria_producto (cod_categoria, cod_tipo, nom_categoria, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act) 
values('T101', 'T1', 'Computadoras', 0, 0, USER(), USER(), NOW(), NOW());
-- select * from wip_subcategoria_producto;
insert into wip_subcategoria_producto (cod_categoria, cod_subcategoria, nom_subcategoria, estado, del, codusu_reg, fecha_reg, codusu_act, fecha_act) 
values ('T101','T10101','Computadora Ensamblada', 0, 0, USER(), NOW(), USER(), NOW());
-- select * from wip_fabricante;
insert into wip_fabricante (cod_fabricante, fabricante, marca, pais, estado, del, codusu_reg, fecha_reg, codusu_act, fecha_act) 
values ('FAB001', 'COMPUCHICLAYO', 'COMPUCHICLAYO', 'PERÚ', 0, 0, USER(), NOW(), USER(), NOW());
-- select * from wip_producto_tienda;
insert into wip_producto_tienda (cod_producto, mini_codigo, cod_fabricante, cod_tipcategoria, cod_categoria, cod_subcategoria, producto, descrip_corta, descrip_larga, especificaciones, ind_especificaciones, ind_galeriaImagenes, nom_img, dir_img, precio_venta_internet, stock, almacen_ind, almacen_stock, almacen_est, destacado_ind, estado, estado_prod, public_est, del, codusu_reg, fecha_reg, codusu_act, fecha_act) 
values ('PDT000000000001', '100001', 'FAB001', 'T1', 'T101', 'T10101', 'COMPUTADORA DE ESCRITORIO', 'COMPUTADORA DE ESCRITORIO 12TH GENERACIÓN', 'COMPUTADORA DE ESCRITORIO 12TH GENERACIÓNN', 'COMPUTADORA DE ESCRITORIO 12TH GENERACIÓN PANTALLA 24 PULGADAS', '0', '0', 'pc.jpg', 'PC', 1400.90, 1, '0', 0, '04', '1', 0, '03', '03', 0, USER(), NOW(), USER(), NOW());
