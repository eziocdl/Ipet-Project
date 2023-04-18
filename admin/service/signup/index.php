<?php
  
    require_once(dirname(__FILE__) . "/../../../config.php");
    // require_once(dirname(__FILE__) .  '/../../class/GlobalClass.php');

    $request = json_decode(file_get_contents("php://input"));
    $action = isset($request) ? $request->action : $_POST['action'];    

    switch ($action) {
        case 1:
            cadastrar($request->params);
            break;
        case 2:
            resetSenha($request->params);
            break;
        
        default:
            die('{"success":false,"elements":[],"message":"Not Found!"}');
            break;
    }


    function resetSenha($request){

        global $Globals;  

        $obj = array(
        "service" => "RESET_SENHA",
        "params" => $request
        );        

        $postdata = http_build_query($obj);    

        $ch = curl_init();       
        curl_setopt($ch, CURLOPT_URL, $Globals["APIPath"].'login/');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($ch);        
        $err = curl_error($ch);
        curl_close($ch);        
        echo $return;

    }


    function  cadastrar($request){

        global $Globals;  

        $obj = array(
        "service" => "CADASTRO_USER",
        "params" => $request
        );        

        $postdata = http_build_query($obj);    

        $ch = curl_init();       
        curl_setopt($ch, CURLOPT_URL, $Globals["APIPath"].'login/');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($ch);        
        $err = curl_error($ch);
        curl_close($ch);        
        echo $return;
        
    }

   