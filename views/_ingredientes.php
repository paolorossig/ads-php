<?php
    $codUsuario = $_SESSION['codUsuario'];
    $enlace = mysqli_connect("localhost", "root", "", "GoodCookies");

    $sentencia_producto = "select p.* from producto p
                            join productoxcolaborador pxc on p.cod = pxc.codProducto
                            join colaborador c on c.cod = pxc.codColaborador
                        where c.codUsuario='$codUsuario';";
    $resultado_producto = mysqli_query($enlace, $sentencia_producto);
    $registro_producto = mysqli_fetch_row($resultado_producto);

    $codProducto = $registro_producto[0];
    
    $sentencia_ordenes = "select * from orden where codProducto='$codProducto' and estado = 'Pendiente';";
    $resultado_ordenes = mysqli_query($enlace, $sentencia_ordenes);

    $sentencia_materiaprima = "select mp.nombre, mpxp.cantidad, mp.unidad from materiaprima mp
                                join materiaprimaxproducto mpxp on mp.cod = mpxp.codMateriaprima
                            where mpxp.codProducto='$codProducto';";
    $resultado_materiaprima = mysqli_query($enlace, $sentencia_materiaprima);
?>
<h1>Ingredientes</h1>
<form action="ingredientes.php" method="GET">
    <div class="search">
        <label for="codOrden">Órden a producir:</label>
        <select name="codOrden">
            <option value="">Escoger la orden pendiente</option>
            <?php
                $codOrden = $_GET["codOrden"];
                echo $codOrden;
                while ($row_orden = $resultado_ordenes->fetch_row()) {
                    if (isset($codOrden) and $codOrden == $row_orden[0]) {
                        echo "<option value=".$row_orden[0]." selected>#00".$row_orden[0]."</option>";
                    } else {
                        echo "<option value=".$row_orden[0].">#00".$row_orden[0]."</option>";
                    }
                    
                }
            ?>
        </select>
        <button type="submit">Calcular</button>
    </div>
</form>
<form action="solicitud-alamacen.php" method="POST">
    <div class="table_and_buttons">
        <table>
            <thead>
                <tr>
                    <th>Ingrediente</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th>Stock</th>
                    <th>Faltante</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $cantidadOrden = 0;
                    
                    if (isset($codOrden)) {
                        $enlace = mysqli_connect("localhost", "root", "", "GoodCookies");
                        $sentencia_orden = "select cantidad from orden where cod='$codOrden';";
                        $resultado_orden = mysqli_query($enlace, $sentencia_orden);
                        $registro_orden = mysqli_fetch_row($resultado_orden);
                        $cantidadOrden = $registro_orden[0];
                    }

                    while ($row_materiaprima = $resultado_materiaprima->fetch_row()) {
                        $cantidad = $row_materiaprima[1] * $cantidadOrden;
                        $stock = 0;
                        $faltante = $cantidad - $stock;
                ?>
                <tr>
                    <td><?php echo $row_materiaprima[0]; ?></td>
                    <td><?php echo $cantidad; ?></td>
                    <td><?php echo $row_materiaprima[2]; ?></td>
                    <td><?php echo $stock; ?></td>
                    <td><?php echo $faltante; ?></td>
                </tr>
                <?php     
                    }
                ?>
            </tbody>
        </table>
        <button>Solicitar a Alamcén</button>
    </div>
</form>