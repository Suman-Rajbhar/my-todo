<?php


class dbConn
{
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    function __construct() {
        $this->db_host = "localhost";
        $this->db_user = "root";
        $this->db_pass = "";
        $this->db_name = "mytodo";
    }
    public function db_connect()
    {
        $mysqli = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
        return $mysqli;
    }
}