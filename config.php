<?php

define('ROOT_PATH', substr(dirname(__DIR__) , 0, -4));
date_default_timezone_set('America/Sao_Paulo');

ini_set('display_errors', 0);
error_reporting(0);

$Globals["AppName"] = "iPets";
$Globals["Version"] = "1.0";

$Globals["AppDir"] = 'ipet/';
$Globals["Path"] = ROOT_PATH . "/";
// $Globals["APIPath"] = "http://ipet3.hospedagemdesites.ws/" . $Globals["AppDir"].'api/';
// $Globals["APIEmail"] = "http://ipet3.hospedagemdesites.ws/" . $Globals["AppDir"].'email/';
// $Globals["SiteFull"] = "http://ipet3.hospedagemdesites.ws/" . $Globals["AppDir"].'site/';
// $Globals["AdminFull"] = "http://ipet3.hospedagemdesites.ws/" . $Globals["AppDir"].'admin/';
// $Globals['internetFiles'] = "http://ipet3.hospedagemdesites.ws/" . $Globals["AppDir"].'internetFiles/';

$Globals["APIPath"] = "http://localhost/" . $Globals["AppDir"].'api/';
$Globals["APIEmail"] = "http://localhost/" . $Globals["AppDir"].'email/';
$Globals["SiteFull"] = "http://localhost/" . $Globals["AppDir"].'site/';
$Globals["AdminFull"] = "http://localhost/" . $Globals["AppDir"].'admin/';
$Globals['internetFiles'] = "http://localhost/" . $Globals["AppDir"].'internetFiles/';










