DELIMITER $$
CREATE PROCEDURE  SP_CREAR_DOCENTE
(
IN sp_nombre varchar(50),
IN sp_ape_pat varchar(50),
IN sp_ape_mat varchar(50),
IN sp_matricula varchar(50),
IN sp_correo_electronico varchar(50),
IN sp_password text,
IN sp_fecha_nacimento varchar(50),
IN sp_id_tipo_docente int,
IN sp_estado int
)
BEGIN
insert into docente(nombre_docente,apellido_pat,apellido_mat,matricula,
correo_electronico,password,fecha_nacimiento,id_tipo_docente,estado)
values(sp_nombre,sp_ape_pat,sp_ape_mat,sp_matricula,sp_correo_electronico,
MD5(sp_password),sp_fecha_nacimento,sp_id_tipo_docente,sp_estado);
END
$$

CALL SP_CREAR_DOCENTE('Neil','Miller','Herrera','16391059','ejemplo@hotmail.com','contrasenia','20191015',1,1);


delimiter $$
CREATE procedure SP_ACTUALIZAR_DOCENTE(
IN sp_id_docente int,
IN sp_nuevo_nombre varchar(50),
IN sp_nuevo_ape_pat varchar(50),
IN sp_nuevo_ape_mat varchar(50),
IN sp_nuevo_matricula varchar(50),
IN sp_nuevo_correo_electronico varchar(50),
IN sp_nuevo_fecha_nacimento varchar(50),
IN sp_nuevo_id_tipo_docente int
)
begin
UPDATE DOCENTE set nombre_docente=sp_nuevo_nombre,apellido_pat=sp_nuevo_ape_pat,apellido_mat=sp_nuevo_ape_mat,matricula=sp_nuevo_matricula,correo_electronico=sp_nuevo_correo_electronico,fecha_nacimiento=sp_nuevo_fecha_nacimento,id_tipo_docente=sp_nuevo_id_tipo_docente where id_docente=sp_id_docente;
end;
$$

CALL SP_ACTUALIZAR_DOCENTE(13,'Gabriel','Quintal','Pacheco','11111111','gabriel@hotmail','19991003',1);


delimiter $$
CREATE procedure SP_ELIMINAR_DOCENTE(
IN sp_id_docente int
)
begin
UPDATE DOCENTE set estado=0 where id_docente=sp_id_docente;
end;
$$

CALL SP_ELIMINAR_DOCENTE(1);


delimiter $$
CREATE PROCEDURE SP_LEER_DOCENTE(
IN sp_id_docente int
)
BEGIN
SELECT docente.id_docente,docente.nombre_docente,docente.apellido_pat,docente.apellido_mat,docente.matricula,docente.correo_electronico,docente.password,docente.fecha_nacimiento,tipo_docente.tipo,docente.estado from docente inner join tipo_docente on docente.id_tipo_docente=tipo_docente.id_tipo_docente WHERE id_docente=sp_id_docente;
END
$$
CALL SP_LEER_DOCENTE(2);


CREATE VIEW VISTA_TODOS_DOCENTES AS
SELECT docente.id_docente,docente.nombre_docente,docente.apellido_pat,
docente.apellido_mat,docente.matricula,docente.correo_electronico,
docente.fecha_nacimiento,tipo_docente.tipo from docente inner join tipo_docente 
on docente.id_tipo_docente=tipo_docente.id_tipo_docente where docente.estado=1;

