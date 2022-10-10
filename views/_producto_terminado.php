<?php
    $enlace = mysqli_connect("localhost", "root", "", "GoodCookies");
    $sentencia_productoterminado = "select p.cod, p.nombre, m.cantidad, p.unidad, u.nombre from producto p
                                join movimiento m on p.cod = m.codItem
                                join ubicacion u on m.codUbicacionDestino = u.cod
                            where m.tipoProducto = 'productoterminado';";
    $resultado_productoterminado = mysqli_query($enlace, $sentencia_productoterminado);
?>
<h1>Producto Terminado</h1>
<div class="table_and_buttons">
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Unidad</th>
                <th>Ubicación</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($row_productoterminado = $resultado_productoterminado->fetch_row()) {
                    $colorClass = $row_productoterminado[2] > 0 ? "positive" : "negative";

                    echo "<tr>";
                        echo "<td>PT00".$row_productoterminado[0]."</td>";
                        echo "<td>".$row_productoterminado[1]."</td>";
                        echo "<td class='$colorClass'>".$row_productoterminado[2]."</td>";
                        echo "<td>".$row_productoterminado[3]."</td>";
                        echo "<td><a href='ubicacion.php?cod=".$row_productoterminado[4]."'>".$row_productoterminado[4]."</a></td>";
                        echo "<td><a href='editar-materia-prima.php?cod=".$row_productoterminado[0]."'>Editar</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <button>Registrar</button>
</div>