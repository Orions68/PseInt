Algoritmo Calculadora
	Escribir "Ingresa el Primer Número: " Sin Saltar;
	Leer num1;
	Escribir "Ingresa el Segundo Número: " Sin Saltar;
	Leer num2;
	Escribir "Ingresa el tipo de operación: " Sin Saltar;
	Leer sign;
	Segun sign Hacer
		"+":
			Escribir "El resultado de la Suma es: ", num1 + num2;
		"-":
			Escribir "El resultado de la Resta es: ", num1 - num2;
		"*":
			Escribir "El resultado de la Multiplicación es: ", num1 * num2;
		"/":
        Si num2 = 0 Entonces
            Escribir "No se Puede Dividir por 0, Por Favor Ingresa Orto Segundo Número que no sea 0.";
            Leer num2;
        FinSi
			Escribir "El resultado de la División es: ", num1 / num2;
	Fin Segun
FinAlgoritmo