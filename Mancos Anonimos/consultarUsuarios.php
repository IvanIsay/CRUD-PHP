<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title>Consulta Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary " >
    <a class="navbar-brand" href="#"> Mancos Anonimos </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item active">
          <a class="nav-link" href="inicio.html"> <i class="bi bi-house-fill"></i> Inicio<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-person-circle"></i> Usuarios
          </a>

          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="formUsuarios.html"><i class="bi bi-person-plus-fill"></i>  Registro de Usuarios</a>
            <a class="dropdown-item" href="consultarUsuarios.php"><i class="bi bi-person-lines-fill"></i> Consulta de Usuarios</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="bi bi-joystick"></i>  Videojuegos
          </a>

          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#"> <i class="bi bi-controller"></i> Registro de Videojuegos</a>
            <a class="dropdown-item" href="#"> <i class="bi bi-view-stacked"></i> Consulta de Videojuegos</a>
          </div>
        </li>

      </ul>
      <form class="form-inline my-2 my-lg-0">
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>
    </nav>


      <h1 class="display-4 text-center text-light mt-5 mb-5"> Usuarios Registrados </h1>

      <div class="container">



          <table class="table table-hover">
              <thead class="bg-danger">
                <tr >
                  <th scope="col">Id:</th>
                  <th scope="col">Correo:</th>
                  <th scope="col">Contraseña:</th>
                  <th scope="col">Perfil:</th>
                  <th scope="col">Eliminar:</th>
                </tr>
              </thead>

                <tbody class="bg-primary">
                  <?php
                    require 'funcionesBD.php';
                    $tablaUsu= consultarUsuarios();

                    while($arrUsuarios= mysqli_fetch_array($tablaUsu)){
                      echo"<tr>
                          <th>".$arrUsuarios['idusuario']."</th>
                          <td>".$arrUsuarios['correo']."</td>
                          <td>".$arrUsuarios['contra']."</td>
                          <td>".$arrUsuarios['perfil']."</td>
                          <td> <a href='confirmaElim.php?id=".$arrUsuarios['idusuario']."&co=".$arrUsuarios['correo']." '><img src= img/elimU24.png > </a></td>
                          </tr>";
                    }

                   ?>
                </tbody>

            </table>
      </div>






    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>
