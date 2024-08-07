<?php
echo "¡A jugar poker!\n";
//  mazo de cartas
$mazo = array(
    'corazones ♥' => array('As', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'),
    'picas ♠ ' => array('As', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'),
    'diamantes ♦' => array('As', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'),
    'tréboles ♣' => array('As', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K')
);

//1.funcion
function repartirCartas($mazo) {
    $cartas = array();
    for ($i = 0; $i < 5; $i++) {
        $palo = array_rand($mazo);
        $valor = array_rand($mazo[$palo]);
        $cartas[] = $mazo[$palo][$valor] . ' de ' . $palo;
    }
    return $cartas;
}

// 2.funcion
function mostrarCartas($cartas) {
    foreach ($cartas as $carta) {
        echo $carta . "\n";
    }
}

// 2.funcion
function evaluarMano($cartas) {
    // Separamos los valores y palos de las cartas
    $valores = array();
    $palos = array();
    foreach ($cartas as $carta) {
        list($valor, $palo) = explode(' de ', $carta);
        $valores[] = $valor;
        $palos[] = $palo;
    }

    // Evaluando la mano
    $resultado = '';
    if (count(array_unique($palos)) == 1) {
        // Es una mano de mismo palo
        if (in_array('As', $valores) && in_array('K', $valores) && in_array('Q', $valores) && in_array('J', $valores) && in_array('10', $valores)) {
            $resultado = 'Escalera Real';
        } elseif (in_array('As', $valores) && in_array('2', $valores) && in_array('3', $valores) && in_array('4', $valores) && in_array('5', $valores)) {
            $resultado = 'Escalera de 5';
        } else {
            $resultado = 'Color';
        }
    } elseif (count(array_count_values($valores)) == 2) {
        // Es una mano con dos pares
        $resultado = 'Dos Pares';
    } elseif (count(array_count_values($valores)) == 3) {
        // Es una mano con un par
        $resultado = 'Par';
    } else {
        // Es una mano alta
        $resultado = 'Mano Alta';
    }

    echo "La mejor combinación que puedes hacer es:$resultado\n";
}

// Repartimos las cartas
$cartas = repartirCartas($mazo);

// Mostramos las cartas
echo "Tus cartas son:\n";
mostrarCartas($cartas);

// Evaluamos la mano
evaluarMano($cartas); 

while (true) {
    echo "1. Quieres volver a repartit cartas\n";
    echo "2. Salir\n";
    $opcion = readline("Ingrese una opción: ");
    
    switch ($opcion) {
      case 1:
        mostrarCartas($cartas);
        evaluarMano($cartas);
        break;
      case 2:
        echo "Saliendo...\n";
        echo "Exito al salir";
        exit;
        default: 
        echo "¡opcion invalida!";
        exit;
        break;
    }
  }






?>