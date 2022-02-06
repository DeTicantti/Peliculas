<?php 
session_start();

//session_start();
require('../../function/conection.php');
require('../../function/funcs.php');
if (!isset($_SESSION['user'])) {
    header('Location:../../../login.php');
}
$errors = array();
if (isset($_POST['enviar'])) {
    $id = null;
    $peli = strtoupper($_POST['peli']);
    $minu = $_POST['minu'];
    $clas = $_POST['clas'];
    
    
    if (!empty($peli) && !empty($minu) && !empty($clas) && !empty($_FILES)) {
        # code...
    
    
        $fecha = date('Y-m-d');
        $time = date('ism');
        //var_dump($time);
        $tipos = array('image/png','image/jpeg','application/pdf');
        if (in_array($_FILES['archivo']['type'],$tipos)) {
            $tamano = 1024*1024*60; 
            if ($_FILES['archivo']['size'] < $tamano) {
                $carpeta = "inventario/";
                if (!file_exists($carpeta)) {
                mkdir($carpeta);
                }
                $carpeta .= "$peli$minu";
            //$carpeta .= "$idUser/$fecha";
            //if (!file_exists($carpeta)) {
              //  mkdir($carpeta);
            //}
                $tipo = $_FILES['archivo']['type'];
                $date = date('Ymd-His');

                if (strcmp($tipo,"application/pdf" == 0)) {
                $archivo = $carpeta.".pdf";   #nombramos a los archivos
                }elseif (strcmp($tipo,"image/png" == 0)) {
                $archivo = $carpeta.".png";
                }else {
                $archivo = $carpeta.".jpg";
                }
                $tmpName = $_FILES['archivo']['tmp_name'];  #guardamos el nombre temporal donde se alojo el archivo
                if (!file_exists($archivo)) {   //si no existe el archivo procedemos a guardarlo
                    if (move_uploaded_file($tmpName,$archivo)) {    #esta funcion mueve el archivo guardado temporalmente a la variable que contiene otro lugar de alojamiento, si es tru, si podra guardarlo
                        $sql = "INSERT INTO m_pelicula (id_mov,mov_nom,mov_pos,mov_tim,mov_cla) VALUES (?,?,?,?,?)";
                        $request = $con->prepare($sql);
                        $request->bind_param("issis",$id,$peli,$archivo,$time,$clas);
                        if ($request->execute()) {
                            $res = "¡Articulo guardado!";
                        }else $errors[] = " Ocurrio un error";
                    }else $errors[] = " No se pudo guardar el articulo";
                }else $errors[] = " El articulo ya existe";
            }else $errors[] = " El archivo excede el tamaño permitido";
        }else $errors[] = " Tipo de archivo no permitido";
    }else  $errors[] = " faltan campos por llenar";
}
?>
<?php
include ('../../templates/header.php');?>

<div class="container">
<div class="row mt-5">

            <div class="col-12 m-auto bg-white rounded shadow p-0">
                <h4 class="text-center mb-4 text-secondary mt-5">INDEX</h4>
                <div class="col-12 bg-light py-3 mb-5 text-center">
                <a href="../../index.php"><button class="btn btn-success m-auto">Regresar a la pagina principal</button></a>
                </div>

                <?php 
                if (isset($res)) {
                    if ($res) {
                        
                    
                ?>
                    <div class="bg- sucess text-white p-2 mx-5 text-center">
                    <?php echo $res ?> 
                    </div>
                <?php
                    }else $errors[] = "algo salio mal";
                }
                include('../../function/errors.php');
                ?>
                <div class="px-5 pb-5"><h4>Estás logueado como: <?php echo $_SESSION['user'];?></h4>
                    <h3>Agregar un nuevo archivo </h3>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="contact" id="general" enctype="multipart/form-data">
    <div class="form-group">
    <label for="name"><span>Pelicula</span></label>
        <input type="text" name="peli" id="peli" placeholder="nombre" class="form-control" required>
    </div>


    <div class="form-group">
        <label for="">Duracion(minutos)</label>:
            <input type="number" min="1" name="minu" placeholder="minutos" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="clasificacion">clasificacion</label>:
            <input type="text" name="clas" placeholder="AAA" class="form-control">
            </div>
            <div class="form-group">
            <label for="poster">Archivo:</label>
            <input type="file" name="archivo" id="archivo" class="form-control">
            </div>
            <div class="form-group text-right">
            <button class="btn btn-primary" type="submit" name="enviar">Subir archivo</button>
            </div>


</form>




</div>





</div>  

<footer class="last">Insertar</footer>

</body>
</html>