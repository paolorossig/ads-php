<?php
    session_start();

    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email=="" || $password=="") {
        echo "Credenciales incorrectas";
    }
    else {
        $enlace = mysqli_connect("localhost","root","","GoodCookies");
        $sentencia = "select * from usuario where email='$email' and password='$password';";
        $resultado_usuario = mysqli_query($enlace, $sentencia);
        $registro_usuario = mysqli_fetch_row($resultado_usuario);
        
        $numFilas = mysqli_num_rows($resultado_usuario);
        if ($numFilas==0){
            session_destroy();
            header("Location:../index.html");
        }
        else{
            $codUsuario = $registro_usuario[0];

            $sentencia = "select * from colaborador where codUsuario='$codUsuario';";
            $resultado_colaborador = mysqli_query($enlace, $sentencia);
            $registro_colaborador = mysqli_fetch_row($resultado_colaborador);

            $area = $registro_colaborador[4];
            $rol = $registro_colaborador[5];
            $displayName = $registro_colaborador[2]." ".$registro_colaborador[3];

            $_SESSION["codUsuario"] = $codUsuario;
            $_SESSION["displayName"] = $displayName;
            $_SESSION["area"] = $area;
            $_SESSION["rol"] = $rol;
            
            $sentencia = "select * from menuxrol where rol='$rol' limit 1;";
            $resultado_menu = mysqli_query($enlace, $sentencia);
            $registro_menu = mysqli_fetch_row($resultado_menu);

            header("Location:../".$registro_menu[3].".php");
        }				
    }
?>