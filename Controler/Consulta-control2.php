<?php
if(!isset($_SESSION)) { session_start(); }
require_once './consultas.php';

$objeto2=new consulta() ;
$objeto2->ConsultaRec();
