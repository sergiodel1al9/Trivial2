<!DOCTYPE html>
<?php
include_once './include/DB.php';
include_once './include/Juego.php';

session_start();

$cliente = new DB();
$textoPregunta = "";
$textoRespuesta1 = "";
$textoRespuesta2 = "";
$textoRespuesta3 = "";
$textoRespuesta4 = "";

$preguntasRealizadas = array();

// Comprobamos que tenemos el array de preguntas realizadas en sesión
if (isset($_SESSION['preguntasRealizadas'])) {

    // Si es así, almacenamos su valor en la variable correspondiente
    $preguntasRealizadas = $_SESSION['preguntasRealizadas'];
} else {

    // Si no, inicializamos el array
    $preguntasRealizadas = array();
}

// Comprobamos si tenemos información de una pregunta en sesión
if (isset($_SESSION['pregunta'])) {

    // Si es así, almacenamos su valor en la variable correspondiente
    $pregunta = $_SESSION['pregunta'];
} else {

    // Si no es así, inicializamos la variable a null
    $pregunta = NULL;
}

echo $cliente->obtienePregunta(1);
echo '<br>';
echo $cliente->obtieneRespuesta1(1);
echo '<br>';
echo $cliente->obtieneRespuesta2(1);
echo '<br>';
echo $cliente->obtieneRespuesta3(1);
echo '<br>';
echo $cliente->obtieneRespuesta4(1);


if($cliente->verificarRespuesta(1, 2))
{
    echo "Acierto";
}
else
{
    echo "Error";
}

// Comprobamos si se ha pulsado el botón de nueva pregunta
if (isset($_POST['nuevaPregunta'])) {

    // Si es así, recuperamos el numero de preguntas que tenemos
    $cantidadPreguntas = $cliente->listarNumeroPreguntas();

    // Comprobamos cuantas preguntas tenemos realizadas y si su número es 
    // menor que la cantidad de preguntas que tenemos
    if (count($preguntasRealizadas) < intval($cantidadPreguntas)) {

        // Si es así, generamos un número aleatorio entre 1 y el número de preguntas disponibles
        // Si la pregunta que corresponde con el número ya ha sido contestada se generará uno nuevo
        do {
            $numeroPregunta = mt_rand(1, $cantidadPreguntas);
        } while (in_array($numeroPregunta, $preguntasRealizadas));

        // Almacenamos en número de la pregunta en el array de preguntas realizadas
        $preguntasRealizadas[] = $numeroPregunta;

        // Almacenamos el array de preguntas realizadas en sesión
        $_SESSION['preguntasRealizadas'] = $preguntasRealizadas;

        // Recuperamos la información de la pregunta correspondiente al número 
        // y transformamos la información en un objeto Pregunta
        $pregunta = $cliente->obtienePregunta(mt_rand(1, $cantidadPreguntas));

        // Almacenamos el objeto Pregunta en sesión
        $_SESSION['pregunta'] = $pregunta;

        // Volvamos la información del objeto Pregunta a las variables necesarias 
        // para mostrar la información
        $textoPregunta = $pregunta;
        $textoRespuesta1 = $cliente->obtieneRespuesta1($pregunta);
        $textoRespuesta2 = $cliente->obtieneRespuesta2($pregunta);
        $textoRespuesta3 = $cliente->obtieneRespuesta3($pregunta);
        $textoRespuesta4 = $cliente->obtieneRespuesta4($pregunta);

        
    } else {

        // En caso de que no queden preguntas, se ha terminado el juego y se muestra un mensaje con la puntuación
        $textoPregunta = "No quedan preguntas.";
        $textoRespuesta1 = "";
        $textoRespuesta2 = "";
        $textoRespuesta3 = "";
        $textoRespuesta4 = "";
        
    }

    // Limpiamos los valores de los resultados
    $resultado1 = "";
    $resultado2 = "";
    $resultado3 = "";
    $resultado4 = "";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <form id="formPreguntas" action="index.php" method="POST">
                <input form="formPreguntas" type="submit" name="nuevaPregunta" id="nuevaPregunta" value="Nueva Pregunta" />
            </form>            
        </div>
        <div>
            <?php
            echo '<label>'. $textoPregunta . '</label>';
            echo '<label>'. $textoRespuesta1 . '</label>';
            echo '<label>'. $textoRespuesta2 . '</label>';
            echo '<label>'. $textoRespuesta3 . '</label>';
            echo '<label>'. $textoRespuesta4 . '</label>';
            ?>
        </div>
    </body>
</html>
