<?php
    require_once('../templates/header.php');
    require_once('../templates/footer.php');
    require_once('../templates/goback.php');
    $header = new Header('Ejercicio 9. Contador de 5 digitos y reemplazo del 3 por E');
    $footer = new Footer();
    $goback = new GoBack();
    $header->render('..');
?>
    <section class='form'>
        <div class="form_control center">
            <h1>Contador</h1>
            <?php
                $MAX=99999;
                $MIN=0;
                $contador = 0;
                for($i=$MIN; $i<=$MAX; $i++){
                    $result = str_pad($i, 5, '0', STR_PAD_LEFT);
                    $contador++;
                    $reult_array = str_split($result);
                    $result = implode('-', $reult_array);
                    $result = str_replace('3', 'E', $result);
                    echo "<p>$result</p>";
                }
            ?>
            <h1>Fin de contador</h1>
        </div>
    </section>
<?php
    $goback->render();
    $footer->render();
?>