<?php
// src/Services/Greeting
namespace App\Services;

class Greeting  {
    
    public function greet($name) {
        
        if ($name === 'María') {
            $result = '¿Qué tal María?';
        } else {
            $result = '¡Hola '.$name.'!';
        }
        
        return $result;
    }
}