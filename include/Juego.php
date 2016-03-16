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
    private $numero;
    private $pregunta;
    private $respuesta1;
    private $respuesta2;
    private $respuesta3;
    private $respuesta4;
    private $respuestaCorrecta;
    private $preguntas = array();

    function __construct($numero, $pregunta, $respuesta1, $respuesta2, $respuesta3, $respuesta4, $respuestaCorrecta, $preguntas) {
        $this->numero = $numero;
        $this->pregunta = $pregunta;
        $this->respuesta1 = $respuesta1;
        $this->respuesta2 = $respuesta2;
        $this->respuesta3 = $respuesta3;
        $this->respuesta4 = $respuesta4;
        $this->respuestaCorrecta = $respuestaCorrecta;
        $this->preguntas = $preguntas;
    }
    
    function getNumero() {
        return $this->numero;
    }

    function getPregunta() {
        return $this->pregunta;
    }

    function getRespuesta1() {
        return $this->respuesta1;
    }

    function getRespuesta2() {
        return $this->respuesta2;
    }

    function getRespuesta3() {
        return $this->respuesta3;
    }

    function getRespuesta4() {
        return $this->respuesta4;
    }

    function getRespuestaCorrecta() {
        return $this->respuestaCorrecta;
    }

    function getPreguntas() {
        return $this->preguntas;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setPregunta($pregunta) {
        $this->pregunta = $pregunta;
    }

    function setRespuesta1($respuesta1) {
        $this->respuesta1 = $respuesta1;
    }

    function setRespuesta2($respuesta2) {
        $this->respuesta2 = $respuesta2;
    }

    function setRespuesta3($respuesta3) {
        $this->respuesta3 = $respuesta3;
    }

    function setRespuesta4($respuesta4) {
        $this->respuesta4 = $respuesta4;
    }

    function setRespuestaCorrecta($respuestaCorrecta) {
        $this->respuestaCorrecta = $respuestaCorrecta;
    }

    function setPreguntas($preguntas) {
        $this->preguntas = $preguntas;
    }

    
    
    public function acierto(){
        
        
        
    }
    
    public function fallo() {
        
    }
    
    public function guarda_juego(){
        
    }
    
    public function carga_juego() {
        
    }
    
    public function mostrarPregunta() {
        $salida = "";

        $salida .= $this->pregunta;
        $salida .= " ";
        

        

        return $salida;
    }

}
