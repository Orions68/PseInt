function calculate()
{
    let input = document.getElementById("1");
    let input2 = document.getElementById("2");
    let select = document.getElementById("sign");
    let result = document.getElementById("3");
    

    result.value = "El Resultado Es: " + eval(input.value + select.value + input2.value);
    return false;
}