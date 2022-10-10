<?php
    $codOrden = $_GET['cod'];

    $enlace = mysqli_connect("localhost", "root", "", "GoodCookies");
    $sentencia_orden = "select cod, estado, prioridad, fechaCreacion, cliente from orden where cod = '$codOrden';";
    $resultado_orden = mysqli_query($enlace, $sentencia_orden);
    $registro_orden = mysqli_fetch_row($resultado_orden);
?>
<h1>Detalle de la Orden</h1>
<section>
    <form action="functions/editar-orden.php" method="POST">
        <div>
            <label for="codOrden">Código de la Orden</label>
            <input type="text" name="codOrden" value=<?php echo $registro_orden[0]; ?> disabled />
        </div>
        <div>
            <label for="estado">Estado de la Orden</label>
            <input type="text" name="estado" value=<?php echo $registro_orden[1]; ?> />
        </div>
        <div>
            <label for="prioridad">Prioridad</label>
            <input type="number" name="prioridad" value=<?php echo $registro_orden[2]; ?> />
        </div>
        <div>
            <label for="fechaCreacion">Prioridad</label>
            <input type="date" name="fechaCreacion" value=<?php echo $registro_orden[3]; ?> />
        </div>
        <div>
            <label for="cliente">Cliente</label>
            <input type="text" name="cliente" value=<?php echo $registro_orden[4]; ?> />
        </div>
        <div>
            <p>Productos:</p>
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sentencia_productos = "select p.cod, p.nombre, o.cantidad from orden o
                                                    join producto p on o.codProducto = p.cod
                                                where o.cod = '$codOrden';";
                        $resultado_productos = mysqli_query($enlace, $sentencia_productos);
                        while ($row_producto = $resultado_productos->fetch_row()) {
                            echo "<tr>";
                                echo "<td>".$row_producto[0]."</td>";
                                echo "<td>".$row_producto[1]."</td>";
                                echo "<td>".$row_producto[2]."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <br />
        <button type="submit">Guardar</button>
    </form>
</section>