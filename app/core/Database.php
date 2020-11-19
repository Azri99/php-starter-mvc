<?php
class Database{
    public  $connection = '';
    public function __construct()
    {
        $serverName = $_ENV['SERVER'];
        $connectionOptions = array(
            "Database" => $_ENV['DATABASE'],
            "Uid" => $_ENV['USERNAME'],
            "PWD" => $_ENV['PASSWORD']
        );
        //Establishes the connection
        $this->connection = sqlsrv_connect($serverName, $connectionOptions);
        if(!$this->connection) die($this->FormatErrors(sqlsrv_errors()));
    }   
    public function FormatErrors( $errors ){
    /* Display errors. */
        echo "Error information: <br>";
        foreach ( $errors as $error ){
            echo "SQLSTATE: ".$error['SQLSTATE']." <br>";
            echo "Code: ".$error['code']." <br>";
            echo "Message: ".$error['message']." <br>";
        }
    }

    public function select($query, $options = []){
        $data = [];
        
        $results = count($options) == 0 ? sqlsrv_query($this->connection, $query) : sqlsrv_query($this->connection, $query, $options);
        if(!$this->connection) die($this->FormatErrors(sqlsrv_errors()));

        while ($obj = sqlsrv_fetch_object($results)) 
            $data[] = $obj;
        
        return $data;
    }
}