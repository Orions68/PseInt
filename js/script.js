function calculate() // Función calculate, la llama el botón Calcula el Resultado.
{
    let input = document.getElementById("1"); // Obtiene la id del input que tiene la primera variable
    let input2 = document.getElementById("2"); // Obtiene la id del input que tiene la segunda variable
    let select = document.getElementById("sign"); // Obtiene la id del selec que contiene las operaciones matemáticas.
    let result = document.getElementById("result"); // Obtiene la is del h3 que contendrá el resultado.
    
    if (input2.value == 0 && select.value == "/")
    {
        result.innerHTML = "El Segundo Número no Puede Ser 0, Por Favor Cambia de Operación o Cambia el Número.";
    }
    else
    {
        result.innerHTML = "El Resultado Es: " + eval(input.value + select.value + input2.value); // Muestra el resutlado en el h3 mediante la función eval que transforma todos los parámetro en objetos, así el valor que hay en el primer input es un número, el valor que hay en el segundo input es otro número y el contenido del select es un caracter que si es el * multiplica los dos números de los inputs, si es el caracter + los suma, el - los resta y el / los divide.
    }
}