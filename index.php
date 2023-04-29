<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Convertidor de Pseudo Código a HTML, PHP, y JavaScript</title>
    <script src="js/script.js"></script>
</head>
<body>
<?php
include "write.php"; // Incluye la clase Write, cuando encuentra un Escribir en Pseint.
include "read.php"; // Incluye la clase Read, cuando encuentra un Leer en Pseint.
include "switch.php"; // Incluye la clase Switch, cuando encuentra un Segun en Pseint.
$handle = fopen("Hola.psc", "r"); // Prepara el archivo Hola.psc(source de Pseint) para leerlo.
if ($handle) // Si el archivo existe.
{
    $command = []; // Creo el array $command que contendrá los comandos de Pseint(Escribir, Leer, Segun, etc.).
    $data = []; // Creo el array $data que contendrá los datos, después de los comandos de Pseint(Nombres de Variables, Texto a Mostrar, Operaciones, etc.).
    $counter = 0; // Creo $counter para contar la cantidad de comandos de Pseint.
    while (($line = fgets($handle)) !== false) // Mientras Lea Líneas del Archivo.
    {
        $command[$counter] = []; // Hago a $command un array bidimensional.
        $data[$counter] = []; // Hago a $data un array bidimensional.
        $command[$counter] = explode(" ", $line);
        $command[$counter][0] =  trim($command[$counter][0], "\t");
        if ($command[$counter][0] == "Escribir")
        {
            $data[$counter] = explode('"', $line);
        }
        else
        {
            $data[$counter] = explode(" ", $line);
            if (count($data[$counter]) > 1)
            {
                $data[$counter][1] = trim($data[$counter][1], ";\r\n");
            }
            if (count($data[$counter]) > 2)
            {
                $data[$counter][0] = trim($data[$counter][0], "\t");
            }
        }
        $counter++;
    }
    fclose($handle); // Al Terminar de Leer el Archivo, Cierra la Lectura del Archivo.

    for ($i = 1; $i < count($command); $i++)
    {
        switch ($command[$i][0])
        {
            case "Escribir":
                if ($i > 1 && count($data[$i - 2]) > 2 && $data[$i - 2][0] == "Segun")
                {
                    $data[$i - 1] = explode('"', $data[$i - 1][0]);
                    $sign[$j] = $data[$i - 1][1];
                    $j++;
                    $command[$i + 1][0] = "Segun";
                    break;
                }
                else
                {
                    $write = new Escribir();
                    $write->set_text($data[$i][1]);
                }
                break;
            case "Leer":
                $read = new Leer();
                $read->set_var($data[$i][1]);
                break;
            case "Segun":
                $j = $i;
                $z = 0;
                $sign = [];
                while ($z < 4)
                {
                    $j++;
                    $data[$j] = explode('"', $data[$j][0]);
                    $sign[$z] = $data[$j][1];
                    $j++;
                    $z++;
                }
                $switch = new Segun();
                $switch->set_sign($sign);
                $i = $j;
                break;
            case "Hacer":
                    break;
            case "De":
                break;
            case "Otro":
                break;
            case "Modo":
                break;
            case "Fin":
                break;
            case "Segun":
                break;
            case "FinAlgoritmo":
                break;
            default:
                echo "Ese Comando Aun No Está Implementado.";
                echo $command[$i][0];
        }
    }
    echo '<br><br><input type="button" value="Calcula el Resultado" onclick="calculate()">
    <br><br>
    <h3 id="result"></h3>';
}
?>
</body>
</html>