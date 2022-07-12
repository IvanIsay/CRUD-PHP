<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-6">

  <!--archivos Css para bootstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!-- Css propio-->
  <link rel="stylesheet" href="css/estilos.css">
  <title>Controlador</title>
</head>

  <body >


    <?php

      require 'funcionesBD.php';

      if(isset($_POST['btnValidar'])){

        $correoLog= $_POST['txtcorreo'];
        $passLog= $_POST['txtpass'];

        $status=  validarUsuario($correoLog, $passLog);

        if($status == 1){
          echo '<script> alert("Bienvenido a mancos Anomimos")</script>';
          echo '<script> window.location="inicio.html" </script>';

        }else{
          echo '<script> alert("Revise sus credenciales")</script>';
          echo '<script> window.location="index.html" </script>';

        }

      }


      // ISSET para el boton de Guardar Usuario
        if(isset($_POST['btnGuardarU'])){

          $correo= $_POST['txtcorreo'];
          $contra= $_POST['txtpass'];
          $confirma= $_POST['txtconfirma'];
          $perfil=$_POST['selectperfil'];

            if($contra === $confirma){
              //guardar Usuario

                $status=  guardarUsuario($correo,$contra,$perfil);

                if($status == 1){
                  echo '<script> alert("Usuario Guardado en BD")</script>';
                  echo '<script> window.location="formUsuarios.html" </script>';
                }else{
                  echo '<script> alert("No se pudo guardar el usuario ")</script>';
                  echo '<script> window.location="formUsuarios.html" </script>';
                }

            }else{
              // detemos avisamos
              echo '<script> alert("Contraseñas no coinciden")</script>';
              echo '<script> window.location="formUsuarios.html" </script>';
            }
        }

        // ISSET para el boton de elimnar Usuario
          if(isset($_POST['btnEliminar'])){

            $idU= $_POST['txtid'];
            $status= EliminarU($idU);

            if($status == 1){
              echo '<script> alert("Usuario eliminado en BD")</script>';
              echo '<script> window.location="consultarUsuarios.php" </script>';
            }else{
              echo '<script> alert("No se pudo eliminar el usuario ")</script>';
              echo '<script> window.location="consultarUsuarios.php" </script>';
            }

          }

          // ISSET para el boton de regresar a consulta
            if(isset($_POST['btnRegresar'])){
                echo '<script> window.location="consultarUsuarios.php" </script>';
            }



     ?>
  </body>
  </html>
