<?php
    $nombreUbicacion = $_GET['cod'];
    echo "<h1>Ubicación: $nombreUbicacion</h1>";

    $enlace = mysqli_connect("localhost", "root", "", "GoodCookies");

    $sentencia_ubicacion = "select cod from ubicacion
                            where nombre = '$nombreUbicacion';";
    $resultado_ubicacion = mysqli_query($enlace, $sentencia_ubicacion);
    $registro_ubicacion = mysqli_fetch_row($resultado_ubicacion);
    $codUbicacion = $registro_ubicacion[0];

    $sentencia_materiaprima = "select mp.cod, mp.nombre, sum(m.cantidad) as cantidad, mp.unidad from materiaprima mp
                                    join movimiento m on mp.cod = m.codItem
                                where (m.codUbicacionOrigen = '$codUbicacion' or m.codUbicacionDestino = '$codUbicacion')
                                group by mp.cod, mp.nombre, mp.unidad;";
    $resultado_materiaprima = mysqli_query($enlace, $sentencia_materiaprima);
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
            while ($row_materiaprima = $resultado_materiaprima->fetch_row()) {
                echo "<tr>";
                    echo "<td>MP00".$row_materiaprima[0]."</td>";
                    echo "<td>".$row_materiaprima[1]."</td>";
                    echo "<td>".$row_materiaprima[2]."</td>";
                    echo "<td>".$row_materiaprima[3]."</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>