<?php
    session_start(); //lo necesitamos, por que requerimos el usuario de la categoria
    require_once "../../clases/Conexion.php";
    $c = new Conectar();
    $conexion = $c->conexion();

    $idUsuario = $_SESSION['idUsuario'];
    $sql = "SELECT id_categorias, nombre FROM gestor.gg_categorias WHERE id_usuario = '$idUsuario'";
    $result = mysqli_query($conexion, $sql);

?>

<select name="categoriasArchivos" id="categoriasArchivos" class="form-control">
    <?php 
        while($mostrar = mysqli_fetch_array($result)){
            $idCategoria = $mostrar['id_categorias'];
        
    ?>
        <option value="<?php echo $idCategoria;?>"><?php echo $mostrar['nombre'];?></option>
    <?php 
        }
    ?>
</select>