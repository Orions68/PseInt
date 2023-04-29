Algoritmo Hola
	Escribir "Ingresa el Primer Número; " Sin Saltar;
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
			Escribir "El resultado de la División es: ", num1 / num2;
	Fin Segun
FinAlgoritmo