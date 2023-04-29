<?php
class Segun
{
    function set_sign($sign)
    {
        
        echo '<br><br><label><select id="sign">
        <option value="">Selecciona una Opción</option>';
        for ($i = 0; $i < count($sign); $i++)
        {
            echo '<option value="' . $sign[$i] .'">' . $sign[$i] . '</option>';
        }
        echo "</select> Selecciona una Operación</label>";
    }
}
?>