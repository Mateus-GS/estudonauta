<?php
session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user'] ="gustavo";
    $_SESSION['nome'] ="Gustavo Ganabara";
    $_SESSION['tipo'] ="";  
}
