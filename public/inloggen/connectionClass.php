<?php
class connectionClass extends mysqli{
    private $host= "localhost",$password="password",$username="username",$dbName="project";
    public $con;
    function __construct() {
        $this->con= $this->connect($this->host, $this->username, $this->password, $this->dbName,$this->n, $this->n);
    }
}