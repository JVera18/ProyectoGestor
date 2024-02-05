<?php
    session_start(); //se lo coloca porque queremos obtener lo del usuario logueado
    require_once "../../clases/Conexion.php";
    $idUsuario = $_SESSION['idUsuario'];
    //realizamos un llamado a la conexion
    $conexion = new Conectar();
    $conexion = $conexion->conexion();
?>

<div class="table-responsive">
    <table class="table table-hover table-dark" id="tablaCategoriasDataTable">
        <thead>
            <tr>
                <th style="text-align: center;">Nombre</th>
                <th style="text-align: center;">Fecha</th>
                <th style="text-align: center;">Editar</th>
                <th style="text-align: center;">Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $sql = "SELECT id_categorias,nombre,fechaInsert FROM gestor.gg_categorias WHERE id_usuario = '$idUsuario'";    
            $result = mysqli_query($conexion, $sql);

            while($mostrar = mysqli_fetch_array($result)){
                $idCategoria = $mostrar['id_categorias'];
        ?>
            <tr style="text-align: center;">
                <td><?php echo $mostrar['nombre'];?></td>
                <td><?php echo $mostrar['fechaInsert'];?></td>
                <td>
                    <span class="btn btn-outline-warning btn-sm"
                            onclick="obtenerDatosCategoria('<?php echo $idCategoria;?>')"
                            data-toggle="modal" data-target="#modalActualizarCategoria">
                    <span class="fa-sharp fa-solid fa-pen-to-square"></span>
                    </span>
                </td>
                <td>
                    <span class="btn btn-outline-danger btn-sm" 
                            onclick="eliminarCategorias('<?php echo $idCategoria;?>')">
                        <span class="fa-sharp fa-solid fa-trash"></span>
                    </span>
                </td>
            </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaCategoriasDataTable').DataTable();
    });
</script>