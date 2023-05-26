<?php
require("./config.php");
class database
{
    private $conn;
    private $status;

    function __construct()
    {
        $this->status = false;
    }
    // Public Properties
    public function getConnection()
    {
        return $this->conn;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function closeConnection()
    {
        $this->conn = null;
    }
    public function init()
    {
        try {
            $val = new config("./credentials.txt");
            $this->conn = new PDO(
                "mysql:host=" . trim($val->getValue()[0]) . ";dbname=" . trim($val->getValue()[3]),
                trim($val->getValue()[1]),
                trim($val->getValue()[2])
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->status = true;
        } catch (Exception $th) {
            $this->status = false;
            return 501;
        }
    }
}
