--
-- 20251228 DML WITPERDB
--
use witperdb;

--
-- REGISTRAR CUENTA Y USUARIO
--
-- select * from wip_cuenta_negocio;
insert into wip_cuenta_negocio (ruc_negocio, razon_social, fec_inivig, fec_finvig, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act)
values ('20608326481', 'COMPUCHICLAYO E.I.R.L.', '2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW());
-- select * from wip_cuenta_persona;
insert into wip_cuenta_persona (id_ctapersona, ruc_negocio, tipo_usu, doc_tip, doc_num, fecha_nac, nombres, fec_inivig, fec_finvig, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act)
values ('1', '20608326481', '0', '99', '99190001', '2020-01-01', 'Sys Admin', '2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW()),
('2', '20608326481', '0', '99', '99190002', '2020-01-01', 'Admin', '2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW()),
('3', '20608326481', '0', '99', '99190003', '2020-01-01', 'Operador', '2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW()),
('4', '20608326481', '0', '99', '99190004', '2020-01-01', 'Invitado', '2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW());
-- select * from wip_usuario;
insert into wip_usuario (id_ctapersona, cod_usuario, nick, email, password, cod_tipo_usu, cod_nivel_usu, fec_inivig, fec_finvig, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act)
values ('1', '99190001', 'sysadmin', 'sysadmin@mail.com', '12345678', 'UX', '0', '2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW()),
('2', '99190002', 'gerente', 'admin@mail.com', '12345678', 'UI', '1', '2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW()),
('2', '99190002', 'admin', 'admin@mail.com', '12345678', 'UI', '2', '2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW()),
('3', '99190003', 'supervisor', 'operador@mail.com', '12345678', 'UI', '3','2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW()),
('3', '99190003', 'operador', 'operador@mail.com', '12345678', 'UI', '4','2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW()),
('4', '99190004', 'invitado', 'invitado@mail.com', '12345678', 'UE', '5', '2020-01-01', '2099-12-30', 0, 0, USER(), USER(), NOW(), NOW());

--
-- REGISTRAR OPCIONES DE MENU
--
-- select * from wip_perfil_usu
insert into wip_perfil_usu(cod_perfil, nom_perfil, cod_tipo_cat, cod_tipo_perf, cod_nivel_perf, vigencia_ini, vigencia_fin, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act)
values('PF01', 'PF_SUP_ADM', 'GM01', 'PC', 3, '2020-01-01', '2099-01-01', 0, 0, USER(), USER(), NOW(), NOW()),
('PF05', 'PF_OP_PER_VEN', 'GM05', 'OP', 5, '2020-01-01', '2099-01-01', 0, 0, USER(), USER(), NOW(), NOW());
-- select * from wip_deta_usua_perf
insert into wip_deta_usua_perf(id_usuario, cod_perfil, cod_tipo_cat, permiso, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act)
values(1, 'PF01', 'GM01', 0, 0, 0, USER(), USER(), NOW(), NOW()),
(2, 'PF05', 'GM05', 0, 0, 0, USER(), USER(), NOW(), NOW());
-- select * from wip_meta_gprog;
insert into wip_meta_gprog(cod_mtgp, cod_tipo_cat, nro_meta_prog, nom_meta_prog, des_meta_prog, cod_tipo_prog, cod_nivel_prog, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act)
values('MPG001', 'GM01', '1.1', 'Gestión de Ventas', 'Gestión de Ventas', 'PC', 3, 0, 0, USER(), USER(), NOW(), NOW()),
('MPG501', 'GM05', '1.1', 'Punto de Ventas', 'Punto de Ventas', 'OP', 3, 0, 0, USER(), USER(), NOW(), NOW());
-- select * from wip_deta_perf_mtgp;
insert into wip_deta_perf_mtgp(cod_perfil, cod_mtgp, cod_tipo_cat, permiso, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act)
values('PF01', 'MPG001', 'GM01', 0, 0, 0, USER(), USER(), NOW(), NOW()),
('PF05', 'MPG501', 'GM05', 0, 0, 0, USER(), USER(), NOW(), NOW());
-- select * from wip_grupo_prog;
insert into wip_grupo_prog(cod_gprog, cod_tipo_cat, nro_grup_prog, nom_grup_prog, des_grup_prog, cod_tipo_prog, cod_nivel_prog, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act)
values('GPG001', 'GM01', '1.1.1', 'Registro de Ventas', 'Registro de Ventas', 'PC', 3, 0, 0, USER(), USER(), NOW(), NOW()),
('GPG501', 'GM05', '1.1.1', 'Punto de Venta', 'Punto de Venta', 'OP', 3, 0, 0, USER(), USER(), NOW(), NOW());
-- select * from wip_deta_mtgp_gpro;
insert into wip_deta_mtgp_gpro(cod_mtgp, cod_gprog, cod_tipo_cat, permiso, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act)
values('MPG001', 'GPG001', 'GM01', 0, 0, 0, USER(), USER(), NOW(), NOW()),
('MPG501', 'GPG501', 'GM05', 0, 0, 0, USER(), USER(), NOW(), NOW());
-- select * from wip_meta_prog;
insert into wip_meta_prog(cod_meta_prog, nom_meta_prog, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act)
values('MP01', 'ecommerce-store-webapp', 0, 0, USER(), USER(), NOW(), NOW());
-- select * from wip_programa;
insert into wip_programa(cod_programa, cod_meta_prog, nro_prog, nom_prog, dir_page, cod_page, nom_page, contexto, vigencia_ini, vigencia_fin, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act)
values('PG013', 'MP01', '21013', 'Registrar Producto', '/ruta/page', '21013', 'frmStockProductoVenta', 'ecwitper-salidamercancia-registroventa-ctrl', '2020-01-01', '2099-01-01', 0, 0, USER(), USER(), NOW(), NOW()),
('PG501', 'MP01', '50101', 'Registrar Comprobante Venta', '/ruta/page', '50101', 'frmRegistrarComprobanteVenta', 'ecwitper-ingresocaja-ventaproducto-ctrl', '2020-01-01', '2099-01-01', 0, 0, USER(), USER(), NOW(), NOW());
-- select * from wip_deta_gpro_prog;
insert into wip_deta_gpro_prog(cod_gprog, cod_programa, cod_tipo_cat, permiso, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act)
values('GPG001', 'PG013', 'GM01', 1, 0, 0, USER(), USER(), NOW(), NOW()),
('GPG501', 'PG501', 'GM05', 5, 0, 0, USER(), USER(), NOW(), NOW());

--
-- REGISTRAR CATALOGO DE PRODUCTOS
--
-- select * from wip_tipo_categoria;
insert into wip_tipo_categoria (cod_tipo, nom_tipo, estado, del, codusu_reg, fecha_reg, codusu_act, fecha_act) 
values ('T1', 'Computo', 0, 0, USER(), NOW(), USER(), NOW());
-- select * from wip_categoria_producto;
insert into wip_categoria_producto (cod_categoria, cod_tipo, nom_categoria, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act) 
values('T101', 'T1', 'Auriculares', 0, 0, USER(), USER(), NOW(), NOW()),
('T102', 'T1', 'Adaptadores', 0, 0, USER(), USER(), NOW(), NOW()),
('T103', 'T1', 'Laptops', 0, 0, USER(), USER(), NOW(), NOW());
-- select * from wip_subcategoria_producto;
insert into wip_subcategoria_producto (cod_categoria, cod_subcategoria, nom_subcategoria, estado, del, codusu_reg, fecha_reg, codusu_act, fecha_act) 
values ('T101','T10101','Auriculares Inalambricos', 0, 0, USER(), NOW(), USER(), NOW()),
('T102','T10201','Adaptadores tipo c', 0, 0, USER(), NOW(), USER(), NOW()),
('T103','T10301','Laptops para Oficina', 0, 0, USER(), NOW(), USER(), NOW());
-- select * from wip_fabricante;
insert into wip_fabricante (cod_fabricante, fabricante, marca, pais, estado, del, codusu_reg, fecha_reg, codusu_act, fecha_act) 
values ('FAB001', 'COMPUCHICLAYO', 'COMPUCHICLAYO', 'PERÚ', 0, 0, USER(), NOW(), USER(), NOW()),
('FAB002', 'LENOVO', 'LENOVO', 'EEUU', 0, 0, USER(), NOW(), USER(), NOW());
-- select * from wip_producto_tienda;
insert into wip_producto_tienda (cod_producto, mini_codigo, cod_fabricante, cod_tipcategoria, cod_categoria, cod_subcategoria, producto, descrip_corta, descrip_larga, especificaciones, ind_especificaciones, ind_galeriaImagenes, nom_img, dir_img, precio_venta_internet, stock, almacen_ind, almacen_stock, almacen_est, destacado_ind, estado, estado_prod, public_est, del, codusu_reg, fecha_reg, codusu_act, fecha_act) 
values ('PDT000000000001', '100001', 'FAB001', 'T1', 'T101', 'T10101', 'Auricular Inalambrico', 'Auricular inalambrico bluetooth', 'Auricular inalambrico bluetooth tipo vincha', 'Auricular inalambrico bluetooth tipo vincha color azul', '0', '0', 'IMG250x250.jpg', 'PDT202101010003', 140.90, 1, '0', 0, '04', '1', 0, '03', '03', 0, USER(), NOW(), USER(), NOW()),
('PDT000000000002', '100002', 'FAB001', 'T1', 'T102', 'T10201', 'Adaptador tipo-c', 'Adaptador tipo-c mancho', 'Adaptador tipo-c macho color negro', 'Adaptador tipo-c macho color negro de 1.5 mt', '0', '0', 'IMG250x250.jpg', 'PDT202101010002', 10.00, 1, '0', 0, '04', '1', 0, '03', '03', 0, USER(), NOW(), USER(), NOW()),
('PDT000000000003', '100003', 'FAB002', 'T1', 'T103', 'T10301', 'Laptop Lenovo', 'Laptop Lenovo core i5', 'Laptop Lenovo core i5 12th', 'Laptop Lenovo core i5 12th pantall 15 pulg', '0', '0', 'IMG250x250.jpg', 'PDT202101010001', 1500.90, 1, '0', 0, '04', '1', 0, '03', '03', 0, USER(), NOW(), USER(), NOW());

--
-- REGISTRAR BLOG
--
-- select * from wip_tipo_art;
insert into wip_tipo_art (nombre, estado, del)
values('pagina', 0, 0),
('articulo', 0, 0);
-- select * from wip_categoria_art;
insert into wip_categoria_art (nombre, estado, del)
values('Informatica', 0, 0);
-- select * from wip_articulo;
insert into wip_articulo(cod_articulo, ruc_negocio, id_usuario, fecha_creacion, titulo, subtitulo, imagen_sm, imagen_md, imagen_xl
, resumen, contenido, key_word, cant_comen, fk_idtipo, fk_idcategoria, estado, del, codusu_reg, fecha_reg, codusu_act, fecha_act)
values ('POST000001', '20608326481', 21, '2020-01-01', 'POST #01: Titulo Principal del Post', 'Subtitulo del Post'
, 'https://via.placeholder.com/300x200', 'https://via.placeholder.com/500x250', 'https://via.placeholder.com/800x300'
, 'Resumen publicacion', 'Contenido publicacion', 'post', 1, 4, 2, 0, 0, USER(), NOW(), USER(), NOW() );
-- select * from wip_publicacion_articulo;
-- select id_publicacion, ruc_negocio, id_usuario, fecha_creacion, cod_pagenom, cod_pagesec, url_publi, descripcion from wip_publicacion_articulo;
-- insert into wip_publicacion_articulo (ruc_negocio, id_usuario, fecha_creacion, cod_pagenom, cod_pagesec, descripcion, estado, del, codusu_reg, fecha_reg, codusu_act, fecha_act)
-- values('20608326481', 21, '2020-01-01', 'PAG001', 'SEC001', 'Publicación blog', 0, 0, USER(), NOW(), USER(), NOW());
-- select * from wip_detalle_publicacion_articulo;
-- insert into wip_detalle_publicacion_articulo (id_publicacion, cod_articulo, estado, del, codusu_reg, fecha_reg, codusu_act, fecha_act)
-- values(5, 'POST000001', 0, 0, USER(), NOW(), USER(), NOW());
select * from wip_comentario_articulo;
select * from wip_galeria_articulo;
select * from wip_galeria_comentario_articulo;
