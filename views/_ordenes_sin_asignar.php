<h2>Órdenes sin asignar</h2>
<table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Cliente</th>
            <th>Fecha de creación</th>
            <th>Prioridad</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $enlace = mysqli_connect("localhost","root","","GoodCookies");
            $sentencia_ordenes = "select cod, cliente, fechaCreacion, prioridad, estado from orden where estado = 'Pendiente';";
            $resultado_ordenes = mysqli_query($enlace, $sentencia_ordenes);
            while ($row_orden = $resultado_ordenes->fetch_row()) {
                echo "<tr>";
                    echo "<td>#00".$row_orden[0]."</td>";
                    echo "<td>".$row_orden[1]."</td>";
                    echo "<td>".$row_orden[2]."</td>";
                    echo "<td>".$row_orden[3]."</td>";
                    echo "<td>".$row_orden[4]."</td>";
                    echo "<td>";
                        echo "<a href='asignar.php?cod=".$row_orden[0]."'>Asignar</a><br />";
                        echo "<a href='orden.php?cod=".$row_orden[0]."'>Ver más</a>";
                    echo "</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>