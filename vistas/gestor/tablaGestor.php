<?php
session_start();
require_once "../../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();
$idUsuario = $_SESSION['idUsuario'];
$sql = "SELECT 
                archivos.id_archivos as idArchivo,
                usuario.nombre as nombreUsuario,
                categorias.nombre as categoria,
                archivos.nombre as nombreArchivo,
                archivos.tipo as tipoArchivo,
                archivos.ruta as rutaArchivo,
                archivos.fecha as fecha
            FROM
                gg_archivos AS archivos
                    INNER JOIN
                gg_usuarios AS usuario ON archivos.id_usuario = usuario.id_usuario
                    INNER JOIN
                gg_categorias AS categorias ON archivos.id_categorias = categorias.id_categorias
                and archivos.id_usuario = '$idUsuario'";
$result = mysqli_query($conexion, $sql);
?>

<div class="row">
    <div class="col-sm-12"> <!-- parecido para una tablet (refiriendome para las dimensiones) -->
        <div class="table-responsive"> <!-- cuando se encuentre con una dimensión mas angosto de lo normal necesitaremos esto por su sroll -->
            <table class="table table-hover table-dark" id="tablaGestorDataTable">
                <thead>
                    <tr>
                        <th style="text-align: center;">Categoria</th>
                        <th style="text-align: center;">Nombre</th>
                        <th style="text-align: center;">Extensión de archivo</th>
                        <th style="text-align: center;">Descargar</th>
                        <th style="text-align: center;">Visualizar</th>
                        <th style="text-align: center;">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    /*
                        Arreglo de extensiones validas
                    */
                    $extensionesValidas = array('png', 'jpg', 'jpeg', 'pdf', 'mp3', 'mp4');

                    while ($mostrar = mysqli_fetch_array($result)) {
                        $rutaDescarga = "../archivos/" . $idUsuario . "/" . $mostrar['nombreArchivo']; //entrara a la carpeta creada por el idUsuario y la mostrara con su respectivo nombre
                        $nombreArchivo = $mostrar['nombreArchivo'];
                        $idArchivo = $mostrar['idArchivo'];
                    ?>
                        <tr>
                            <td><?php echo $mostrar['categoria']; ?></td>
                            <td style="text-align: center;"><?php echo $mostrar['nombreArchivo']; ?></td>
                            <td style="text-align: center;"><?php echo $mostrar['tipoArchivo']; ?></td>
                            <td style="text-align: center;">
                                <a href="<?php echo $rutaDescarga; ?>" download="<?php echo $nombreArchivo; ?>" class="btn btn-success btn-sm">
                                    <span class="fa-solid fa-download"></span>
                                </a>
                            </td>
                            <td style="text-align: center;">
                                <?php 
                                for ($i=0; $i < count($extensionesValidas); $i++) { 
                                    if ($extensionesValidas[$i] == $mostrar['tipoArchivo']) {
                                ?>
                                <span class="btn btn-primary btn-sm" data-toggle="modal" 
                                        data-target="#visualizarArchivo" onclick="obtenerArchivoPorId('<?php echo $idArchivo; ?>')"> <!-- esto esta enlazo por el id del archivo vista>gestor -->
                                    <span class="fa-solid fa-eye"></span>
                                </span>
                                <?php
                                    }
                                } 
                                ?>          
                            </td>
                            <td style="text-align: center;">
                                <span class="btn btn-outline-danger btn-sm" onclick="eliminarArchivo('<?php echo $idArchivo; ?>')">
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
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tablaGestorDataTable').DataTable();
    });
</script>