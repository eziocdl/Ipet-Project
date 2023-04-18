<?php

class  Acesso {


    function setSession($iduser, $nome, $email)
    {          
        session_start();
        $_SESSION['iduser'] = $iduser;        
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] =  $email;
    }
}

