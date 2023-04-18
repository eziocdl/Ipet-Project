<?php


// $request = json_decode(file_get_contents("php://input"));
// echo 'aqui';

// var_dump($_GET);
// var_dump($_POST);
// var_dump($request);
// exit;
// exit;

require_once(dirname(__FILE__) . "/../../../config.php");
require_once(dirname(__FILE__) . "/../../../GlobalClass.php");
require_once(dirname(__FILE__) ."../../../class/Acesso.php");
require_once(dirname(__FILE__) ."../../../class/secure.php");
// require_once(dirname(__FILE__) .  '/../../class/GlobalClass.php');

$request = json_decode(file_get_contents("php://input"));
$action = isset($request) ? $request->action : $_POST['action'];    


switch ($action) {
    case 1:
        listarPets($request->params);
        break;
    case 2:
        cadastrarPet();
        break;
    case 3:
        cadastrarStatusPerdido($request->params);
        break;
    case 4:
        cadastrarStatusEncontrado($request->params);
        break;
    case 5:
        funcListaUsuariosResposta($request->params);
        break;
    case 6:
        carregarMensagens($request->params);
        break;
    case 7:
        enviarMensagem($request->params);
        break;
    case 8:
        funcListaPetsInteracao($request->params);
        break;
    case 9:
        funcListaMensagensRespostaInteracao($request->params);
        break;
    case 10:
        enviarMensagemInteracao($request->params);
        break;
    
    default:
        die('{"success":false,"elements":[],"message":"Not Found!"}');
        break;
}

function enviarMensagemInteracao($request){
    session_start();
    global $Globals; 
       
    $obj = array(
        "service" => "RESPONDER_INTERACAO",
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

function funcListaMensagensRespostaInteracao($request){

    session_start();
    global $Globals;

    $params = json_decode('
        {
            "id_user_perdeu":"'.$request->id_user_perdeu.'", 
            "id_pet_perdido":"'.$request->id_pet_perdido.'",            
            "id_user_encontrou":"'.$_SESSION['iduser'].'"            
        }
    '); 

    $obj = array(
        "service" => "CARREGAR_MENSAGENS_PET_INTERACAO",
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



function funcListaPetsInteracao($request){
    
    session_start();
    global $Globals;

    $params = json_decode('
        {
            "id_user":"'.$_SESSION['iduser'].'"             
        }
    '); 

    $obj = array(
        "service" => "LISTA_PETS_INTERACAO",
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

function enviarMensagem($request){
    session_start();
    global $Globals; 
       
    $obj = array(
        "service" => "RESPONDER",
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

function carregarMensagens($request){

  

    session_start();
    global $Globals;

    $params = json_decode('
        {
            "id_user_perdeu":"'.$_SESSION['iduser'].'", 
            "id_pet_perdido":"'.$request->id_pet_perdido.'",            
            "id_user_encontrou":"'.$request->id_user_encontrou.'"            
        }
    '); 

    $obj = array(
        "service" => "CARREGARMENSAGENS",
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

function funcListaUsuariosResposta($request){


    session_start();
    global $Globals;

    $params = json_decode('
        {
            "iduser":"'.$_SESSION['iduser'].'", 
            "idpets":"'.$request->idpets.'"            
        }
    ');

    $obj = array(
        "service" => "LISTA_USUARIOS_RESPOSTA",
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

function cadastrarStatusEncontrado($request){

    session_start();
    global $Globals;

    $params = json_decode('
        {
            "iduser":"'.$_SESSION['iduser'].'", 
            "idpet": "'.$request->idpet.'"
        }
    ');

    $obj = array(
        "service" => "ENCONTRADO_PET",
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


function cadastrarStatusPerdido($request){

    session_start();

    global $Globals;

    $params = json_decode('
        {
            "iduser":"'.$_SESSION['iduser'].'", 
            "idpet": "'.$request->idpet.'",
            "cep": "'.$request->cep.'",           
            "data": "'.$request->data.'",           
            "cidade": "'.$request->cidade.'",           
            "bairro": "'.$request->bairro.'"           
        }
    ');

    $obj = array(
        "service" => "ENCONTRAR_PET",
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



function listarPets($request){  

    session_start();
    global $Globals; 


    $params = json_decode('
        {
            "perdido": "'.$request->perdido.'",
            "iduser":"'.$_SESSION['iduser'].'" 
        }
    ');
       
    $obj = array(
        "service" => "LISTAR_PETS",
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



function cadastrarPet(){

    session_start();
    $dados = $_POST['params'];   

    global $Globals; 

    $idpets = $dados['idpets'];
    $iduser = $dados['iduser'];

    if(isset($idpets) && !empty($idpets)){

        $procedure = "ALTERAR_PET";

        $params = json_decode('
            {
                "iduser" : "'.$iduser.'",
                "idpets" : "'.$idpets.'",
                "nome" : "'.$dados['nome'].'" ,
                "idade" : "'.$dados['idade'].'",
                "especie" : "'.$dados['especie'].'",
                "raca" : "'.$dados['raca'].'",
                "sexo" : "'.$dados['sexo'].'",          
                "predominante" : "'.$dados['predominante'].'"          
            }
        ');

    }else{  

        $procedure = "CADASTRO_PET";

        $params = json_decode('
            {
                "iduser" : "'.$_SESSION['iduser'].'",
                "nome" : "'.$dados['nome'].'" ,
                "idade" : "'.$dados['idade'].'",
                "especie" : "'.$dados['especie'].'",
                "raca" : "'.$dados['raca'].'",
                "sexo" : "'.$dados['sexo'].'",          
                "predominante" : "'.$dados['predominante'].'"          
            }
        ');
    }
       
    $obj = array(
        "service" => $procedure,
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

    $result = json_decode($return);
    
   
    if($result->success){

        $global_class = new GlobalClass();

        $idPets = $result->elements->idpets;
        $iduser = $_SESSION['iduser'];
        $file = $_FILES['file'];


        $result = $global_class->createFilePet($file,$iduser, $idPets);
        
        if($result == 1){
            die('{"success":true,"elements":[],"message":"Solicitação atendida!"}');
        }else{               
            if($procedure == "ALTERAR_PET"){
                if(isset($file)){
                    die('{"success":true,"elements":[],"message":"Pet alterado mas não foi possível inserir imagem! "}');
                }else{
                    die('{"success":true,"elements":[],"message":"Solicitação atendida!"}');
                }
            }else{
                die('{"success":true,"elements":[],"message":"Pet cadastrado mas não foi possível inserir imagem! "}');
            } 
        }
    }else{
        echo  $return;
    }

}


