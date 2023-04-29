<?php
class Leer // La clase Leer se usa cuando se encuentra el comando Leer en el source de Pseint.
{
    function set_input($name) // Función set_input(), se llama para poner los input en la pantalla.
    {
        if ($name != "sign")
        {
            if (empty($_SESSION["already"])) // Uso la variable de sesión already para asignar un id numérico a cada input, si la sesion no está creada, la crea.
            {
                $_SESSION["already"] = 1; // Le asigno el 1 a la sesión already.
                echo '<input id="' . $_SESSION["already"] . '" type="text">'; // Creo el input de tipo texto con la id 1.
            }
            else // Si la sesión ya está creada.
            {
                $_SESSION["already"]++; // Incremento el valor de la sesión.
                echo '<input id="' . $_SESSION["already"] . '" type="text">'; // Creo otro input de tipo texto con el valor actual de la sesión.
            }
        }
    }
}
?>