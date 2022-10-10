<?php
    $enlace = mysqli_connect("localhost", "root", "", "GoodCookies");
    $sentencia_materiaprima = "select mp.cod, mp.nombre, m.cantidad, mp.unidad, u.nombre from materiaprima mp
                                join movimiento m on mp.cod = m.codItem
                                join ubicacion u on m.codUbicacionDestino = u.cod
                            where m.tipoProducto = 'materiaprima';";
    $resultado_materiaprima = mysqli_query($enlace, $sentencia_materiaprima);
?>
<h1>Materia Prima</h1>
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
                while ($row_materiaprima = $resultado_materiaprima->fetch_row()) {
                    $colorClass = $row_materiaprima[2] > 0 ? "positive" : "negative";

                    echo "<tr>";
                        echo "<td>MP00".$row_materiaprima[0]."</td>";
                        echo "<td>".$row_materiaprima[1]."</td>";
                        echo "<td class='$colorClass'>".$row_materiaprima[2]."</td>";
                        echo "<td>".$row_materiaprima[3]."</td>";
                        echo "<td><a href='ubicacion.php?cod=".$row_materiaprima[4]."'>".$row_materiaprima[4]."</a></td>";
                        echo "<td><a href='editar-materia-prima.php?cod=".$row_materiaprima[0]."'>Editar</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <button>Registrar</button>
</div>