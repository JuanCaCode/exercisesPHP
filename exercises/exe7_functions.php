<?php
    function agregarFactura($codigo, $cantidad){
        $key_encontrada = array_search($codigo, array_column($_SESSION['productos'], 'codigo'));

        if(!$key_encontrada && $key_encontrada !== 0){
            echo "<p>El producto no existe</p> $key_encontrada";
            return;
        }

        $factura = array(
            'codigo' => $_SESSION['productos'][$key_encontrada]['codigo'],
            'producto' => $_SESSION['productos'][$key_encontrada]['nombre'],
            'cantidad' => $cantidad,
            'precio' => $_SESSION['productos'][$key_encontrada]['precio'],
            'total' => $_SESSION['productos'][$key_encontrada]['precio'] * $cantidad
        );

        array_push($_SESSION['facturas'], $factura);
        $_POST = array();
    }

    function limpiarFacturas(){
        $_SESSION['facturas'] = array();
        $_POST = array();
    }

    function sumarTotalFacturas(){
        $total = array_reduce(
            $_SESSION['facturas'],
            function($saved,$next){
                return $saved + $next['total'];
            },0
        );
        return $total;
    }

    function productosVendidos(){
        $productos = array();
        foreach($_SESSION['facturas'] as $factura){
            if(!array_key_exists($factura['producto'], $productos)){
                $productos[$factura['producto']] = $factura['cantidad'];
            }else{
                $productos[$factura['producto']] += $factura['cantidad'];
            }
        }

        echo "<ul>";
            foreach($productos as $producto => $cantidad){
                echo "<li>$producto: $cantidad litros</li>";
            };
        echo "</ul>";
    }

    function facturasSuperiores(){
        $facturas = array();
        foreach($_SESSION['facturas'] as $factura){
            if($factura['total'] > 600000){
                array_push($facturas, $factura);
            }
        }
        return sizeof($facturas);
    }
?>