<?php
if(!isset($_SESSION)) { session_start(); }
require_once './admin-modificar.php';

$objeto=new modificar();
$objeto->modificarIO();
