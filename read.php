<?php
class Leer
{
    function set_var()
    {
        if (empty($_SESSION["already"]))
        {
            $_SESSION["already"] = 1;
            echo '<input id="' . $_SESSION["already"] . '" type="text">';
        }
        else
        {
            $_SESSION["already"]++;
            echo '<input id="' . $_SESSION["already"] . '" type="text">';
        }
    }
}
?>