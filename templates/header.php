<?php
    class Header {
        public function __construct($title) {
            $this->title = $title;
        }

        public function render($dots) {
            echo "
                <!DOCTYPE html>
                <html lang='es'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>$this->title</title>
                    <link rel='stylesheet' href='$dots/css/styles.css'>
                </head>
                <body>
                <main class='mainContainer'>
                    <div class='titleContainer'>
                        <h1>Act 04 Fundamentos de programación</h1>
                        <p>Juan Camilo Campo Tangarife - Ingeniería de Software</p>
                        <p>Fundamentos de programación - Magda Paola Fernandez</p>
                    </div>

                    <h2>$this->title</h2>
            ";
        }
    }
?>