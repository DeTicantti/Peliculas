<?php
require('../../function/conection.php');
require('../../function/funcs.php');
if (!isset($_SESSION['user'])) {
    header('Location:../../../index.php');
}
$errors = array();
if (isset($_GET['ide'])) {
if (isset($_POST['enviar'])) {
    $id = $_GET['id'];
    $nombre = $_POST['nom'];
    $minu = $_POST['minu'];
    $clas = $_POST['clas'];
    $img = $_POST['img'];
    
    
    if (!empty($id) && !empty($nombre) && !empty($minu) && !empty($clas) && !empty($img)) {
        $sql = "UPDATE m_pelicula SET mov_nom=?,mov_cla=?,mov_time=?, WHERE id_mov=?";
        $res = $con->prepare($sql);
        $res->bind_param("ssii",$nombre,$clas,$minu,$id);
        if ($res->execute()) {
            $resp = "¡Pelicula Modificado!";
        }else $errors[] = "error en la consulta";
        
    }else{
        var_dump($_POST);
         $errors[] = "faltan campos"; }
    
}else $errors[] = "error inesperado";
}else{
if (isset($_GET['id'])) {
    $id = $con->real_escape_string($_GET['id']);
    $nombre = $con->real_escape_string($_GET['nom']);
    $des = $con->real_escape_string($_GET['des']);
    $img = $con->real_escape_string($_GET['img']);
    $precio = $_GET['pre'];
    $minu = $_GET['min'];
    if (empty($id)) {
        $errors[] = "el id esta vacio";
    }
}else $errors[] = "error inesperado";
}
require('../../templates/header.php')
?>


</br>
<div>
<h1>Modificar Producto</h1>

<?php 
if (isset($resp)) {
    if ($resp) {
        
    
?>
    <div class="bg- sucess text-white p-2 mx-5 text-center">
    <?php echo $resp ?> 
    </div>
<?php
    }else $errors[] = "algo salio mal";
}
include('../../funciones/errors.php');
?>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>?ide=<?php echo $id?>" method="post" class="contact" id="general" enctype="multipart/form-data">
	<label for="name"><span>Producto</span></label>
	<input type="text" name="name" id="name" value="<?php echo $nombre ?>" required></input></br>
	<label for="desc"><span>Descripción</span>
    <input type="text" name="des" id="desc" value="<?php echo $descripcion ?>" require>
    <label for="prec"><span> Precio </span></label>
	<input type="number" name="pre" id="prec" value="<?php echo $precio ?>"required></input></br>
	
    <label for="existencias"><span>Existencias</span></label>
    <input type="number" name="can" id="existencias" value="<?php echo $cantidad ?>" required>
	
	<label for="archivo"><span> Esta editanto el articulo... </span></label>
    <iframe src="<?php echo $img ?>" class="rounded" alt="producto" width="100%"></iframe>
<br>
	
	<input type="submit" class="send" value="Enviar" name="enviar"></input>
</form>




</div>





</div>  

<footer class="last">Modificar</footer>

</body>
</html>