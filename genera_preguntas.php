<!DOCTYPE html>

<?php
require_once './include/DB.php';
require_once './include/Juego.php';

$cliente = new DB();

$pregunta = "";
$respuesta1 = "";
$respuesta2 = "";
$respuesta3 = "";
$respuesta4 = "";
$respuestaCorrecta = "";
$numero = "";
$mensaje = "";

// Comprobamos si ya se ha pulsado el botón de Añadir
if (isset($_POST['añadir'])) {

    // Verificamos que se hayan introducido nombre y apellidos
    if (empty($_POST['pregunta']) || empty($_POST['respuesta1']) || empty($_POST['respuesta2']) || empty($_POST['respuesta3']) || empty($_POST['respuesta4']) || empty($_POST['respuestaCorrecta'])) {
        $mensaje = "No se han introducido los datos";
    } else {



        // Realizamos el alta del artista usando el servicio y comprobamos el exito de la acción
        if ($cliente->altaPreguntas($_POST['pregunta'], $_POST['respuesta1'], $_POST['respuesta2'], $_POST['respuesta3'], $_POST['respuesta4'], $_POST['respuestaCorrecta']));
        {

            // Si es correcto, mostraremos un mensaje
            $mensaje = "correcto";
        }
    }


    
}


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action='genera_preguntas.php' method='post'>


            <input type="text" name="pregunta" placeholder="Pregunta" id="pregunta" value="<?php echo $pregunta ?>">

            <input type="text" name="respuesta1" placeholder="Respuesta 1" id="respuesta1" value="<?php echo $respuesta1 ?>"></input>

            <input type="text" name="respuesta2" placeholder="Respuesta 2" id="respuesta2" value="<?php echo $respuesta2 ?>"></input>

            <input type="text" name="respuesta3" placeholder="Respuesta 3" id="respuesta3" value="<?php echo $respuesta3 ?>"></input>

            <input type="text" name="respuesta4" placeholder="Respuesta 4" id="respuesta4" value="<?php echo $respuesta4 ?>"></input>

            <input type="text" name="respuestaCorrecta" placeholder="Respuesta correcta" id="respuestaCorrecta" value="<?php echo $respuestaCorrecta ?>"></input>

            <input type='submit' name='añadir' value='Añadir'/>

            

        </form>

        <div>
            <?php
            echo $mensaje;
            echo '<br>';
            ?>
        </div>
        
    </body>
</html>



