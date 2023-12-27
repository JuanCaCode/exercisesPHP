<?php
    require_once('../templates/header.php');
    require_once('../templates/footer.php');
    require_once('../templates/goback.php');
    $header = new Header('Ejercicio 5. Media de números positivos, negativos y cantidad de ceros');
    $footer = new Footer();
    $goback = new GoBack();
    $header->render('..');
?>

<form id='form' class="form" action="" method="post">
    <div class="form_control">
        <?php
            for($i=1;$i<=10;$i++){
                echo "<input 
                    type='number' 
                    name='number$i' 
                    id='number$i'
                    placeholder='Ingresar número $i'
                    required
                >";
            }
        ?>
    </div>
    <button type="submit">Calcular medias y cantidad de ceros</button>
</form>

<?php
    function calcularMedia(array $numbers){
        $sum = array_reduce(
            $numbers,
            function($saved,$next){
                return $saved + $next;
            },0
        );
        if($sum == 0){return 0;}
        return $sum / count($numbers);
    }

    function countCeros(array $numbers){
        $ceros = 0;
        foreach($numbers as $num){
            $num_length = strlen($num);
            $length_sin_ceros = strlen(trim($num, '0'));
            $ceros += $num_length - $length_sin_ceros;
        }
        return $ceros;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $numbers = array();

        for($i=1;$i<=10;$i++){
            array_push($numbers, $_POST["number$i"]);
        }

        $positivos = array_filter($numbers, function($num){return $num > 0;});
        $negativos = array_filter($numbers, function($num){return $num < 0;});
        
        $media_positivos = calcularMedia($positivos);
        $media_negativos = calcularMedia($negativos);

        $ceros = countCeros($numbers);
        $numbers = implode(', ', $numbers);
        
        echo "<p>Números ingresados: ".$numbers."</p>";
        echo "<p>Media de positivos: $media_positivos</p>";
        echo "<p>Media de negativos: $media_negativos</p>";
        echo "<p>Cantidad de ceros: $ceros</p>";
    }
?>

<?php
    $goback->render();
    $footer->render();
?>