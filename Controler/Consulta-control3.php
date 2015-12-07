<?php
if(!isset($_SESSION)) { session_start(); }
require_once './consultas.php';

$objeto3=new consulta() ;
$objeto3->ConsultaPer();

