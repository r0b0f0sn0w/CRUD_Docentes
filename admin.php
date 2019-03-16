<html>
    <head>
        <meta charset="UTF-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="js/script.js" type="text/javascript"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
        <title>Docentes</title>
    </head>
    <body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >
	    <a class="navbar-brand" href="index.php">Docentes</a>
	</nav>
	<div class="content-wrapper">
	    <div style="margin-top: 75px;" class="container-fluid">
		<div class="row">
		    <div class="col">
                        
		<div class="card mb-3">
                    <div class="card-header">
                        <i></i> Agregar un docente
		    </div>
                    <div class="card-body">
			<!--Formulario de consulta -->
			<form>
				<input type="hidden" id="id_docente" value="0">
			    <div class="form-group">
				<label>Nombre:</label>
				<input type="text" class="form-control" id="nombre">
			    </div>
			    <div class="form-group">
				<label>Apellido paterno:</label>
				<input type="text" class="form-control" id="appat">
			    </div>
			    <div class="form-group">
				<label>Apellido materno:</label>
				<input type="text" class="form-control" id="apmat">
			    </div>
			    <div class="form-group">
				<label>Matricula:</label>
				<input type="number" class="form-control" id="matricula">
			    </div>
			    <div class="form-group">
				<label>Correo electronico:</label>
				<input type="text" class="form-control" id="correo">
			    </div>
			    <div class="form-group">
				<label>Fecha de nacimento:</label>
				<input type="date" class="form-control" id="fecha">
			    </div>
			    <div class="form-group">
				<label>Tipo de docente:</label>
				<select id="tipo">
                                    <option value="0" selected="selected">Seleccionar uno...</option>
                                    <option value="1">PTC</option>
                                    <option value="2">PTA</option>
                                </select>
			    </div>
			    <button type="button" class="btn btn-success" onclick="agregar();">Guardar</button>
			    <button type="button" class="btn btn-danger" onclick="limpiarCampos();">Cancelar</button>
			</form>
			<div style="margin-top: 10px" id="alertas">

			</div>
		    </div>
                    <div class="card-footer small text-muted"></div>
                </div>
		    </div>
		    <div class="col">
                        <div class="card mb-3">
                    <div class="card-header">
                        <i></i> Lista de docentes</div>
                    <div class="card-body">
			<button type="button" class="btn btn-primary mb-2" onclick="refrescar();">Recargar tabla</button>
			<div style="margin-top: 10px" id="alertas_tabla">
			    
			</div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabla" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido paterno</th>
                                        <th>Apellido materno</th>
					<th>Matricula</th>
					<th>Correo electronico</th>
					<th>Fecha de nacimiento</th>
					<th>Tipo</th>
					<th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody id="datosTabla">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted"></div>
                </div>
		    </div>
			
                <!--Inician la tablas de las consultas solicitadas-->
                <div class="col">
                        <div class="card mb-3">
                    <div class="card-header">
                        <i></i> Consulta Alumnos asignados a docente</div>
                    <div class="card-body">
			<button type="button" class="btn btn-primary mb-2" onclick="refrescarAlumnosAsignados();">Recargar tabla</button>
			<div style="margin-top: 10px" id="alertas_tabla">
			</div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabla" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Matricula</th>
                                        <th>Nombre(s)</th>
                                        <th>Apellido paterno</th>
                                        <th>Apellido materno</th>
					<th>Grupo</th>
					<th>Nombre (profesor)</th>
                                        <th>Apellido paterno (profesor)</th>
                                        <th>Apellido materno (profesor)</th>
					<th>Tipo de docente</th>
                                    </tr>
                                </thead>
                                <tbody id="datosTablaAlumnosAsignados">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted"></div>
                </div>
		    </div>
                
                <div class="col">
                        <div class="card mb-3">
                    <div class="card-header">
                        <i></i> Consulta Alumnos asignados a docente en estadia</div>
                    <div class="card-body">
			<button type="button" class="btn btn-primary mb-2" onclick="refrescarAlumnosEstadia();">Recargar tabla</button>
			<div style="margin-top: 10px" id="alertas_tabla">
			</div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabla" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Matricula</th>
                                        <th>Nombre(s)</th>
                                        <th>Apellido paterno</th>
                                        <th>Apellido materno</th>
					<th>Grupo</th>
					<th>Empresa</th>
					<th>Nombre (profesor)</th>
                                        <th>Apellido paterno (profesor)</th>
                                        <th>Apellido materno (profesor)</th>
                                    </tr>
                                </thead>
                                <tbody id="datosTablaAlumnosAsignadosEstadia">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted"></div>
                </div>
		    </div>
                
		</div>
	    </div>
	</div>
    </body>
</html>
