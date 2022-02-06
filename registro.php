<?php
session_start();
require('function/conection.php');
require('function/funcs.php');
require ('function/sesion.php');
$errors = array();
if (isset($_POST['enviar'])) {
    $user = trim($_POST['usuario']);
    $pass = $_POST['contrasena'];
    $passRe = $_POST['repContrasena'];
    if (!esVacia($user,$pass,$passRe)) {     //true si es vacia false si no es vacia
        
        if (!is_numeric($user)) {
            
            if (validaLargo($user)) {
                
                if (!usuarioExiste($user)) {
                    
                    if (validaPass($pass,$passRe)) {
                        $hash = hashPass($pass);
                        
                        if (registro($user,$hash)) {
                            $registro = "el usuario se registro correctamente";
                        }else {
                            $errors[] = "error en el registro";
                        }
                    }else {
                        $errors[] = "Las contraseñas no coinciden";
                    }
                }else {
                    $errors[] = "El usuario ya existe";
                }
                
            }else {
                $errors[] = "Tu usuario debe ser mayor a 3 caracteres y menor a 20";
                
            }
            
        }else {
            $errors[] = "Tu usuario no puede ser de solo numeros";
            
        }
    }else{
        $errors[] = "no puedes dejar campos vacios";
        
    }
}


include('templates/header.php');
?>



    <div class="container">
        <div class="row mt-5">

            <div class="col-8 m-auto bg-white rounded shadow p-0">
            <h4 class="text-center mb-4 text-secondary mt-5">REGÍSTRATE EN NUESTRA PÁGINA WEB</h4>
            <div class="col-12 bg-light py-3 mb-5 text-center">
            <p class="text-secondary m-0 p-0">Regístrate en nuestra web para obtener excelentes beneficios.</p>
            </div>

            <?php 
            if (isset($registro)) {
            ?>
                <div class="bg-success text-white p-2 mx-5 text-center">
                    <?php echo $registro;?>
                </div>
            <?php
            }
            include('function/errors.php');
            ?>
            
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="m-5">

                    <label for="" class="text-secondary">Usuario:</label>
                    <div class="input-group mb-5">
                        <div class="input-group-prepend">
                            <i class="input-group-text bg-primary text-white fas fa-user"></i>
                        </div>
                        <!-- Input para el usuario -->
                        <input type="text" placeholder="Nombre de usuario" autocomplete="off" name="usuario" class="form-control">
                    </div>

                    <div class="form-row">

                        <div class="col-6 mb-3">
                            <label for="" class="text-secondary">Contraseña:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <i class="input-group-text bg-primary text-white fas fa-key"></i>
                                </div>
                                <!-- Input para la contraseña -->
                                <input type="password" placeholder="Contraseña" name="contrasena" class="form-control">
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="" class="text-secondary">Repite la contraseña:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <i class="input-group-text bg-primary text-white fas fa-key"></i>
                                </div>
                                <!-- Input para la repetición de la contraseña -->
                                <input type="password" placeholder="Repite tu contraseña" name="repContrasena" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-4 offset-8">
                            <!-- Input del botón para enviar el formulario -->
                            <input type="submit" class="form-control btn btn-primary" name="enviar" value="Registrarme">
                        </div>
                      
                    </div>
                   
                </form>
                <div class="col-4 m-5">
                            <a href="login.php"><button class="btn btn-outline-secondary form-control">Iniciar sesión</button></a>
                            <p class="text-secondary text-center">¿Ya tienes cuenta?</p>
                </div>
            </div>
        </div>
    </div>

    <?php include('templates/footer.php');?>