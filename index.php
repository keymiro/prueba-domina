<?php
/*1. Dada un arreglo de números enteros, calcule una puntuación total según las siguientes reglas:
 Agregue 1 punto por cada número par en el arreglo.
 Suma 3 puntos por cada número impar en el arreglo.
 Agregue 5 puntos por cada vez que encuentre un 8 en el arreglo.
Ejemplos:
1. [1,2,3,4,5], respuesta = 11
2. [15,25,35], respuesta = 9
3. [8,8], respuesta = 10
*/

function totalScore(array $array)
{

    $data['par'] = 0;
    $data['impar'] = 0;
    $data['total_ochos'] = 0;

    foreach ($array as $arr) {

        $residuo = ($arr % 2);

        if ($residuo === 0) {
            //Es un número par
            $data['par'] += 1;
        }

        if ($residuo !== 0) {
            //Es un número impar
            $data['impar'] += 3;
        }

        if ($arr === 8) {
            //Es un número 8
            $data['total_ochos'] += 5;
        }
    }
    return $data;
}

$array1 = [1, 2, 3, 4, 5];
$array2 = [15, 25, 35];
$array3 = [8, 8];

echo '<hr> Ejercicio #1 <br>';

print_r(totalScore($array1));
echo 'array 1 <br>';
print_r(totalScore($array2));
echo 'array 2 <br>';
print_r(totalScore($array3));
echo 'array 3 <br>';


/*
2. En este ejercicio, estamos trabajando con un arreglo de 10 enteros, como sigue: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100]. 
0 es el primer índice y 9 es el último índice de la matriz.
Escribe una función que reciba dos números enteros como parámetros. La función devuelve la suma de los elementos de 
la matriz que se encuentran entre esos dos números enteros.
Por ejemplo, si usamos 30 y 60 como parámetros, la función debería devolver 180.
Algunos requisitos adicionales:
 Los dos enteros pasados a la función deben ser positivos; si no, la función debería devolver -1.
 Valide que el primer número entero sea menor que el segundo número entero. De lo contrario, la función debería devolver 0.
 Si el primer número entero está en la matriz y el segundo está por encima de 100, por ejemplo, 90 y 120, entonces 
la función debe devolver la suma de los números enteros que están dentro del arreglo y entre el rango dado. En este caso, eso sería 190.
 Si no se encuentran ambos enteros en la matriz, por ejemplo 110 y 120, la función debería devolver 0.
*/
function sum(int $numberOne, int $numberTwo)
{

    $array = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];
    $result = 0;

    foreach ($array as $arr) {

        if ($numberOne < 0 || $numberTwo < 0) {
            return -1;
        }

        if ($numberOne > $numberTwo) {
            return 0;
        }

        if ($numberOne <= $arr && $numberTwo >= $arr) {
            $result += $arr;
        }
    }

    return $result;
}
echo '<hr> Ejercicio #2 <br>';
echo sum(30, 60);

/*
3. Crear una función que toma como parámetro un string de hora y minutos “hh:mm”, y luego devuelve el ángulo menor
entre la mano de la hora y la mano del minuto. El formato de la hora y minutos debe ser con dos dígitos, “01:45”,
“10:30”, “02:25”, “00:00”, “12:30”, “12:05”, “12:12”, “12:27”. Y se puede asumir que la mano de la hora siempre
estará justo en una hora sin importar cuantos minutos han pasado. También, si el parámetro de la función no fue
puesto correctamente o si la hora y minuto no es numérico, la función debe tirar un error.
*/

function getAngle(string $hourMinutes)
{

    $array = explode(':', $hourMinutes);

    if (!isset($array[0]) || !isset($array[1])) {
        return "Formato ingresado es incorrecto. Debe ser tipo = hh:mm";
    }

    $hour = $array[0];
    $minute = $array[1];

    if (!is_numeric($hour) || !is_numeric($minute)) {
        return "Formato ingresado es incorrecto. Deben ser numéricos";
    }

    // se calcula el angulo menor entre las manecillas
    $hourAngle = (360 / 12) * $hour;
    $minuteAngle = (360 / 60) * $minute;

    $angle = abs($hourAngle - $minuteAngle);

    return min($angle, 360 - $angle);
}

echo '<hr> Ejercicio #3 <br>';
echo getAngle("01:45") . "<br>";
echo getAngle("10:30") . "<br>";
echo getAngle("02:25") . "<br>";
echo getAngle("00:00") . "<br>";
echo getAngle("12:30") . "<br>";
echo getAngle("12:05") . "<br>";
echo getAngle("12:12") . "<br>";
echo getAngle("12:27") . "<br>";


/*
5. El agricultor Rick tiene un jardín cuadrado de L metros de largo, dividido en una cuadrícula
con módulos cuadrados L2, cada uno de 1 metro de largo. Rick quiere cultivar N módulos
del jardín y sabe que la producción será mejor si el área cultivada recibe más agua. Utiliza
tecnología de riego por goteo, lo cual se realiza mediante mangueras instaladas a lo largo
del perímetro del área cultivada.
*/

echo '<hr> Ejercicio #5 <br>';
function maxPerimeter($L, $N)
{
    // se verifica si L y N son valores válidos
    if ($L <= 0 || $N < 0 || $N > $L * $L) {
        return "ERROR";
    }
    if ($N == 0) {
        return 0;
    }
    //se calcula el lado minimo del cuadrado que puede contener N unidades cuadradas
    $minSide = floor(sqrt($N));
    $rem = $N - $minSide * $minSide;
    //devuelve el perimetro del cuadrado con min_side como longitud de lado
    $result = ($minSide * 4) + ($rem == 0 ? 0 : ($rem > $minSide ? 4 : 2));

    return $result;
}
echo maxPerimeter(1, 0) . "<br>";
echo maxPerimeter(1, 1) . "<br>";
echo maxPerimeter(2, 3) . "<br>";
echo maxPerimeter(3, 8) . "<br>";
echo maxPerimeter(0, 0) . "<br>";


/*
4. Imagine una tabla infinita con filas y columnas numeradas con números naturales. La figura muestra
 un procedimiento para recorrer dicha tabla asignando un número natural consecutivo a cada tabla.
*/
echo '<hr> Ejercicio #4 <br>';
function getNumberAtPosition($rowSize, $colSize, $rowPos, $colPos)
{
    if ($rowPos >= $rowSize || $colPos >= $colSize) {
        return "La posición fila o columna es mayor al tamaño del arreglo.";
    }
    //calcula el resultado multiplicando la posición de la fila 
    //por (posición de la fila + 1) dividido entre 2, y sumando la posición de la columna
    $result = ($rowPos * ($rowPos + 1) / 2) + $colPos;
    return $result;
}

?>
<table>
    <?php
    for ($i = 0; $i < 8; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 8; $j++) {
            //Llama a la función getNumberAtPosition con las posiciones actuales de i y j
            $number = getNumberAtPosition(8, 8, $i, $j);
            //Imprime una celda con el número obtenido en la posición actual
            echo "<td>$number</td>";
        }
        echo "</tr>";
    }
    ?>
</table>