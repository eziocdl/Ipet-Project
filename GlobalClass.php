<?php

require_once('config.php');

class GlobalClass{


    public function anti_injection( $sqlParam ){

        if(mb_detect_encoding($sqlParam.'x', 'UTF-8, ISO-8859-1') != "UTF-8"){
            $sqlParam = utf8_encode($sqlParam);
        }
        $sqlParam = preg_replace(preg_quote("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"),"",  $sqlParam );
        $sqlParam = trim( $sqlParam ); //limpa espaços vazio
        $sqlParam = strip_tags( $sqlParam ); //tira tags html e php
        $sqlParam = addslashes( $sqlParam ); //Adiciona barras invertidas a uma string
        
        return $sqlParam;

    }

    public function retornaSoNumero($val){
		return preg_replace('/[^[:alnum:]_]/', '',$val);
	}



    function AccessDenied() {
        // esvazia dados da session
        global $Globals;
        session_regenerate_id ( true );
        if (isset ( $_SESSION ['iduser'] ))
            session_destroy ();          
            header ( "Location: " . '../index.php?page=1' );
        die();
    }

    function createFilePet($file,$idUser, $idPets){
      

        if(!isset($file['name'])){
            return 0;
        }

        if ($file['size'] != 0 && $file['error'] == 0 && $file['size'] < 5334343 && $_FILES['file']['type'] == 'image/jpeg'){

            $dest = dirname(__FILE__).'/internetFiles/profilePet_'.$idUser.$idPets.'.jpg';          

            if (move_uploaded_file($file['tmp_name'], $dest))
            {
                return 1;

            }else{
                return 0;
            } 
        }else{
            return 0;
        }
    }


}
