<?php
if(!isset($_SESSION)) { session_start(); }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conector
 *
 * @author Marshal
 */
class conector {

    public static function conex() {
        $user = 'postgres';
        $pass = '1213lima';
        $bd = 'sievif2';
        $port = '5432';
        $host = 'localhost';
        $strCon = "host=$host port=$port dbname=$bd user=$user password=$pass";
        $con = pg_connect($strCon) or die("Error de conexion " . pg_last_error());
        return $con;
    }
    
   
        
        
        
   

}


