function agregarCategoria(){
    var categoria = $('#nombreCategoria').val();

    if (categoria == "") {
        swal("Debes que agregar una categoría")
        return false;
    } else {
        $.ajax({
            type: "POST",
            data: "categoria=" + categoria,
            url: "../procesos/categorias/agregarCategoria.php",
            success: function (respuesta) {
                respuesta = respuesta.trim();
                console.log(respuesta);
                if (respuesta == 1) {
                    $('#tablaCategorias').load('categorias/tablaCategoria.php');//me identifica a que categoria elimine
                    //para limpiar los input cuando ingresen la información
                    $('#nombreCategoria').val("");
                    swal(":D", "Agregado con éxito", "success");
                } else {
                    swal(":(", "Fallo al agregar", "error");
                }
            }
        });
    }
}

function eliminarCategorias(idCategoria) {
    idCategoria = parseInt(idCategoria);
    if(idCategoria < 1){
        swal("No tienes id de categoria!")
        return false;
    }else{
        //***********************************************
        swal({
            title: "¿Estas seguro de eliminar esta categoría?",
            text: "Una vez eliminada, no podra recuperarse!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        data: "idCategoria=" + idCategoria,
                        url: "../procesos/categorias/eliminarCategoria.php",
                        success: function (respuesta) {
                            respuesta = respuesta.trim();
                            if (respuesta == 1) {
                                $('#tablaCategorias').load('categorias/tablaCategoria.php');
                                swal("Eliminado con éxito!", {
                                    icon: "success",
                                });
                            } else {
                                swal(":(", "Fallo al eliminar", "error");
                            }
                        }
                    });

                }
            }); 
        //***********************************************
    }
}

function obtenerDatosCategoria(idCategoria) {
    $.ajax({
        type:"POST",
        data:"idCategoria=" + idCategoria,
        url:"../procesos/categorias/obtenerCategoria.php",
        success:function(respuesta){
            //lo convertimos a un objeto de Json valido
            respuesta = jQuery.parseJSON(respuesta);
            //console.log(respuesta);
            $('#idCategoria').val(respuesta['idCategoria']);//el valor contiene la respuesta
            $('#categoriaU').val(respuesta['nombreCategoria']); //esos nombres se encuentran en la carpeta clases>Categorias.php
        }
    });
}

function actualizaCategoria(){
    if ($('#categoriaU').val() == "") {
        swal("No hay categoria!!");
        return false;
    }else{
        $.ajax({
            type:"POST",
            data:$('#frmActualizaCategoria').serialize(), //nos trae los datos que requeramos
            url:"../procesos/categorias/actualizaCategoria.php",
            success:function(respuesta) {
                respuesta = respuesta.trim();
                console.log(respuesta);
                if (respuesta == 1) {
                    $('#tablaCategorias').load('categorias/tablaCategoria.php');//actualiza la tabla
                    swal(":D","Actualizado con éxito!","success");
                }else{
                    swal(":(","Fallo al actualizar!","error");
                }
            }
        });
    }
}