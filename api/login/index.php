<?php

set_error_handler(function(int $number, string $message) {
    echo "Handler captured error $number: '$message'" . PHP_EOL  ;
});
error_reporting(E_ALL);

require_once('../../config.php');
require_once('../../GlobalClass.php');
require_once('../../db.php');

$service = $_POST['service'];
$params = $_POST['params'];
$params = json_encode($params);
$params = json_decode($params, false); 

switch ($service) {
    case 'CADASTRO_USER':
        cadastrarUser($params);
        break;
    case 'LOGIN':
        login($params);
        break;
    case 'FORGOT':
        forgot($params);
        break;
    case 'RESET_SENHA':
        resetSenha($params);
        break;
    
    default:
        die('{"success":false,"elements":[],"message":"API não encontrada"}');
        break;
}


function resetSenha($params){

    $global_class = new GlobalClass();
   
    $email = $global_class->anti_injection($params->email);
    $key = $global_class->anti_injection($params->key);   
    $password = $global_class->anti_injection($params->password);
    $password_conf = $global_class->anti_injection($params->password_conf);           
    

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('{"success":false,"elements":[],"message":"E-mail inválido!"}');
    }

    if(empty($password) || $password !==  $password_conf ){
        die('{"success":false,"elements":[],"message":"Senhas diferentes!"}');
    }  

    $pass = sha1($email.$password);

    $rows = array();
    $pdo = new PDOConnection();
   
    $result = $pdo->run("call TB_UP_USERS_RESET_SENHA(?,?,?)", array(
        $email,
        $key,
        $pass
    ));

    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    if(isset($res[0][1])){
        die('{"success":true,"elements":[],"message":"Senha alterada!"}');
    }else{
        die('{"success":false,"elements":[],"message":"Usuário não existe ou o token já foi usado!"}');
    }

}


function forgot($params){
   
    global $Globals;       
   
    $global_class = new GlobalClass();

    $email = $global_class->anti_injection($params->email);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('{"success":false,"elements":[],"message":"E-mail inválido!"}');
    }

    $pdo = new PDOConnection();       
   
    $result = $pdo->run("call FORGOT(?)", array(      
        $email
    ));   

    $res = $result->fetchAll(PDO::FETCH_ASSOC);
   
    if(isset($res[0]['chave'])){  
             
        require_once('../../email/index.php'); 

        $email = new SendEmail();

        $email_cliente = $res[0]['email'];
        $nome = $res[0]['nome'];
        $pathAdmin = $Globals['AdminFull'];
        $key = $res[0]['chave'];
        $subject = "E-mail de redefinição de senha";
        
        require('../../email/templates/template_forgot.php');

        $result =  $email->send($html,$email_cliente, $nome,$subject);

        if($result == 1){
            die('{"success":true,"elements":[],"message":"E-mail enviado!"}');
        }else{
            die('{"success":false,"elements":[],"message":"Não foi possível enviar e-mail!"}');
        }
    }else{
        die('{"success":false,"elements":[],"message":"Usuário não existe ou inválido"}');
    }
}


function login($params){

    $global_class = new GlobalClass();
    
    $email = $global_class->anti_injection($params->email);
    $password = $global_class->anti_injection($params->password);       

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('{"success":false,"elements":[],"message":"E-mail inválido!"}');
    }

    if(empty($password)){
        die('{"success":false,"elements":[],"message":"Senhas inválida!"}');
    }  

    $pass = sha1($email.$password);

    $rows = array();

    $pdo = new PDOConnection();
   
    $result = $pdo->run("call LOGIN(?,?)", array(      
        $email,
        $pass
    ));

    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    if(count($res)){
        die('{"success":true,"elements":'.json_encode($res).',"message":"Válido!"}');
    }else{
        die('{"success":false,"elements":[],"message":"Usuário não existe ou inválido"}');
    }
}



function cadastrarUser($params){

    $global_class = new GlobalClass();

    $nome = $global_class->anti_injection($params->nome);
    $email = $global_class->anti_injection($params->email);
    $password = $global_class->anti_injection($params->password);
    $password_conf = $global_class->anti_injection($params->password_conf);     
    

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('{"success":false,"elements":[],"message":"E-mail inválido!"}');
    }

    if(empty($password) || $password !==  $password_conf ){
        die('{"success":false,"elements":[],"message":"Senhas diferentes!"}');
    }  

    $pass = sha1($email.$password);

    $rows = array();
    $pdo = new PDOConnection();
   
    $result = $pdo->run("call TB_IN_USERS(?,?,?)", array(
        $nome,
        $email,
        $pass
    ));

    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    if($res[0]['result'] > 0){
        die('{"success":true,"elements":[],"message":"Cadastrado!"}');
    }else{
        die('{"success":false,"elements":[],"message":"Usuário já existe!"}');
    }
}