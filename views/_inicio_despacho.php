<?php
    $enlace = mysqli_connect("localhost","root","","GoodCookies");

    $sentencia_ordenes = "select cod, cliente, fechaCreacion, prioridad, estado from orden;";
    $resultado_ordenes = mysqli_query($enlace, $sentencia_ordenes);
?>
<h2>Órdenes Completadas</h2>
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
            $sentencia_ordenes = "select cod, cliente, fechaCreacion, prioridad, estado from orden where estado = 'Completada';";
            $resultado_ordenes = mysqli_query($enlace, $sentencia_ordenes);
            while ($row_orden = $resultado_ordenes->fetch_row()) {
                echo "<tr>";
                    echo "<td>#00".$row_orden[0]."</td>";
                    echo "<td>".$row_orden[1]."</td>";
                    echo "<td>".$row_orden[2]."</td>";
                    echo "<td>".$row_orden[3]."</td>";
                    echo "<td>".$row_orden[4]."</td>";
                    echo "<td><a href='orden.php?cod=".$row_orden[0]."'>Ver más</a></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
<br />
<br />
<h2>Órdenes Finalizadas</h2>
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
            $sentencia_ordenes = "select cod, cliente, fechaCreacion, prioridad, estado from orden where estado = 'Finalizada';";
            $resultado_ordenes = mysqli_query($enlace, $sentencia_ordenes);
            while ($row_orden = $resultado_ordenes->fetch_row()) {
                echo "<tr>";
                    echo "<td>#00".$row_orden[0]."</td>";
                    echo "<td>".$row_orden[1]."</td>";
                    echo "<td>".$row_orden[2]."</td>";
                    echo "<td>".$row_orden[3]."</td>";
                    echo "<td>".$row_orden[4]."</td>";
                    echo "<td><a href='orden.php?cod=".$row_orden[0]."'>Ver más</a></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>