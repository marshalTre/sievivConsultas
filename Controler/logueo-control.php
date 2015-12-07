<?php
if(!isset($_SESSION)) { session_start(); }
require_once './login.php';
$obj=new login();
$obj->logueo();

