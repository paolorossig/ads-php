<?php
    $codUsuario = $_SESSION['codUsuario'];
    $enlace = mysqli_connect("localhost","root","","GoodCookies");
    $sentencia = "select c.nombres, c.apellidos, c.cod, c.area, c.rol, u.email, u.password from colaborador c left join usuario u on c.codUsuario = u.cod where c.codUsuario='$codUsuario';";
    $resultado_colaborador = mysqli_query($enlace, $sentencia);
    $registro_colaborador = mysqli_fetch_row($resultado_colaborador);
?>
<h1>Mi Perfil</h1>
<section id="perfil">
    <form action="functions/editar-perfil.php" method="POST">
        <div class="perfil_up">
            <div class="perfil_up_left">
                <img
                    src="https://res.cloudinary.com/paolorossi/image/upload/v1652998240/spotiparty/user_placeholder_zpoic6.png"
                    alt="User Image"
                    width="150"
                    height="150"
                />
                <button class="secondary">Cambiar foto de perfil</button>
            </div>
            <div class="perfil_up_right">
                <label for="nombres">Nombres:</label>
                <input type="text" name="nombres" value=<?php echo $registro_colaborador[0]; ?> />
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" value=<?php echo $registro_colaborador[1]; ?> />
            </div>
        </div>
        <div class="perfil_down">
            <div>
                <label for="codColaborador">Código de Colaborador</label>
                <input type="number" name="codColaborador" value=<?php echo $registro_colaborador[2]; ?> disabled>
            </div>
            <div>
                <label for="area">Área</label>
                <input type="text" name="area" value=<?php echo $registro_colaborador[3]; ?> disabled />
            </div>
            <div>
                <label for="rol">Rol</label>
                <input type="text" name="rol" value=<?php echo $registro_colaborador[4]; ?> disabled />
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" value=<?php echo $registro_colaborador[5]; ?> />
            </div>
            <div>
                <label for="password">Contraseña</label>
                <input type="password" name="password" value=<?php echo $registro_colaborador[6]; ?> />
            </div>
        </div>
        <button type="submit">Guardar</button>
    </form>
</section>