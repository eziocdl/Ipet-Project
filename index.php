<?php

if(isset($_GET['page']) && $_GET['page'] == 2){
    include( 'admin/login.php');
}else{
    include( 'site/index.php');
}




