<?php
// PDO is some sort of a object relationa mapping
/*
    * PDO database class
    * connect to database
    * create prepared statements
    * bind values
    * return rows and results
*/

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;   // databse handler
    private $stmt;  // statement (inserting ,  deleting, updating related to the databse)
    private $error; // error (for exeption handling)


    public function __construct(){
        // set DSN  --> something related to the PDO
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // create the PDO instance
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options); //simply return the php data object to the variable
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }


    // prepare statement with query ($sql takes the corresponding sql query as a stream)
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }


    // bind values
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value): {
                    $type = PDO::PARAM_INT;
                    break;
                }
                case is_bool($value): {
                    $type = PDO::PARAM_BOOL;
                    break;
                }
                case is_null($value): {
                    $type = PDO::PARAM_NULL;
                    break;
                }
                default: {
                    $type = PDO::PARAM_STR;
                }
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }


    // execute the prepared statement
    public function execute(){
        return $this->stmt->execute();
    }


    // get result set as array of objects (get multiple recorde as result)
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }


    // get single record as object (get single recorde as result)
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }


    // get row count
    public function rowCount(){
        return $this->stmt->rowCount();
    }
}