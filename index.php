<?php 
session_start();
require('function/conection.php');
require('function/funcs.php');
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
}
//$sql = "SELECT p.titulo, p.contenido, p.imagen, p.fecha, u.usuario FROM publicaciones p INNER JOIN user u ON p.usuario_id = u.id";
$sql = "SELECT * FROM m_pelicula";
$request = $con->prepare($sql);
$request->execute();
$request->store_result();
$error = array();
?>

<?php include ('templates/header.php');?>

<body>


    <div class="container">
        <div class="row mt-5">

            <div class="col-12 m-auto bg-white rounded shadow p-0">
                <h4 class="text-center mb-4 text-secondary mt-5">INDEX</h4>
                <div class="col-12 bg-light py-3 mb-5 text-center">
                <a href="db/inv/agregar.php"><button class="btn btn-success m-auto">Agregar pelicula</button></a>
                </div>

                <div class="px-5 pb-5"><h4>Estás logueado como: <?php echo $_SESSION['user'];?></h4>

                <table id="example" class="display" style="width:100%">
        <thead>
            <tr>                
                <!--<th>Id</th>-->
                <th>Pelicula</th>
                <th>Imagen</th>
                <th>$duracion</th>
                <th>Clasificacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    if ($request->num_rows>0) {
                        $request->bind_result($id,$titulo,$imagen,$duracion,$clasificacion);
                        while ($request->fetch()) {?>
                        <tr>
                                <!--<td>
                                    <?php ?>
                                </td>-->
                                
                                <td>
                                    <?php echo $titulo;?>
                                </td>
                                <div class="small">
                                <td>
                                    

                                    <img src="db/inv/<?php echo $imagen;?>">
                                    
                                </td>
                                </div>
                                
                                <td>
                                    <?php echo $duracion;?>
                                </td>
                                <td>
                                    <?php echo $clasificacion;?>
                                </td>
                                <td>
                                <div class="action left">
                                <div class="sucessmn ns">
                                    <a href="db/inv/modificar.php?id= <?php echo $id ;?>&nom=<?php echo $nombre?>&des=<?php echo $descripcion?>&img=<?php echo $imagen?>&pre=<?php echo $precio?>&min=<?php echo $minu?>"><i class="fas fa-retweet"></i></a>
                                </div>
                                <div class="errormn ns">
                                    <a href="db/inv/eliminar.php?id= <?php echo $id ;?>"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                </div>
                                </td>
                            </tr>

                            
                            <?php
                               }
                            }
                            else {$error[] = "<h3 class= 'btn-success text-center'>la base de datos esta en blanco</h3>";}

                            if (count($error)> 0) {
                                echo "<div class='error'>";
                                foreach ($error as $mal){
                                    echo $mal;
                                }
                                echo "</div>";
                            }

                            $con->close();
                            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Pelicula</th>
                <th>Imagen</th>
                <th>$duracion</th>
                <th>Clasificacion</th>
                <th>Acciones</th>
            </tr>

        </tfoot>
        </table>

        <div class="col-4 m-5">
                            <a href="logout.php"><button class="btn btn-outline-secondary form-control">Cerrar sesión</button></a>
                            <p class="text-secondary text-center">¿Quieres cerrar sesión?</p>
                </div>
            </div>
        </div>
    </div>
    <?php require('templates/footer.php');?>