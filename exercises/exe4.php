<?php
    require_once('../templates/header.php');
    require_once('../templates/footer.php');
    require_once('../templates/goback.php');
    $header = new Header('Ejercicio 4. Calcular factorial de un número');
    $footer = new Footer();
    $goback = new GoBack();
    $header->render('..');
?>

    <form id='form' class="form" action="" method="post">
        <div class="form_control">
            <label for="number">Ingrese un número</label>
            <input 
                type="number" 
                name="number" 
                id="number"
                placeholder="Ejemplo: 5"
                required
            >
        </div>
        <button type="submit">Envíar</button>
    </form>

<?php

    if (isset($_POST['number'])) {
        $number = $_POST['number'];
        if( $number >= 0){
            $result = number_format(
                array_reduce(
                    range(1,$number),
                    function($saved,$next){
                        return $saved * $next;
                    },1
                )
            );
            $formated_num = number_format($number);
            echo "<p>El factorial de $formated_num es: $result</p>";
        }else{
            echo "<p>El número debe ser positivo.</p>";
        }
    }
?>

<?php
    $goback->render();
    $footer->render();
?>