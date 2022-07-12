
<?php

  function conectarBD(){

    $servidor="localhost";
    $baseDatos="bdmancos";
    $usuario="root";
    $contraBD="";

    $conex  =  mysqli_connect($servidor,$usuario,$contraBD,$baseDatos)or die("Error de conexion");

    return $conex ;

  }

  function validarUsuario($corr,$pass){

    //datos de preparacion
    $conexion=conectarBD();
    $consultaUsu="select contra from tbusuarios where correo='$corr' ";

    //ejecutamos la consulta y cerramos conexion
    $rsResp= mysqli_query($conexion, $consultaUsu);
    mysqli_close($conexion);

    //conversion de un resultset a un arregloy extracion de la contraseña BD
    while($fila= mysqli_fetch_array($rsResp)){
       $passBD= $fila['contra'];
    }

      // comprobacion contraseñas
      // status 1 = SI tiene acesso al sistema
      // status 0 = NO tiene acesso al sistema

        if ($pass ===  $passBD) {
          $status=1;
        }else{
          $status=0;
        }

        //respuesta de la function
        return $status ;

  }


  function guardarUsuario($corr,$cont,$perf){

     $conexion=conectarBD();
     $insertU="insert into tbusuarios(correo,contra,perfil) values(?,?,?)";

       try{
         $stm= $conexion->prepare($insertU);
         $stm->bind_param('sss',$corr,$cont,$perf);
         $stm->execute();

         $stm->close();
         mysqli_close($conexion);

         return $status= 1;

       }catch(Exception $e){
         die('Error de insert:'. $e->getMessage());
       }

 }


  function consultarUsuarios(){
    $conex= conectarBD();
    $consulta= "select * from tbusuarios";

    try{
      $rsUsuarios= mysqli_query($conex, $consulta);
      mysqli_close($conex);

      return $rsUsuarios;

    }
    catch(Exception $e){
      die('excepcion al consultar '. $e->getMessage() );
    }

  }


  function EliminarU($id){
      $conex= conectarBD();
      $elim="delete from tbusuarios where idusuario=?";

      try{
        $stm= $conex->prepare($elim);
        $stm->bind_param('i',$id);
        $stm->execute();
        $stm->close();
        mysqli_close($conex);

        return $status= 1;

      }catch(Exeption $e){
        die('Error al intentar Eliminar'.$e->getMessage());
      }

  }


























 ?>
