<?php
    session_start();
    require_once('../templates/header.php');
    require_once('../templates/footer.php');
    require_once('../templates/goback.php');
    require_once('./exe7_functions.php');
    $header = new Header('Ejercicio 7. Gestión de facturas');
    $footer = new Footer();
    $goback = new GoBack();
    $header->render('..');

    $_SESSION['productos'] = [
        [
            'codigo' => 101,
            'nombre' => 'Desinfectante Azúl',
            'precio' => 10000
        ],
        [
            'codigo' => 202,
            'nombre' => 'Desinfectante Rojo',
            'precio' => 20000
        ],
        [
            'codigo' => 303,
            'nombre' => 'Desinfectante Verde',
            'precio' => 30000
        ]
    ];

    $_SESSION['facturas'] = isset($_SESSION['facturas']) ? $_SESSION['facturas'] : array();

    if(isset($_POST['producto']) && isset($_POST['cantidad'])){
        agregarFactura($_POST['producto'],$_POST['cantidad']);
    }

    if(isset($_POST['limpiar'])){
        limpiarFacturas();
    }
?>
    <!-- FORMULARIO PARA INGRESAR FACTURAS -->
    <form id='form' class="form" action="" method="post">
        <h3>Ingresar factura</h3>
        <div class="form_control">
            <label for="producto">Seleccione el producto</label>
            <select 
                name="producto" 
                id="producto"
                default="Seleccione un producto"
                required
            >
                <?php
                    foreach($_SESSION['productos'] as $producto){
                        echo "<option value='".$producto['codigo']."'>".$producto['nombre']."</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form_control">
            <label for="cantidad">Cantidad de litros</label>
            <input 
                type="number" 
                name="cantidad" 
                id="cantidad"
                placeholder="Ejemplo: 5"
                required
            >
        </div>
        <button type="submit">Agregar factura</button>
    </form>
    <!-- END FORMULARIO PARA INGRESAR FACTURAS -->

    <!-- TABLE PARA FACTURAS -->
    <?php
        if($_SESSION['facturas']){
            ?>
            <h3>Facturas Registradas</h3>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Código</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($_SESSION['facturas'] as $index => $factura){
                                echo "<tr>";
                                echo "<td>".$index + 1 ."</td>";
                                echo "<td>#".$factura['codigo']."</td>";
                                echo "<td>".$factura['producto']."</td>";
                                echo "<td>".$factura['cantidad']." lts</td>";
                                echo "<td>$".number_format($factura['precio'])."</td>";
                                echo "<td>$".number_format($factura['total'])."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            <?php
        }
    ?>
    <!-- END TABLE PARA FACTURAS -->

    <!-- DETALLE TOTAL FACTURAS -->
    <?php
        if($_SESSION['facturas']){
            echo "<form id='form' class='form' action='' method='post'>";
            echo "<h3>Detalle total facturas | Total: $".number_format(sumarTotalFacturas())."</h3>";
            echo "<p>Productos vendidos:</p>";
            productosVendidos();
            echo "<p>Facturas mayores a $600.000: ".facturasSuperiores(). " facturas emitidas</p>";
            echo "<button type='submit' name='limpiar'>Limpiar facturas</button>";
            echo "</form>";
        }
    ?>
    <!-- END DETALLE TOTAL FACTURAS -->

<?php
    $goback->render();
    $footer->render();
?>