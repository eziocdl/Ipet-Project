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
    case 'CADASTRO_PET':
        cadastrarPet($params);
        break;
    case 'ALTERAR_PET':
        alterarPet($params);
        break;
    case 'LISTAR_PETS':
        listarPets($params);
        break;
    case 'LISTAR_PETS_SITE':
        listarPetsSite($params);
        break;
    case 'ENCONTRAR_PET':
        encontrarPet($params);
        break;
    case 'ENCONTRADO_PET':
        encontradoPet($params);
        break;
    case 'ENCONTREI':
        encontrei($params);
        break;
    case 'RESPONDER':
        responder($params);
        break;
    case 'RESPONDER_INTERACAO':
        responderInteracao($params);
        break;
    case 'LISTA_USUARIOS_RESPOSTA':
        listaUsuariosResposta($params);
        break;
    case 'CARREGARMENSAGENS':
        carregarMensagens($params);
        break;
    case 'LISTA_PETS_INTERACAO':
        listaPetsInteracao($params);
        break;
    case 'CARREGAR_MENSAGENS_PET_INTERACAO':
        carregarMensagensPetInteracao($params);
        break;
    default:
        die('{"success":false,"elements":[],"message":"API não encontrada"}');
        break;
}

function carregarMensagensPetInteracao($params){

    $global_class = new GlobalClass();   

    $id_user_perdeu =  $global_class->retornaSoNumero($global_class->anti_injection($params->id_user_perdeu));
    $id_pet_perdido =  $global_class->retornaSoNumero($global_class->anti_injection($params->id_pet_perdido));
    $id_user_encontrou =  $global_class->retornaSoNumero($global_class->anti_injection($params->id_user_encontrou));

    if(empty($id_user_perdeu) || !isset($id_user_perdeu)){
        die('{"success":false,"elements":[],"message":"Solicitação não atendida!"}');
    } 
    if(empty($id_pet_perdido) || !isset($id_pet_perdido)){
        die('{"success":false,"elements":[],"message":"Solicitação não atendida!"}');
    } 
    if(empty($id_user_encontrou) || !isset($id_user_encontrou)){
        die('{"success":false,"elements":[],"message":"Solicitação não atendida!"}');
    } 

    $pdo = new PDOConnection();        
   
    $result = $pdo->run("call PR_SE_TB_MENSAGEM(?,?,?)", array(      
        $id_user_perdeu,
        $id_pet_perdido,
        $id_user_encontrou
    ));   

    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    if(count($res) === 0){
        die('{"success":false,"elements":[],"message":"Nenhuma mensagem enviada!"}');
    }

    die('{"success":true,"elements":'.json_encode($res).',"message":"Listagem"}');    
}

function listaPetsInteracao($params){

    $global_class = new GlobalClass(); 

    $id_user =  $global_class->retornaSoNumero($global_class->anti_injection($params->id_user));

    if(empty($id_user) || !isset($id_user)){
        die('{"success":false,"elements":[],"message":"Solicitação não atendida!"}');
    } 

    $pdo = new PDOConnection(); 

    $result = $pdo->run("call PR_SE_LISTA_PETS_INTERACAO(?)", array(      
        $id_user
    ));  


    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    if(count($res) === 0){
        die('{"success":false,"elements":[],"message":"Nenhum pet encontrado!"}');
    }

    die('{"success":true,"elements":'.json_encode($res).',"message":"Listagem"}');    


}


function carregarMensagens($params){

  
    $global_class = new GlobalClass();   

    $id_user_perdeu =  $global_class->retornaSoNumero($global_class->anti_injection($params->id_user_perdeu));
    $id_pet_perdido =  $global_class->retornaSoNumero($global_class->anti_injection($params->id_pet_perdido));
    $id_user_encontrou =  $global_class->retornaSoNumero($global_class->anti_injection($params->id_user_encontrou));

    if(empty($id_user_perdeu) || !isset($id_user_perdeu)){
        die('{"success":false,"elements":[],"message":"Solicitação não atendida!"}');
    } 
    if(empty($id_pet_perdido) || !isset($id_pet_perdido)){
        die('{"success":false,"elements":[],"message":"Solicitação não atendida!"}');
    } 
    if(empty($id_user_encontrou) || !isset($id_user_encontrou)){
        die('{"success":false,"elements":[],"message":"Solicitação não atendida!"}');
    } 

    $pdo = new PDOConnection();        
   
    $result = $pdo->run("call PR_SE_TB_MENSAGEM(?,?,?)", array(      
        $id_user_perdeu,
        $id_pet_perdido,
        $id_user_encontrou
    ));   

    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    if(count($res) === 0){
        die('{"success":false,"elements":[],"message":"Nenhuma mensagem enviada!"}');
    }

    die('{"success":true,"elements":'.json_encode($res).',"message":"Listagem"}');    
}

function listaUsuariosResposta($params){  

    $global_class = new GlobalClass();   

    $iduser =  $global_class->retornaSoNumero($global_class->anti_injection($params->iduser));
    $idpets =  $global_class->retornaSoNumero($global_class->anti_injection($params->idpets));

    if(!isset($iduser) || !isset($idpets) ){
        die('{"success":false,"elements":[],"message":"Solicitação não atendida!"}');
    }

    $pdo = new PDOConnection();     
   
   
    $result = $pdo->run("call PR_SE_USER_RESPOSTA(?,?)", array(      
        $iduser,
        $idpets
    ));   

    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    if(count($res) === 0){
        die('{"success":false,"elements":[],"message":"Nenhuma mensagem enviada!"}');
    }

    die('{"success":true,"elements":'.json_encode($res).',"message":"Listagem"}');     

}

function responderInteracao($params){
    $global_class = new GlobalClass();   

    $id_pet_perdido =  $global_class->retornaSoNumero($global_class->anti_injection($params->id_pet_perdido));
    $id_user_encontrou =  $global_class->retornaSoNumero($global_class->anti_injection($params->id_user_encontrou));
    $id_user_perdeu =  $global_class->retornaSoNumero($global_class->anti_injection($params->id_user_perdeu));
    $mensagem =  $global_class->anti_injection($params->mensagem);


    $pdo = new PDOConnection();  

    $result = $pdo->run("call PR_IN_TB_MENSAGEM(?,?,?,?,?,?)", array(      
        $id_user_encontrou,
        $id_user_perdeu,
        $id_pet_perdido,
        $mensagem,
        0,
        0
    ));

    $res4 = $result->fetchAll(PDO::FETCH_ASSOC);

    if(count($res4) > 0){
        die('{"success":true,"elements":[],"message":"Mensagem enviada!"}');
    }else{
        die('{"success":false,"elements":[],"message":"Não foi possível enviar mensagem!"}');  
    } 
}

function responder($params){

    $global_class = new GlobalClass();   

    $id_pet_perdido =  $global_class->retornaSoNumero($global_class->anti_injection($params->id_pet_perdido));
    $id_user_encontrou =  $global_class->retornaSoNumero($global_class->anti_injection($params->id_user_encontrou));
    $id_user_perdeu =  $global_class->retornaSoNumero($global_class->anti_injection($params->id_user_perdeu));
    $mensagem =  $global_class->anti_injection($params->mensagem);


    $pdo = new PDOConnection();  

    $result = $pdo->run("call PR_IN_TB_MENSAGEM(?,?,?,?,?,?)", array(      
        $id_user_encontrou,
        $id_user_perdeu,
        $id_pet_perdido,
        $mensagem,
        0,
        1
    ));

    $res4 = $result->fetchAll(PDO::FETCH_ASSOC);

    if(count($res4) > 0){
        die('{"success":true,"elements":[],"message":"Mensagem enviada!"}');
    }else{
        die('{"success":false,"elements":[],"message":"Não foi possível enviar mensagem!"}');  
    }   
}


function encontrei($params){


    $global_class = new GlobalClass();   

    $iduser =  $global_class->retornaSoNumero($global_class->anti_injection($params->iduser));
    $idpet =  $global_class->retornaSoNumero($global_class->anti_injection($params->idpets));
    $email_achou =  $global_class->anti_injection($params->email);
    $msn =  $global_class->anti_injection($params->msn);
    $tel =  $global_class->anti_injection($params->tel);


    if (!filter_var($email_achou, FILTER_VALIDATE_EMAIL)) {
        die('{"success":false,"elements":[],"message":"Email '.$email_achou.' inválido!"}');
    }   

    if(empty($iduser) || !isset($iduser)){
        die('{"success":false,"elements":[],"message":"Pet não encontrado!"}');
    } 
    if(empty($idpet) || !isset($idpet)){
        die('{"success":false,"elements":[],"message":"Pet não encontrado!"}');
    } 

    $pdo = new PDOConnection();     
   
   
    $result = $pdo->run("call PR_VERIFICA_EXISTE_USUARIO(?,?)", array(      
        $email_achou,
        $iduser
    ));

    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    if(count($res) > 0){
        die('{"success":false,"elements":[],"message":"Você precisa ir na área administrativa e desativar a procura!"}');
    }

    $pdo = new PDOConnection();  

    $result = $pdo->run("call PR_VERIFICA_EXISTE_EMAIL(?)", array(      
        $email_achou
    ));

    $res2 = $result->fetchAll(PDO::FETCH_ASSOC);      
   

    if(count($res2) > 0){

        $iduser_achou = $res2[0]['iduser'];
        
        $pdo = new PDOConnection();  

        $result = $pdo->run("call PR_GET_INFO_PET_PERDIDO(?,?,?)", array(      
            $iduser,
            $idpet,
            1
        ));
    
        $res3 = $result->fetchAll(PDO::FETCH_ASSOC);

        if(count($res3) == 0 ){
            die('{"success":false,"elements":[],"message":"Pet não encontrado!"}');
        }

        $idpets_perdido =  $res3[0]['idpets'];
        $iduser_perdeu =  $res3[0]['iduser'];

        $pdo = new PDOConnection();  

        $result = $pdo->run("call PR_IN_TB_MENSAGEM(?,?,?,?,?,?)", array(      
            $iduser_achou,
            $iduser_perdeu,
            $idpets_perdido,
            $msn,
            0,
            0
        ));

        $res4 = $result->fetchAll(PDO::FETCH_ASSOC);

        if(count($res4) > 0){
            die('{"success":true,"elements":[],"message":"Mensagem enviada!"}');
        }else{
            die('{"success":false,"elements":[],"message":"Não foi possível enviar mensagem!"}');  
        }       
       
    }else{

        require_once('../../email/index.php'); 
        
        $pdo = new PDOConnection();  

        $result = $pdo->run("call PR_SE_GET_INFO_DONO_PET(?,?)", array(      
            $iduser,
            $idpet
        ));

        $res5 = $result->fetchAll(PDO::FETCH_ASSOC);

        if(count($res5) == 0 ){
            die('{"success":false,"elements":[],"message":"Dono do Pet não encontrado!"}'); 
        }

        $nome_dono_pet = $res5[0]['nome_usuario'];
        $email_dono_pet = $res5[0]['email_usuario'];
        $nome_pet = $res5[0]['nome_pet'];       

        $global_class = new GlobalClass();       

        $email = new SendEmail();   

        $subject = "Novas informações do Pet ".$nome_pet;       

        require('../../email/templates/template_info_pet.php');

        $result =  $email->send($html,$email_dono_pet, $nome_dono_pet,$subject);        

        if($result == 1){
            die('{"success":true,"elements":[],"message":"E-mail enviado. Muito obrigado pelo seu contato, logo em breve dono do Pet entrará em contato! "}');
        }else{
            die('{"success":false,"elements":[],"message":"Não foi possível enviar e-mail!"}');
        }
    }
}

function encontradoPet($params){

    $global_class = new GlobalClass();   

    $iduser =  $global_class->retornaSoNumero($global_class->anti_injection($params->iduser));
    $idpet =  $global_class->retornaSoNumero($global_class->anti_injection($params->idpet));  

    if(empty($iduser) || !isset($iduser)){
        die('{"success":false,"elements":[],"message":"Pet não encontrado!"}');
    } 
    if(empty($idpet) || !isset($idpet)){
        die('{"success":false,"elements":[],"message":"Pet não encontrado!"}');
    } 

    $pdo = new PDOConnection();
   
    $result = $pdo->run("call ENCONTRADO_PET(?,?)", array(      
        $iduser,
        $idpet
    ));

    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    if(isset($res[0]['result'])){
        die('{"success":true,"elements":[],"message":"Enviado!"}');
    }else{
        die('{"success":false,"elements":[],"message":"Não foi possível alterar!"}');
    } 
}

function encontrarPet($params){
   
    $global_class = new GlobalClass();   


    $iduser =  $global_class->retornaSoNumero($global_class->anti_injection($params->iduser));
    $idpet =  $global_class->retornaSoNumero($global_class->anti_injection($params->idpet));  
    $cep =  $global_class->retornaSoNumero($global_class->anti_injection($params->cep));  

    $data =  $global_class->anti_injection($params->data);  
    $cidade = $global_class->anti_injection($params->cidade);  
    $bairro =  $global_class->anti_injection($params->bairro);  



    if(empty($iduser) || !isset($iduser)){
        die('{"success":false,"elements":[],"message":"Pet não encontrado!"}');
    } 
    if(empty($idpet) || !isset($idpet)){
        die('{"success":false,"elements":[],"message":"Pet não encontrado!"}');
    } 

    if(empty($cep) || !isset($cep)){
        die('{"success":false,"elements":[],"message":"Pet não encontrado!"}');
    } 
    if(empty($data) || !isset($data)){
        die('{"success":false,"elements":[],"message":"Data não encontrada!"}');
    } 
    if(empty($cidade) || !isset($cidade)){
        die('{"success":false,"elements":[],"message":"Cidade não encontrada!"}');
    } 
    if(empty($bairro) || !isset($bairro)){
        die('{"success":false,"elements":[],"message":"Bairro não encontrado!"}');
    } 

    $data = date('Y-m-d', strtotime(str_replace('-', '/', $data)));


    $pdo = new PDOConnection();
   
    $result = $pdo->run("call ENCONTRAR_PET(?,?,?,?,?,?)", array(      
        $iduser,
        $idpet,
        $cep,
        $data,
        $cidade,
        $bairro
    ));

    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    if(isset($res[0]['result'])){
        die('{"success":true,"elements":[],"message":"Enviado!"}');
    }else{
        die('{"success":false,"elements":[],"message":"Não foi possível alterar!"}');
    }   

}


function listarPets($params){

    $global_class = new GlobalClass();

    $perdido =  $global_class->retornaSoNumero($global_class->anti_injection($params->perdido));
    $iduser =  $global_class->retornaSoNumero($global_class->anti_injection($params->iduser));  

    
    
    $perdido = empty($perdido) ? null : $perdido;

    if(empty($iduser) || !isset($iduser)){
        die('{"success":false,"elements":[],"message":"Usuário não encontrado!"}');
    }    

    $pdo = new PDOConnection();
   
    $result = $pdo->run("call LISTAR_PETS(?,?)", array(      
       $perdido,
       $iduser 
    ));

    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    if(count($res)){
        die('{"success":true,"elements":'.json_encode($res).',"message":"Listagem"}');
    }else{
        die('{"success":false,"elements":[],"message":"Nenhum Pet cadastrado!"}');
    }   
}

function listarPetsSite($params){    

    $global_class = new GlobalClass();

    $perdido =  $global_class->retornaSoNumero($global_class->anti_injection($params->perdido)); 
    
    $perdido = empty($perdido) ? null : $perdido;   

    $pdo = new PDOConnection();
   
    $result = $pdo->run("call LISTAR_PETS_SITE(?)", array(      
       $perdido
    ));

    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    if(count($res)){
        die('{"success":true,"elements":'.json_encode($res).',"message":"Listagem"}');
    }else{
        die('{"success":false,"elements":[],"message":"Nenhum Pet cadastrado!"}');
    }   

}


function cadastrarPet($params){   
   

    $global_class = new GlobalClass();

    $iduser =  $global_class->retornaSoNumero($global_class->anti_injection($params->iduser));
    $nome = $global_class->anti_injection($params->nome);   
    $idade = $global_class->retornaSoNumero($global_class->anti_injection($params->idade));
    $especie = $global_class->anti_injection($params->especie);         
    $raca = $global_class->anti_injection($params->raca);         
    $predominante = $global_class->anti_injection($params->predominante);         
    $sexo = $global_class->retornaSoNumero($global_class->anti_injection($params->sexo));        
    
    
    if(empty($iduser) || !isset($iduser)){
        die('{"success":false,"elements":[],"message":"Usuário não encontrado!"}');
    }  
    if(empty($nome) || !isset($nome)){
        die('{"success":false,"elements":[],"message":"Nome não encontrado!"}');
    }  
    if(empty($idade) || !isset($idade)){
        die('{"success":false,"elements":[],"message":"Idade não encontrado!"}');
    }  
    if(empty($especie) || !isset($especie)){
        die('{"success":false,"elements":[],"message":"Especie não encontrado!"}');
    }  
    if(empty($sexo) || !isset($sexo)){
        die('{"success":false,"elements":[],"message":"Sexo não encontrado!"}');
    }  
    if(empty($predominante) || !isset($predominante)){
        die('{"success":false,"elements":[],"message":"Cor não encontrada!"}');
    }  


    $pdo = new PDOConnection();   
   
    $result = $pdo->run("call TB_IN_PETS(?,?,?,?,?,?,?)", array(
        $iduser,
        $nome,
        $idade,
        $especie,
        $raca,
        $sexo,
        $predominante
    ));

    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    if($res[0]['result'] > 0){

        die('{"success":true,"elements":'.json_encode(array("idpets" =>$res[0]['result'] )).',"message":"Cadastrado!"}');

    }else{
        die('{"success":false,"elements":[],"message":"Não foi possível cadastrar o Pet! "}');
    }

}

function alterarPet($params){   

    $global_class = new GlobalClass();

    $iduser =  $global_class->retornaSoNumero($global_class->anti_injection($params->iduser));
    $idpets =  $global_class->retornaSoNumero($global_class->anti_injection($params->idpets));

    $nome = $global_class->anti_injection($params->nome);   
    $idade = $global_class->retornaSoNumero($global_class->anti_injection($params->idade));
    $especie = $global_class->anti_injection($params->especie);         
    $raca = $global_class->anti_injection($params->raca);         
    $sexo = $global_class->retornaSoNumero($global_class->anti_injection($params->sexo));        
    $predominante = $global_class->anti_injection($params->predominante);         
    
    
    if(empty($iduser) || !isset($iduser)){
        die('{"success":false,"elements":[],"message":"Usuário não encontrado!"}');
    }  
    if(empty($idpets) || !isset($idpets)){
        die('{"success":false,"elements":[],"message":"Pet não encontrado!"}');
    }  
    if(empty($nome) || !isset($nome)){
        die('{"success":false,"elements":[],"message":"Nome não encontrado!"}');
    }  
    if(empty($idade) || !isset($idade)){
        die('{"success":false,"elements":[],"message":"Idade não encontrado!"}');
    }  
    if(empty($especie) || !isset($especie)){
        die('{"success":false,"elements":[],"message":"Especie não encontrado!"}');
    }  
    if(empty($sexo) || !isset($sexo)){
        die('{"success":false,"elements":[],"message":"Sexo não encontrado!"}');
    }  
    if(empty($predominante) || !isset($predominante)){
        die('{"success":false,"elements":[],"message":"Cor não encontrada!"}');
    }  

    $pdo = new PDOConnection();   
   
    $result = $pdo->run("call TB_UP_PETS(?,?,?,?,?,?,?,?)", array(
        $iduser,
        $idpets,
        $nome,
        $idade,
        $especie,
        $raca,
        $sexo,
        $predominante
    ));

    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    if($res[0]['result'] > 0){

        die('{"success":true,"elements":'.json_encode(array("idpets" =>$res[0]['result'] )).',"message":"Solicitação atendida!"}');

    }else{
        die('{"success":false,"elements":[],"message":"Não foi possível atender a solicitação! "}');
    }

}