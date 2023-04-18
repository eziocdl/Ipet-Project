<?php

    set_error_handler(function(int $number, string $message) {
        echo "Handler captured error $number: '$message'" . PHP_EOL  ;
    });
  
    require_once(dirname(__FILE__) . "/../../../config.php");
    require_once(dirname(__FILE__) ."../../../class/Acesso.php");
    // require_once(dirname(__FILE__) .  '/../../class/GlobalClass.php');

    $request = json_decode(file_get_contents("php://input"));
    $action = isset($request) ? $request->action : $_POST['action'];    

    switch ($action) {
        case 1:
            login($request->params);
            break;
        case 2:
            redefinirSenha($request->params);
            break;
        
        default:
            die('{"success":false,"elements":[],"message":"Not Found!"}');
            break;
    }

    function redefinirSenha($request){
        global $Globals; 
       
        $obj = array(
        "service" => "FORGOT",
        "params" => json_decode('{"email":"'.$request.'"}')
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

        echo  $return;
        
    }


    function  login($request){        

        global $Globals;  

        $obj = array(
        "service" => "LOGIN",
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
        
        $result = json_decode($return);

        if($result->success){
            	
            $acesso =  new Acesso();

            $id = $result->elements[0]->iduser;
            $name = $result->elements[0]->nome;
            $email = $result->elements[0]->email;            
            $acesso->setSession($id, $name, $email);

            die('{"success":true,"elements":[],"message":"Logado!"}');

        }else{
            echo  $return;
        }
    }

   