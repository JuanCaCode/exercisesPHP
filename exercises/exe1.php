<?php
    require_once('../templates/header.php');
    require_once('../templates/footer.php');
    require_once('../templates/goback.php');
    $header = new Header('Ejercicio 1. Leer un número y mostrar su cuadrado');
    $footer = new Footer();
    $goback = new GoBack();
    $header->render('..');
?>

    <form class="form" action="" method="post">
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
        <button type="submit">Calcular</button>
    </form>

<?php
    if (isset($_POST['number'])) {
        if($_POST['number'] > 0){
            $number = $_POST['number'];
            echo "<p>El cuadrado de $number es: " . pow($number, 2) . "</p>";
        }else{
            echo "<p>El número debe ser positivo</p>";
        }
    }
?>

<?php
    $goback->render();
    $footer->render();
?>