<?php
    require_once('./templates/header.php');
    require_once('./templates/footer.php');
    $header = new Header('Lista de ejercicios');
    $footer = new Footer();
    $header->render('.');

    $links = [
        '1. Leer un número y mostrar su cuadrado' => './exercises/exe1.php',
        '2. Acertar un número aleatorio del 1 al 10' => './exercises/exe2.php',
        '3. Mostrar el producto de los 10 primeros números impares' => './exercises/exe3.php',
        '4. Calcular factorial de un número' => './exercises/exe4.php',
        '5. Media de números positivos, negativos y cantidad de ceros' => './exercises/exe5.php',
        '6. Tabla de multiplicar de número entre 1 y 10' => './exercises/exe6.php',
        '7. Gestión de facturas' => './exercises/exe7.php',
        '8. Ingreso de sueldos y sueldo mayor' => './exercises/exe8_1.php',
        '9. Contador de 5 digitos y reemplazo del 3 por E' => './exercises/exe9.php',
    ];
?>
    <ul class='mainContainer_list'>
        <?php
            foreach ($links as $title => $link) {
                echo "<li class='list-item'><a href='$link'>$title</a></li>";
            }
        ?>
    </ul>  
<?php
    $footer->render('.');
?>