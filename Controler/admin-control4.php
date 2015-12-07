<?php
if(!isset($_SESSION)) { session_start(); }
require_once './admin-consultas.php';

$objeto=new consultaAdmin();
$objeto->eliminaFicha();


