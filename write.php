<?php
class Escribir // La Clase Escribir se usa cuando se encuentra el comando Escribir en el source de Pseint.
{
    function set_text($text) // La función set_text($text), recibe el texto a mostrar en pantalla.
    {
        echo '<h3>' . $text . '</h3>'; // Lo pone en un h3.
    }
}
?>