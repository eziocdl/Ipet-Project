<?php

    require_once(dirname(__FILE__).'../../../GlobalClass.php');
    require_once('Acesso.php');
  
    session_start();

    $globalClass = new GlobalClass();

    if( !isset($_SESSION['iduser']) &&  !isset($_SESSION['email']) ){

        $globalClass->AccessDenied();

    }