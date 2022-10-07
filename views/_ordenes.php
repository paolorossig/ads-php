<?php
    $codUsuario = $_SESSION['codUsuario'];
    $enlace = mysqli_connect("localhost","root","","GoodCookies");
    $sentencia_orden = "select o.cod, o.cantidad, p.nombre, o.prioridad, o.estado from orden o
                            join producto p on p.cod = o.codProducto
                            join productoxcolaborador pxc on o.codProducto = pxc.codProducto
                            join colaborador c on c.cod = pxc.codColaborador
                        where c.codUsuario='$codUsuario';";
    $resultado_orden = mysqli_query($enlace, $sentencia_orden);
?>
<h1>Órdenes</h1>
<table>
    <thead>
        <tr>
            <th>Número</th>
            <th>Cantidad</th>
            <th>Producto</th>
            <th>Prioridad</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ($row_orden = $resultado_orden->fetch_row()) {
        ?>
        <tr>
            <td><?php echo "#00".$row_orden[0] ?></td>
            <td><?php echo $row_orden[1] ?></td>
            <td><?php echo $row_orden[2] ?></td>
            <td><?php echo $row_orden[3] ?></td>
            <td><?php echo $row_orden[4] ?></td>
            <td><a href="#">Editar</a></td>
        </tr>
        <?php     
            }
        ?>
    </tbody>
</table>