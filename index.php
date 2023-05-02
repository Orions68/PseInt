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
$ok = true;
$handle = fopen("Hola.psc", "r"); // Prepara el archivo Hola.psc(source de Pseint) para leerlo.
if ($handle) // Si el archivo existe.
{
    $command = []; // Creo el array $command que contendrá los comandos de Pseint(Escribir, Leer, Segun, etc.).
    $data = []; // Creo el array $data que contendrá los datos, después de los comandos de Pseint(Nombres de Variables, Texto a Mostrar, Operaciones, etc.).
    $counter = 0; // Creo $counter para contar la cantidad de comandos de Pseint.
    while (($line = fgets($handle)) !== false) // Mientras Lea Líneas del Archivo.
    {
        $data[$counter] = []; // Hago a $data un array bidimensional.
        $command[$counter] = strtok($line, " "); // Obtengo la primera palabra antes del espacio( ) en el array $command[$counter] de la primera línea que leo del archivo de Pseint.
        $command[$counter] =  trim($command[$counter], "\t"); // Hago un trim de las tabulaciones.
        // $command[$counter] = preg_replace('/(\s\s+|\t|\n)/', '', $command[$counter]); // Reemplaza todos los caracteres espacio, tab, salto de linea por '' en la cadena.

        if ($command[$counter] == "Escribir") // Verifico si el comando es Escribir.
        {
            $data[$counter] = explode('"', $line); // Si es así esploto en el array data[$counter] la misma linea separando la cadena por las comillas(") y obtengo el texto a mostrar en patalla.
        }
        else // Si no es Escribir
        {
            $data[$counter] = explode(" ", $line); // Exploto la misma linea por el espacio( ) en el array $data.
            if (count($data[$counter]) == 2) // Si el tamaño de $data[$counter] es 2 me encontré con Leer.
            {
                $data[$counter][1] = trim($data[$counter][1], ";\r\n"); // Entonces hago un trim al contenido de $data[$counter][1] que es el nombre de la variable a ingresar.
            }
            if (count($data[$counter]) == 3 || count($data[$counter]) == 5) // Si el tamaño de $data[$counter] es 3 ó 5, me encontré con Segun o un Si.
            {
                $data[$counter][0] = trim($data[$counter][0], "\t"); // Hago un trim de tabulación al contenido de $data[$counter][0] que es el nombre del comando, Segun o Si en este caso.
            }
        }
        $counter++; // Incremento $counter.
    }
    fclose($handle); // Al Terminar de Leer el Archivo, Cierra la Lectura del Archivo.

    for ($i = 0; $i < count($command); $i++) // Hago un bucle al tamaño del array $command.
    {
        switch ($command[$i]) // Hago el switch al comando que está en $command.
        {
            case "Algoritmo":
                echo "<h1>Bienvenido a la Aplicación: " . $data[$i][1] . "</h1>";
                break;
            case "Escribir": // Si el comando es Escribir.
                $write = new Escribir(); // Asigno a $write una nueva instancia de la clase Escribir.
                $write->set_text($data[$i][1]); // Y envío el texto a escribir en pantalla en un h3 a la clase, a través de la función set_text()).
                break; // Sale del switch.
            case "Leer": // Si el comando es Leer.
                $read = new Leer(); // Asigno a $read una nueva instancia de la clase Leer.
                $read->set_input($data[$i][1]); // Llamo a la función set_input($name) para poner los input en la pantalla, le paso el nombre de la variable.
                break; // Sale del switch.
            case "Segun": // Si el comando es Segun.
                $j = $i; // Igualo $j a $i.
                $z = 0; // Asigno 0 a $z;
                $sign = []; // Creo el arrat $sign.
                while ($z < 4) // Mientras $z sea menor que 4.
                {
                    $j++; // Incremento $j, para acceder a la primera opción del Segun.
                    $data[$j] = explode('"', $data[$j][0]); // Exploto en $data[$j] el contenido de $data[$j][0] por las comillas("), contiene las operaciones matemáticas.
                    $sign[$z] = $data[$j][1]; // Asigo a $sign[$z] el contenido del array $data[$j][1], los signos(+, -, *, /).
                    $j++; // Incremento $j, paso a la siguiente línea que es el Escribir, al incrementar $j otra vez en la linea 66 pasa a la segunda opción de Segun y así sucesivamente.
                    $z++; // Incremento $z, hasta que llegue a 4.
                }
                $switch = new Segun(); // Una vez cargado todo el contenido del Segun, Creo una nueva instancia de la clase Segun.
                $switch->set_sign($sign); // Llamo a la función set_sign($sign) y le paso el array $sign.
                $i = $j - 1; // Igualo $i a $j - 1, para continuar a partir de después de la última opción(/) del bloque Segun.
                break; // Sale del switch.
            case "Hacer": // Proximamente.
                    break;
            case "De": // Proximamente.
                break;
            case "Otro": // Proximamente.
                break;
            case "Modo": // Proximamente.
                break;
            case "Fin": // Proximamente.
                break;
            case "Si": // Cuando Encuentra el Si, sale del bucle for.
                $i = count($command);
                break;
            case "FinAlgoritmo": // Si encuentro el comando FinAlgoritmo.
                $i = count($command); // Igualo $i al total del array $command.
                break; // Sale del bucle for.
            default:
                echo "Ese Comando Aun No Está Implementado.";
                echo $command[$i];
        }
    }
    echo '<br><br><input type="button" value="Calcula el Resultado" onclick="calculate()">
        <br><br>
        <h3 id="result"></h3>'; // Al salir pone el botón que llama a la función de javascript calculate() y escribe el resultado en el h3 con id result.
}
?>
</body>
</html>