<?php

namespace App;

use PDO;
use PDOException;

class Database
{
    private static $address = NO_SQL_ADDRESS;
    private static $type = DB_TYPE;
    private static $host = DB_HOST;
    private static $port = DB_PORT;
    private static $name = DB_NAME;
    private static $user = DB_USER;
    private static $pass = DB_PASS;

    private static $db_handler;
    private static $stmt;

    /**
     * Set DSN and create a PDO
     *
     * @return void
     */
    public static function init()
    {
        if (self::$address !== '') {
            $dsn = self::$type . ':' . self::$address;
        } else {
            $dsn = self::$type . ':host=' . self::$host . ';port=' . self::$port . ';dbname=' . self::$name;
        }

        $options = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            self::$db_handler = new PDO($dsn, self::$user, self::$pass, $options);
            self::$db_handler->exec("set names utf8mb4");
        } catch (PDOException $exception) {
            echo 'PDO Error: ' . $exception->getMessage();
        }
    }

    
    public static function query($sql)
    {
        try {
            self::$stmt = self::$db_handler->prepare($sql);
        } catch (PDOException $exception) {
            echo 'PDO Error: ' . $exception->getMessage();
        }
    }

   
    public static function bind($param, $value = null, $type = null)
    {
        try {
            if (is_array($param)) {
                foreach ($param as $k => $v) {
                    self::bindValues($type, $v, $k);
                }
            } else {
                self::bindValues($type, $value, $param);
            }
        } catch (PDOException $exception) {
            echo 'PDO Error: ' . $exception->getMessage();
        }
    }

  
    public static function execute()
    {
        try {
            return self::$stmt->execute();
        } catch (PDOException $exception) {
            echo 'PDO Error: ' . $exception->getMessage();
            return false;
        }
    }

 
    public static function fetchAll()
    {
        try {
            self::$stmt->execute();
        } catch (PDOException $exception) {
            echo 'PDO Error: ' . $exception->getMessage();
        }

        return self::$stmt->fetchAll(PDO::FETCH_ASSOC);
    }

  
    public static function fetch()
    {
        try {
            self::$stmt->execute();
        } catch (PDOException $exception) {
            echo 'PDO Error: ' . $exception->getMessage();
        }

        return self::$stmt->fetch(PDO::FETCH_ASSOC);
    }


    protected static function bindValues($type, $value, $param)
    {
        if (is_null($type)) {
            if(is_int($value)){
                $type = PDO::PARAM_INT;
            } else if(is_bool($value)){
                $type = PDO::PARAM_BOOL;
            } else if(is_null($value)){
                $type = PDO::PARAM_NULL;
            } else {
               $type = PDO::PARAM_STR;
            }
        }

        self::$stmt->bindValue($param, $value, $type);
    }
}

Database::init();
