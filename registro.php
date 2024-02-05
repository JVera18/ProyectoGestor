<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Esta linea sirve para que el login sea responsive -->
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.13.2/jquery-ui.theme.css">
    <link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.13.2/jquery-ui.css">
    <title>Registro</title>
</head>

<body>
    <!-- para que quede en el centro -->
    <br>
    <div class="container">
        <h1 style="text-align: center;">Registro de usuario</h1>
        <hr>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="" id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
                    <label>Nombre personal</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required="">
                    <label>Fecha de nacimiento</label>
                    <!-- el readonly (nos permite que solo ingrese la fecha, no permite escribir) -->
                    <input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required="" readonly="">
                    <label>Email o Correo</label>
                    <input type="email" name="email" id="email" class="form-control" required=""> 
                    <label>Nombre de usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" required="">
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="form-control" required="">
                    <br>
                    <div class="row">
                        <!-- lo dividimos en 6 porque la maya es de 12 -->
                        <div class="col-sm-6 text-left">
                            <button class="btn btn-outline-primary">Registrar</button>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="index.php" class="btn btn-success">Login</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    <script src="librerias/jquery-3.5.1.min.js"></script>
    <script src="librerias/jquery-ui-1.13.2/jquery-ui.js"></script>
    <script src="librerias/sweetalert.min.js"></script>

    <script type="text/javascript">
        //esta función permite elegir las fechas de una manera ordenada y los años desde 1900
        $(function(){
            var fechaA = new Date();
            var yyyy = fechaA.getFullYear();

            $('#fechaNacimiento').datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: '1900:' + yyyy,
                dateFormat: "dd-mm-yy"
            });
        });
        function agregarUsuarioNuevo(){
            //plantilla de ajax
            $.ajax({
                method:"POST",
                data: $('#frmRegistro').serialize(),//funciones de javascript
                url: "procesos/usuario/registro/agregarUsuario.php",
                //esto nos regresa al servidor
                success:function(respuesta){
                    // console.log(respuesta);
                    respuesta = respuesta.trim(); //trin(): funcion que quita los espacios de izquierda y derecha
                    
                    if(respuesta == 1){
                        $('#frmRegistro')[0].reset(); //para limpiar los campos una vez guardada la información
                        swal(":D","Agregado con éxito!","success");//mensaje de confirmación}
                    }else if(respuesta == 2){
                        swal("Este usuario ya existe, por favor escribe otro!");
                    }else{
                        swal(":(","Fallo al agregar!","error");
                        // alert(respuesta);
                    }
                }
            });
            return false;
        }
    </script>
</body>

</html>