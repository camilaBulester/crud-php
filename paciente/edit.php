<?php
    include_once('../config/config.php');
    include('paciente.php');

    
        $p = new paciente();
        $dp = mysqli_fetch_object ($p->getOne($_GET['id']));

      if(isset($_POST) && !empty($_POST)){
        $_POST['imagen'] = $db->imagen;
        if ( $_FILES['imagen']['name'] !== ''){
            $_POST['imagen'] = saveImage($_FILES);
        }
        $update = $p->update($_POST);
        if ($update){
            $mensaje = '<div class="alert alert-success" role="alert" > Sesión modificada con exito. </div>';
         }else{
            $mensaje = '<div class="alert alert-danger"  role="alert" > Error! </div>';
         }
      }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title> Modificar Sesión </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>
    <?php include('../menu.php') ?>
    <div class="container">
        <?php
        if(isset($mensaje)){
            echo $mensaje;
        }
        ?>
             <h2 class="text-center mb-2"> Modificar Sesión </h2>
            <form method="POST" enctype="multipart/form=data">
            
            <div class="row mb-2">
                <div class="col">
                    <input type="text" name="nombre" id="nombre" placeholder="Nombres"  value="<?= $dp->nombre?>" class="form-control"/>
                    <input type="hidden" name="id" value="<?= $dp->id?>" />
                <div class="col">
                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos"  value="<?= $dp->apellidos?>" class="form-control" /> 
                </div>

            </div>


            <div class="row mb-2">
                <div class="col">
                    <input type="number" name="celular" id="celular" placeholder="Celular" class="form-control" value="<?= $dp->celular?>" /> 
                </div>
                <div class="col">
                <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="<?= $dp->email?>" /> 
                </div>

            </div>


            <div class="row mb-2">
                <div class="col">
                    <input type="number" name="edad" id="edad" placeholder="Edad" class="form-control" value="<?= $dp->edad?>"/> 
                </div>
                <div class="col">
                <textarea name="niveleducativo" id="niveleducativo" placeholder="Nivel educativo" class="form-control" > 
                    <?= $dp->niveleducativo?> </textarea> 
                </div>

            </div>

            <div class="row mb-2">
                <div class="col">
                <textarea name="perfillaboral" id="perfillaboral" placeholder="Perfil laboral" class="form-control" > 
                    <?= $dp->perfillaboral?> </textarea> 
                </div>
                <div class="col">
                <input type="file" name="imagen" id="imagen" class="form-control" /> 
                </div>

            </div>
            <button class="btn btn-success"> Modificar </button>
            </form>
        </div>
</body>
</html>