<?php
class Segun // La Clase Segun se usa cuando se encuentra el comando Segun en el source de Pseint.
{
    function set_sign($sign) // La función set_sign($sign) recibe el array con los signos.
    {
        // Creo un selector y le asigno las opciones que llegan del Segun de Pseint.
        echo '<label><select id="sign">
        <option value="">Selecciona una Opción</option>';
        for ($i = 0; $i < count($sign); $i++) // Hago un bucle al tamaño del array $sign.
        {
            echo '<option value="' . $sign[$i] .'">' . $sign[$i] . '</option>'; // Pongo en las opciones del selector los signos.
        }
        echo "</select> Selecciona una Operación</label>"; // Cierro el selector.
    }
}
?>