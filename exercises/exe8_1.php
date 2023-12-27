<?php
    require_once('../templates/header.php');
    require_once('../templates/footer.php');
    require_once('../templates/goback.php');
    $header = new Header('Ejercicio 8. Ingreso de sueldos y sueldo mayor');
    $footer = new Footer();
    $goback = new GoBack();
    $header->render('..');
?>
    <!-- FORMULARIO PARA INGRESAR NÚMERO DE SUELDOS -->
    <form id='form' class='form' action='./exe8_2.php' method='post'>
        <div class="form_control">
            <label for="cantidad_sueldos">Ingresar N° de sueldos a registrar</label>
            <input 
                type="number" 
                name="cantidad_sueldos" 
                id="cantidad_sueldos"
                placeholder="Ejemplo: 5"
                required
            >
        </div>
        <button type='submit'>Registrar número</button>
    </form>
    
<?php
    $goback->render();
    $footer->render();
?>