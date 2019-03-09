/*Consulta Alumnos asignados a docente*/

select Estudiante.matricula as 'Matricula',Estudiante.nombres as 'Nombre (s)' ,Estudiante.apPaterno as 'Apellido paterno',Estudiante.apMaterno as 'Apellido materno',Grupo.descripcion as 'Grupo',docente.nombre_docente as 'Nombre profesor',docente.apellido_pat as 'Apellido paterno',docente.apellido_mat as 'Apellido materno',tipo_docente.tipo as 'tipo' from Estudiante inner join Grupo on Estudiante.idGrupo=Grupo.idGrupo inner join docente on Grupo.id_docente=docente.id_docente inner join tipo_docente on docente.id_tipo_docente =tipo_docente.id_tipo_docente;

/*Consulta alumnos en estadía asignados a profesor*/
select Estudiante.matricula,Estudiante.nombres,Estudiante.apPaterno,Estudiante.apMaterno,Grupo.descripcion,docente.nombre_docente,docente.apellido_pat,docente.apellido_mat,empresa.nombre from Estudiante inner join Grupo on Estudiante.idGrupo=Grupo.idGrupo inner join docente on Grupo.id_docente=docente.id_docente inner join tipo_docente on docente.id_tipo_docente =tipo_docente.id_tipo_docente inner join docente as doc on tipo_docente.id_tipo_docente=doc.id_tipo_docente inner join Grupo as gr on doc.id_docente=gr.id_docente inner join Estudiante as est on gr.idGrupo=est.idGrupo inner join proyecto on est.id_Alumno=proyecto.id_alumno inner join empresa on proyecto.id_empresa=empresa.id_empresa;


use BancoRabeka

select cliente.Nombre,Cliente.Apellido,CuentaBancaria.saldo from Cliente inner join CuentaBancaria on cliente.Id=CuentaBancaria.IdCliente