<?php
    require_once('../templates/header.php');
    require_once('../templates/footer.php');
    require_once('../templates/goback.php');
    $header = new Header('Ejercicio 3. Mostrar el producto de los 10 primeros números impares.');
    $footer = new Footer();
    $goback = new GoBack();
    $header->render('..');

    $impar_numbers = array();
    for($i = 1; $i <= 20; $i++){
        if($i % 2 != 0){
            array_push($impar_numbers, $i);
        }
    }
?>

    <form id='form' class="form" action="" method="post">
        <p>Primeros 10 impares: 
            <?php
                $impar_numbers_string = implode(', ', $impar_numbers);
                echo $impar_numbers_string;
            ?>
        </p>
        <div class="form_control">
            <button type="submit">Calcular producto</button>
        </div>
    </form>

<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $result = number_format(
            array_reduce(
                $impar_numbers,
                function($saved,$next){
                    return $saved * $next;
                },1
            )
        );
        echo "<p>El producto de los primeros 10 impares es: $result</p>";
    }
?>

<?php
    $goback->render();
    $footer->render();
?>