<?php
    $enlace = mysqli_connect("localhost","root","","GoodCookies");
    $sentencia_galletas = "select * from producto;";
    $resultado_galletas = mysqli_query($enlace, $sentencia_galletas);
?>
<h1>Galletas</h1>
<section>
    <div class="galletas">
        <?php
            while ($row_galleta = $resultado_galletas->fetch_row()) {
                echo "<a href='ingredientes-producto.php?codProducto=".$row_galleta[0]."'>";
                    echo "<article>";
                        echo "<img src='images/".$row_galleta[3]."' />";
                        echo "<h2>".$row_galleta[1]."</h2>";
                        echo "<p>PT00".$row_galleta[0]."</p>";
                    echo "</article>";
                echo "</a>";
            }
        ?>
    </div>
    <div class="buttons_container">
        <button>Agregar</button>
        <button>Eliminar</button>
    </div>
</section>