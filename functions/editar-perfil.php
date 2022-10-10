<?php
    session_start();
    if (!isset($_SESSION["codUsuario"])){
      session_destroy();
      header("Location:index.html");
      exit;
    }

    $codUsuario = $_SESSION['codUsuario'];

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $enlace = mysqli_connect("localhost","root","","GoodCookies");
    $sentencia_colaborador = "UPDATE colaborador SET
                                    nombres='$nombres',
                                    apellidos='$apellidos'
                            WHERE codUsuario='$codUsuario';";
    $sentencia_usuario = "UPDATE usuario SET
                                email='$email',
                                password='$password'
                        WHERE cod='$codUsuario';";
    mysqli_query($enlace, $sentencia_colaborador);
    mysqli_query($enlace, $sentencia_usuario);

    header("Location:../perfil.php");
?>