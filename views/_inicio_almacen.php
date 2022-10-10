<?php
    $enlace = mysqli_connect("localhost", "root", "", "GoodCookies");
    $sentencia_solicitudes = "select mp.cod, mp.nombre, sa.cantidad, mp.unidad from solicitudalmacen sa
                                join materiaprima mp on sa.codItem = mp.cod
                            where sa.tipoProducto = 'materiaprima';";
    $resultado_solicitudes = mysqli_query($enlace, $sentencia_solicitudes);
?>
<h1>Solicitudes a Almacén</h1>
<h2>Materia Prima:</h2>
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
            while ($row_solicitud = $resultado_solicitudes->fetch_row()) {
                echo "<tr>";
                    echo "<td>MP00".$row_solicitud[0]."</td>";
                    echo "<td>".$row_solicitud[1]."</td>";
                    echo "<td>".$row_solicitud[2]."</td>";
                    echo "<td>".$row_solicitud[3]."</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>