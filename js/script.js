var LaPeticion = false;
this.onload=refrescarambos();

function refrescarambos(){
	refrescarAlumnos();
	refrescar();
}
function login(){
    var nombre = document.getElementById("usuario").value;
    var password = document.getElementById("password").value;
    if(nombre=="admin"&&password=="password"){
        this.location("admin.php");
    }else{
        alert("Usuario o contraseña incorrectos");
    }
}//Cierra funcion de inicio de sesion

function peticion() {
    if (window.XMLHttpRequest) {
        LaPeticion = new XMLHttpRequest();
    } else {
        if (window.ActiveXObject) {
            LaPeticion = new ActiveXObject("Msxml2.XMLHTTP");
        }
    }
    if (!LaPeticion) {
        alert("No se creó la petición");
    }
} // fin del método peticion

function agregar() {
    peticion();
    var id = document.getElementById("id_docente").value;
    var nombre = document.getElementById("nombre").value;
    var appat = document.getElementById("appat").value;
    var apmat = document.getElementById("apmat").value;
	var matricula = document.getElementById("matricula").value;
    var correo = document.getElementById("correo").value;
    var fecha = document.getElementById("fecha").value;
    var elemento = document.getElementById("tipo"); 
    var tipo = elemento.options[elemento.selectedIndex].value;

	if(id==0){
		if(nombre == "" || appat == "" || apmat == "" || matricula == "" || correo == "" || fecha == "" || tipo == "0"){
        document.getElementById('alertas').innerHTML = "<div class='alert alert-warning alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>¡Alerta!</strong> Rellene correctamente todos los campos.</div>";
    } else {
        LaPeticion.onreadystatechange = mostrarContenido('alertas');
        LaPeticion.open('POST', 'bd/guardar_docente.php', true);
        LaPeticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        LaPeticion.send(
                "id_docente=" + id + 
                " & nombre=" + nombre + 
                " & appat=" + appat + 
                " & apmat=" + apmat + 
                " & matricula=" + matricula + 
                " & correo=" + correo +
                " & fecha=" + fecha +
                " & tipo=" + tipo);
        limpiarCampos();
		refrescar();
		refrescar();
    }//Cierra else interno	
	}else{
		if(nombre == "" || appat == "" || apmat == "" || matricula == "" || correo == "" || fecha == "" || tipo == "0"){
        document.getElementById('alertas').innerHTML = "<div class='alert alert-warning alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>¡Alerta!</strong> Rellene correctamente todos los campos.</div>";
    } else {
        LaPeticion.onreadystatechange = mostrarContenido('alertas');
        LaPeticion.open('POST', 'bd/actualizar_docente.php', true);
        LaPeticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        LaPeticion.send(
                "id_docente=" + id + 
                " & nombre=" + nombre + 
                " & appat=" + appat + 
                " & apmat=" + apmat + 
                " & matricula=" + matricula + 
                " & correo=" + correo +
                " & fecha=" + fecha +
                " & tipo=" + tipo);
        limpiarCampos();
		refrescar();
		refrescar();
    }
	}//Cierra else externo
}//Cierra metodo agregar

function refrescar() {
    var LaPeticion = false;
    if (window.XMLHttpRequest) {
        LaPeticion = new XMLHttpRequest();
    } else {
        if (window.ActiveXObject) {
            LaPeticion = new ActiveXObject("Msxml2.XMLHTTP");
        }
    }
    if (!LaPeticion) {
        alert("No se creó la petición");
    }
    LaPeticion.onreadystatechange = function () {
        if (LaPeticion.readyState < 4) {
            document.getElementById("datosTabla").innerHTML = "<tr><td colspan='3'><img src='images/cargando.gif' alt='' style='width:25%'/></td></tr>";
        } else if (LaPeticion.readyState === 4) {
            if (LaPeticion.status === 200) {
                var respuestaAjax = LaPeticion.responseText;
                document.getElementById("datosTabla").innerHTML = respuestaAjax;
            } else {
                alert("Error al leer la página");
            }
        }
    }; // cierre de return function
    LaPeticion.open('GET', 'bd/mostrar_docentes.php', true);
    LaPeticion.send();
}


function refrescarAlumnos() {
    var LaPeticion = false;
    if (window.XMLHttpRequest) {
        LaPeticion = new XMLHttpRequest();
    } else {
        if (window.ActiveXObject) {
            LaPeticion = new ActiveXObject("Msxml2.XMLHTTP");
        }
    }
    if (!LaPeticion) {
        alert("No se creó la petición");
    }
    LaPeticion.onreadystatechange = function () {
        if (LaPeticion.readyState < 4) {
            document.getElementById("datosTablaAlumnos").innerHTML = "<tr><td colspan='3'><img src='images/cargando.gif' alt='' style='width:25%'/></td></tr>";
        } else if (LaPeticion.readyState === 4) {
            if (LaPeticion.status === 200) {
                var respuestaAjax = LaPeticion.responseText;
                document.getElementById("datosTablaAlumnos").innerHTML = respuestaAjax;
            } else {
                alert("Error al leer la página");
            }
        }
    }; // cierre de return function
    LaPeticion.open('GET', 'bd/mostrar_alumnos.php', true);
    LaPeticion.send();
}




function mostrarContenido(elID) {
    return function () {
        if (LaPeticion.readyState < 4) {
            document.getElementById(elID).innerHTML = "<tr><td colspan='3'><img src='images/cargando.gif' alt='' style='width:25%'/></td></tr>";
        } else if (LaPeticion.readyState === 4) {
            if (LaPeticion.status === 200) {
                var respuestaAjax = LaPeticion.responseText;
                document.getElementById(elID).innerHTML = respuestaAjax;
            } else {
                alert("Error al leer la página");
            }
        }
    }; // cierre de  return function
}//Cierre del metodo

function eliminar(id) {
    if (confirm("¿Está seguro de que desea eliminar al docente?")) {
        peticion(); // creamos el httprequest
        LaPeticion.onreadystatechange = mostrarContenido('alertas_tabla');
        LaPeticion.open('POST', 'bd/eliminar_docente.php', true);
        LaPeticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        LaPeticion.send("id_docente=" + id);
    }
}

function editar(id) {
    peticion(); // creamos el httprequest  
    LaPeticion.onreadystatechange = mostrarContenidoJson;
    LaPeticion.open('POST', 'bd/mostrar_docente.php', true);
    LaPeticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    LaPeticion.send("id_docente=" + id);
}

function mostrarContenidoJson() {
    if (LaPeticion.readyState === 4) {
        if (LaPeticion.status === 200) {
            var respuestaAjax = JSON.parse(LaPeticion.responseText);
            document.getElementById("id_docente").value = respuestaAjax[0].id_docente;
            document.getElementById("nombre").value = respuestaAjax[0].nombre_docente;
            document.getElementById("appat").value = respuestaAjax[0].apellido_pat;
            document.getElementById("apmat").value = respuestaAjax[0].apellido_mat;
			var mat=respuestaAjax[0].matricula;
            document.getElementById("matricula").value = mat;
            document.getElementById("correo").value = respuestaAjax[0].correo_electronico;
            document.getElementById("fecha").value = respuestaAjax[0].fecha_nacimiento;
			if(respuestaAjax[0].tipo=="PTC"){
				document.getElementById("tipo").value="1";
			}else{
				document.getElementById("tipo").value="2";
			}
        } else {
            alert("Error al leer a los docentes");
        }
    }
}

function limpiarCampos() {
    document.getElementById("id_docente").value = "";
    document.getElementById("nombre").value = "";
    document.getElementById("appat").value = "";
    document.getElementById("apmat").value = "";
    document.getElementById("matricula").value = "";
    document.getElementById("correo").value = "";
    document.getElementById("fecha").value = "";
    document.getElementById("tipo").value = "0";
}

function refrescar_docentes(){
	peticion();
	LaPeticion.onreadystatechange= mostrarContenidoDatos;
	LaPeticion.open('GET', 'bd/mostrar_docentes.php', true);
	LaPeticion.send(); 
}
