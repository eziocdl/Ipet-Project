<?php

    $Globals["DB_SEC_HOST"] = "ipet.mysql.uhserver.com";
    $Globals["DB_SEC_PORT"] = "3306";
    $Globals["DB_SEC_USER"] = "ipet";
    $Globals["DB_SEC_PASS"] = "iPet@2022";
    $Globals["DB_SEC_SCHEMA"] = "ipet";


    class PDOConnection extends PDO
{

    public function __construct($dsn = null, $user = null, $password = null, $options = array())
    {
        global $Globals;

        $default_options = array(
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        $tempDNS = "mysql:host=" . $Globals["DB_SEC_HOST"] . ";dbname=" . $Globals["DB_SEC_SCHEMA"] . ";charset=utf8";

        $dsn = $dsn ? $dsn : $tempDNS;
        $user = $user ? $user : $Globals["DB_SEC_USER"];
        $password = $password ? $password : $Globals["DB_SEC_PASS"];
        $options = array_replace($default_options, $options);

        parent::__construct($dsn, $user, $password, $options);
    }

    public function setBuffer()
    {
        $this->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    }

    public function run($sql, $args = null)
    {
        if (!$args)
        {
         
            return $this->query($sql);
        }       
        $stmt = $this->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}