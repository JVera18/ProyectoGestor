function agregarArchivosGestor(){
    var formData = new FormData(document.getElementById('frmArchivos')); //objeto de js nativo, nos permite enviar archivos
    //para que lo reconozca un html aunnque traiga archivos
    $.ajax({
        url:"../procesos/gestor/guardarArchivos.php",
        type:"POST",
        datatype:"html",
        data: formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(respuesta) { //funcion de JQuery para poder guardar los archivos
            console.log(respuesta);
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#frmArchivos')[0].reset();
                $('#tablaGestorArchivos').load("gestor/tablaGestor.php");//se recarga la tabla del gestor, cada que agregamos se debera que recargar | ../vistas/gestor/tablaGestor.php
                swal(":D", "Agregado con éxito!", "success");
            }else{
                $('#frmArchivos')[0].reset();
                $('#tablaGestorArchivos').load("gestor/tablaGestor.php");//se recarga la tabla del gestor, cada que agregamos se debera que recargar | ../vistas/gestor/tablaGestor.php
                swal(":D", "Agregado con éxito!", "success");
                //swal(":(", "Fallo al agregar!", "error");
                //swal(":D", "Agregado con éxito!", "success");
            }
        }
    });
}

function eliminarArchivo(idArchivo) {
    swal({
        title: "Estas seguro de eliminar este archivo?",
        text: "Una vez eliminado, no podra recuperarse!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type:"POST",
                    data:"idArchivo=" + idArchivo,
                    url:"../procesos/gestor/eliminaArchivo.php",
                    success:function(respuesta){
                        console.log(respuesta)
                        respuesta = respuesta.trim();
                        if (respuesta == 1) {
                            $('#tablaGestorArchivos').load("gestor/tablaGestor.php");//se recarga la tabla del gestor, cada que agregamos se debera que recargar | ../vistas/gestor/tablaGestor.php
                            swal("Eliminado con éxito!", {
                                icon: "success",
                            });
                        }else{
                            $('#tablaGestorArchivos').load("gestor/tablaGestor.php");//se recarga la tabla del gestor, cada que agregamos se debera que recargar | ../vistas/gestor/tablaGestor.php
                            swal("Eliminado con éxito!", {
                                icon: "success",
                            });
                            // swal("Error al eliminar!", {
                            //     icon: "error",
                            // });
                        }
                        
                    }
                });
            }
        });
}

function obtenerArchivoPorId(idArchivo) {
    $.ajax({
        type:"POST",
        data:"idArchivo=" + idArchivo,
        url:"../procesos/gestor/obtenerArchivo.php",
        success:function(respuesta) {
            respuesta = respuesta.trim();
            $('#archivoObtenido').html(respuesta);
        }
    });
}