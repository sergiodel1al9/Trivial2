<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *
 * @author Sergio
 */
class DB {

    /**
     * Objeto que almacenará la base de datos PDO
     * @var type PDO Object
     */
    private $dwes;

    /**
     * Constructor de la clase DB
     * @throws Exception Si hay un error se lanza una excepción
     */
    public function __construct() {
        try {
            $serv = "localhost";
            $base = "trivial";
            $usu = "dwes";
            $pas = "abc123.";
            // Creamos un array de configuración para la conexion PDO a la base de 
            // datos
            $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            // Creamos la cadena de conexión con la base de datos
            $dsn = "mysql:host=$serv;dbname=$base";
            // Finalmente creamos el objeto PDO para la base de datos
            $this->dwes = new PDO($dsn, $usu, $pas, $opc);
            $this->dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * Método que nos permite realizar consultas a la base de datos
     * @param string $sql Sentencia sql a ejecutar
     * @return array Resultado de la consulta
     * @throws Exception Lanzamos una excepción si se produce un error
     */
    private function ejecutaConsulta($sql) {
        try {
            // Comprobamos si el objeto se ha creado correctamente
            if (isset($this->dwes)) {
                // De ser así, realizamos la consulta
                $resultado = $this->dwes->query($sql);
                // Devolvemos el resultado
                return $resultado;
            }
        } catch (Exception $ex) {
            // Si se produce un error, lanzamos una excepción
            throw $ex;
        }
    }

    /**
     * 
     * @param int $numero
     * @return string
     */
    public function obtienePregunta($numero) {
        $sql = "SELECT pregunta FROM preguntas WHERE numero =" . $numero . ";";

        $resultado = self::ejecutaConsulta($sql);

        $valor = '';

        if (isset($resultado)) {
            $row = $resultado->fetch();
            $valor = $row['pregunta'];
        }

        return $valor;
    }

    /**
     * 
     * @param int $numero
     * @return string
     */
    public function obtieneRespuesta1($numero) {
        $sql = "SELECT respuesta1 FROM preguntas WHERE numero =" . $numero . ";";
        $resultado = self::ejecutaConsulta($sql);

        $valor = '';

        if (isset($resultado)) {
            $row = $resultado->fetch();
            $valor = $row['respuesta1'];
        }

        return $valor;
    }

    /**
     * 
     * @param int $numero
     * @return string
     */
    public function obtieneRespuesta2($numero) {
        $sql = "SELECT respuesta2 FROM preguntas WHERE numero =" . $numero . ";";
        $resultado = self::ejecutaConsulta($sql);

        $valor = '';

        if (isset($resultado)) {
            $row = $resultado->fetch();
            $valor = $row['respuesta2'];
        }

        return $valor;
    }

    /**
     * 
     * @param int $numero
     * @return string
     */
    public function obtieneRespuesta3($numero) {
        $sql = "SELECT respuesta3 FROM preguntas WHERE numero =" . $numero . ";";

        $resultado = self::ejecutaConsulta($sql);

        $valor = '';

        if (isset($resultado)) {
            $row = $resultado->fetch();
            $valor = $row['respuesta3'];
        }

        return $valor;
    }

    /**
     * 
     * @param int $numero
     * @return string
     */
    public function obtieneRespuesta4($numero) {
        $sql = "SELECT respuesta4 FROM preguntas WHERE numero =" . $numero . ";";

        $resultado = self::ejecutaConsulta($sql);

        $valor = '';

        if (isset($resultado)) {
            $row = $resultado->fetch();
            $valor = $row['respuesta4'];
        }

        return $valor;
    }

    /**
     * 
     * @return int
     */
    public function listarNumeroPreguntas() {
        $sql = "SELECT count(numero) as Num_Preg FROM preguntas";
        $resultado = self::ejecutaConsulta($sql);

        if ($resultado) {
            $row = $resultado->fetch();

            return $row['Num_Preg'];
        }

        return 0;
    }
    
    /**
     * 
     * @param int $num
     * @param int $respuesta
     * @return boolean
     */
    public function verificarRespuesta($num, $respuesta) {

        $sql = "SELECT respuesta FROM preguntas WHERE numero =" . $num . ";";

        $resultado = self::ejecutaConsulta($sql);

        $valor = '';

        if (isset($resultado)) {
            $row = $resultado->fetch();
            $valor = $row['respuesta'];

            if (strval($respuesta) === strval($valor)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param string $pregunta
     * @param string $respuesta1
     * @param string $respuesta2
     * @param string $respuesta3
     * @param string $respuesta4
     * @param int $respuesta
     * @return int
     */
    public function altaPreguntas($pregunta, $respuesta1, $respuesta2, $respuesta3, $respuesta4, $respuesta) {
        $sql = "INSERT INTO preguntas";
        $sql .= " VALUES (0, '$pregunta', '$respuesta1', '$respuesta2', '$respuesta3', '$respuesta4', '$respuesta')";
        $resultado = self::ejecutaConsulta($sql);
        // Comprobamos el resultado
        if ($resultado) {
            // Si es correcto, devolvemos 0
            return 0;
        } else {
            return $this->dwes->errorInfo()[2];
        }
    }

}
