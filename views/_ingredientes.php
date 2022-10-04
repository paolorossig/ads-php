<h1>Ingredientes</h1>
<section>
    <form action="ingredientes.php" method="POST">
        <div class="search">
            <label for="quantity">Cantidad a producir:</label>
            <input type="number" name="quantity" />
            <button type="submit">Calcular</button>
        </div>
    </form>
    <?php
        if (isset($_POST["quantity"])) {
            echo "quantity: " . $_POST["quantity"];
        }
    ?>
    <table>
        <thead>
            <tr>
                <th>Ingrediente</th>
                <th>Cantidad</th>
                <th>Unidad</th>
                <th>Stock</th>
                <th>Faltante</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Harina</td>
                <td>100</td>
                <td>Gramos</td>
                <td>1000</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Leche</td>
                <td>100</td>
                <td>Gramos</td>
                <td>1000</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Huevo</td>
                <td>100</td>
                <td>Gramos</td>
                <td>1000</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Azucar</td>
                <td>100</td>
                <td>Gramos</td>
                <td>1000</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Sal</td>
                <td>100</td>
                <td>Gramos</td>
                <td>1000</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Chocolate</td>
                <td>100</td>
                <td>Gramos</td>
                <td>1000</td>
                <td>0</td>
            </tr>
        </tbody>
    </table>
</section>