<?php
    $enlace = mysqli_connect("localhost","root","","GoodCookies");
    $sentencia_operarios = "select c.cod, c.nombres, c.apellidos, u.email, p.nombre from colaborador c
                            join usuario u on c.codUsuario = u.cod
                            join productoxcolaborador pxc on c.cod = pxc.codColaborador
                            join producto p on pxc.codProducto = p.cod;";
    $resultado_operarios = mysqli_query($enlace, $sentencia_operarios);
?>
<h1>Operarios</h1>
<div class="table_and_buttons">
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Galleta</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($row_operario = $resultado_operarios->fetch_row()) {
                    echo "<tr>";
                        echo "<td>#00".$row_operario[0]."</td>";
                        echo "<td>".$row_operario[1]."</td>";
                        echo "<td>".$row_operario[2]."</td>";
                        echo "<td>".$row_operario[3]."</td>";
                        echo "<td>".$row_operario[4]."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <div>
        <button>Agregar</button>
        <button>Eliminar</button>
    </div>
</div>