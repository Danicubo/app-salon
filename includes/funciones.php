<?php

function debug($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function esUltimo($actual, $proximo) : bool{
    if($actual !== $proximo){
        header('Location: /');
    }
}

//Funcion que revisa que el user esté autenticado

function isAuth() : void {
    if(!isset($_SESSION['login'])){
        header('Location: /');
    }
}

function isSessionStart(){
    if(!isset($_SESSION)) {
        { 
            session_start(); 
        }
    } 
}

function isAdmin() : void{
    if(isset($_SESSION['admin'])){
        header('Location: /');
    }
}