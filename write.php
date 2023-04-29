<?php
class Escribir
{
    function set_text($text)
    {
        if ($text != "El resultado es: ")
        {
            echo '<h3>' . $text . '</h3>';
        }
        else
        {
            echo "<br><br>";
        }
    }
}
?>