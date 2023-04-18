<?php

require_once(dirname(__FILE__) . "/../../../config.php");
require_once(dirname(__FILE__) . "/../../../GlobalClass.php");
// require_once(dirname(__FILE__) ."../../../class/Acesso.php");
// require_once(dirname(__FILE__) ."../../../class/secure.php");
// require_once(dirname(__FILE__) .  '/../../class/GlobalClass.php');




$request = json_decode(file_get_contents("php://input"));
$action = isset($request) ? $request->action : $_POST['action'];    

switch ($action) {
    case 1:
        listarPets($request->params);
        break;    
    case 2:
        enviar($request->params);
        break;    
    default:
        die('{"success":false,"elements":[],"message":"Not Found!"}');
        break;
}

function enviar($request){    

    session_start();
    global $Globals; 
       
    $obj = array(
        "service" => "ENCONTREI",
        "params" => $request
    );        

    $postdata = http_build_query($obj);    

    $ch = curl_init();       
    curl_setopt($ch, CURLOPT_URL, $Globals["APIPath"].'principal/');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $return = curl_exec($ch);        
    $err = curl_error($ch);
    curl_close($ch); 

    echo  $return;

}


function listarPets($request){  

    session_start();
    global $Globals; 


    $params = json_decode('
        {
            "perdido": "'.$request->perdido.'"
        }
    ');
       
    $obj = array(
        "service" => "LISTAR_PETS_SITE",
        "params" => $params
    );    

    $postdata = http_build_query($obj);    

    $ch = curl_init();       
    curl_setopt($ch, CURLOPT_URL, $Globals["APIPath"].'principal/');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $return = curl_exec($ch);        
    $err = curl_error($ch);
    curl_close($ch); 

    echo  $return;


}

