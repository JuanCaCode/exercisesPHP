<?php
    session_start();
    require_once('../templates/header.php');
    require_once('../templates/footer.php');
    require_once('../templates/goback.php');
    $header = new Header('Ejercicio 2. Acertar un número aleatorio del 1 al 10');
    $footer = new Footer();
    $goback = new GoBack();
    $header->render('..');

    const MAX_NUMBER = 10;
    const MIN_NUMBER = 1;
    if(!isset($_SESSION['randomNumber'])){
        $_SESSION['randomNumber'] = rand(MIN_NUMBER, MAX_NUMBER);
    }
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
    $randomNumber = $_SESSION['randomNumber'];

    if (isset($_POST['number'])) {
        if($_POST['number'] >= MIN_NUMBER && $_POST['number'] <= MAX_NUMBER){
            $number = $_POST['number'];
            if($number == $randomNumber){
                echo "<p>¡Felicitaciones! Acertaste el número</p>";
                unset($_SESSION['randomNumber']); 
            }else if($number > $randomNumber){
                echo "<p>Tu número es mayor</p>";
            }else{
                echo "<p>Tu número es menor</p>";
            }
        }else{
            echo "<p>El número debe estar entre 1 y el 10</p>";
        }
    }
?>

<?php
    $goback->render();
    $footer->render();
?>