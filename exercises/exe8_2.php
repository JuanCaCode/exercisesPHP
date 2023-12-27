<?php
    session_start();
    require_once('../templates/header.php');
    require_once('../templates/footer.php');
    require_once('../templates/goback.php');
    $header = new Header('Ejercicio 8. Ingreso de sueldos y sueldo mayor');
    $footer = new Footer();
    $goback = new GoBack();
    $header->render('..');

    if (isset($_POST['cantidad_sueldos'])) {
        $_SESSION['cantidad_sueldos'] = $_POST['cantidad_sueldos'];
        $_POST = array();
    }
?>
    <!-- FORMULARIO PARA INGRESAR VALOR DE SUELDOS -->
    <form id='form' class='form' action='' method='post'>
        <?php
            for ($i=0; $i < $_SESSION['cantidad_sueldos']; $i++) { 
                echo "<div class='form_control'>";
                echo "<label for='sueldo_$i'>Ingresar valor de sueldo ".($i+1)."</label>";
                echo "<input 
                        type='number' 
                        name='sueldo_$i' 
                        id='sueldo_$i'
                        placeholder='Ejemplo: 500'
                        required
                    >";
                echo "</div>";
            }
        ?>
    <button type='submit'>Registrar número</button>
    </form>
    <!-- END FORMULARIO PARA INGRESAR VALOR DE SUELDOS -->
<?php
    if(isset($_POST['sueldo_0'])){
        $sueldos = array();
        for ($i=0; $i < $_SESSION['cantidad_sueldos']; $i++) { 
            array_push($sueldos, $_POST["sueldo_$i"]);
        }
        $sueldo_mayor = max($sueldos);
        $sueldo_menor = min($sueldos);
        $sueldo_promedio = array_reduce(
            $sueldos,
            function($saved,$next){
                return $saved + $next;
            },0
        ) / count($sueldos);

        echo "<p>El sueldo mayor es: ".number_format($sueldo_mayor)."</p>";
        echo "<p>El sueldo menor es: ".number_format($sueldo_menor)."</p>";
        echo "<p>El sueldo promedio es: ".number_format($sueldo_promedio)."</p>";
    }

    $goback->render();
    $footer->render();
?>