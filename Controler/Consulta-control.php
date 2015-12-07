<?php
if(!isset($_SESSION)) { session_start(); }
require_once './consultas.php';

$objeto=new consulta();
$objeto->ConsultaGen();



