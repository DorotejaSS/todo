<?php

class Database
{
    public static $server_name = "127.0.0.1";
    public static $user = "root";
    public static $password = "";
    public static $database = "todo";
    protected static $instance = null;
    protected $conn;

    public function __construct()
    {
        $dsn = "mysql:host=" . self::$server_name . ";dbname=" . self::$database;
        $options=[
            PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_OBJ
        ];
        $this->conn = new PDO($dsn, self::$user, self::$password, $options);
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    public function getConnection()
    {
        return $this->conn;
    }
}
