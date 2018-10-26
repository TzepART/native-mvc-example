<?php

namespace Kernel;

use PDO;

/**
 * PDO Database Class. Using for:
 * 1. Connecting to Database
 * 2. Create prepared statement
 * 3. Bind Values
 * 4. Return rows and results
 *
 * Class Database
 * @package Kernel
 */
class Database
{
    /**
     * @var string
     */
    private $host = DB_HOST;
    /**
     * @var string
     */
    private $user = DB_USER;
    /**
     * @var string
     */
    private $pass = DB_PASS;
    /**
     * @var string
     */
    private $charset = DB_CHARSET;
    /**
     * @var string
     */
    private $dbname = DB_NAME;
    /**
     * @var PDO
     */
    private $dbh;
    /**
     * @var
     */
    private $stmt;
    /**
     * @var string
     */
    private $error;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        // Set DSN
        $dsn='mysql:host=' . $this->host . ';charset=' . $this->charset . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_LOWER
         );

        //Create PDO Instance
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(\PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Prepare statement query
     * @param $sql
     */
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    /**
     * Bind values
     * @param $param
     * @param $value
     * @param null $type
     */
    public function bind($param, $value, $type = null)
    {
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
   }

    /**
     * Execute the prepared statement
     * @return mixed
     */
    public function execute()
   {
       return $this->stmt->execute();
   }

    /**
     * Get result set as array of objects
     * @return mixed
     */
    public function resultSet(){
       $this->execute();

       return $this->stmt->fetchAll();
   }

    /**
     * Get single record as object
     * @return mixed
     */
    public function single(){
       $this->execute();
       return $this->stmt->fetch();
   }

    /**
     * @return mixed
     */
    public function rowCount(){
       return $this->stmt->rowCount();
   }

}