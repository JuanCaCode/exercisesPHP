<?php
    session_start();
    require_once('../templates/header.php');
    require_once('../templates/footer.php');
    require_once('../templates/goback.php');
    $header = new Header('Ejercicio 6. Tabla de multiplicar de número entre 1 y 10');
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
    <button type="submit">Calcular tabla</button>
</form>

<?php
    const MAX_NUMBER = 10;
    const MIN_NUMBER = 1;
    if (isset($_POST['number'])) {
        $number = $_POST['number'];
        if($number >= MIN_NUMBER && $number <= MAX_NUMBER){
            for($i=0;$i<=10;$i++){
                echo "<p>$number x $i = ".$number*$i."</p>";
            }
        }else{
            echo "<p>El número debe estar entre 0 y el 10</p>";
        }
    }
?>

<?php
    $goback->render();
    $footer->render();
?>