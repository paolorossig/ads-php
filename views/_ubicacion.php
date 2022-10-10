<?php
    $nombreUbicacion = $_GET['cod'];
    echo "<h1>Ubicación: $nombreUbicacion</h1>";
    
    $prefix = substr($nombreUbicacion, 0, 2);
    $tableName = "materiaprima";

    if ($prefix == "PT") {
        $tableName = "producto";
    }

    $enlace = mysqli_connect("localhost", "root", "", "GoodCookies");

    $sentencia_ubicacion = "select cod from ubicacion
                            where nombre = '$nombreUbicacion';";
    $resultado_ubicacion = mysqli_query($enlace, $sentencia_ubicacion);
    $registro_ubicacion = mysqli_fetch_row($resultado_ubicacion);
    $codUbicacion = $registro_ubicacion[0];

    $sentencia_item = "select i.cod, i.nombre, sum(m.cantidad) as cantidad, i.unidad from $tableName i
                                    join movimiento m on i.cod = m.codItem
                                where (m.codUbicacionOrigen = '$codUbicacion' or m.codUbicacionDestino = '$codUbicacion')
                                group by i.cod, i.nombre, i.unidad;";
    $resultado_item = mysqli_query($enlace, $sentencia_item);
?>
<table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Unidad</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ($row_item = $resultado_item->fetch_row()) {
                echo "<tr>";
                    echo "<td>MP00".$row_item[0]."</td>";
                    echo "<td>".$row_item[1]."</td>";
                    echo "<td>".$row_item[2]."</td>";
                    echo "<td>".$row_item[3]."</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>