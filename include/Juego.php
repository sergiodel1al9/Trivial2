<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Juego
 *
 * @author Sergio
 */
class Juego {

    private $preguntas;

    public function __construct() {
        $this->preguntas = array();
    }

    public function getPreguntas() {
        return $this->preguntas;
    }

    public function getNumeroPreguntas() {
        return count($this->preguntas);
    }

    public function getNumeroAciertos() {
        $contador = 0;

        for ($index = 0; $index < count($this->preguntas); $index++) {
            if ($this->preguntas[$index] === TRUE) {
                $contador++;
            }
        }

        return $contador;
    }

    public function getNumeroErrores() {
        $contador = 0;

        for ($index = 0; $index < count($this->preguntas); $index++) {
            if ($this->preguntas[$index] === FALSE) {
                $contador++;
            }
        }

        return $contador;
    }

    public function acierto() {
        $this->preguntas[] = TRUE;
    }

    public function fallo() {
        $this->preguntas[] = FALSE;
    }

    public function guarda_juego() {
        session_start();

        $_SESSION['juego'] = $this->preguntas;
    }

    public static function carga_juego() {
        if (isset($_SESSION['juego'])) {
            $this->preguntas = $_SESSION['juego'];
        }
    }

}