<?php


class dbConnection{
    //constructor creation

    private $connection;
    private $db_type;
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_port;
    private $posted_values;

    public function __construct($DB_TYPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASS,$DB_PORT) {
        $this->db_type      = $DB_TYPE;
        $this->db_host      = $DB_HOST;
        $this->db_name      = $DB_NAME;
        $this->db_user      = $DB_USER;
        $this->db_pass      = $DB_PASS;
        $this->db_port      = $DB_PORT;
        $this->connection($DB_TYPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASS,$DB_PORT);
    }
    public function connection($DB_TYPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASS,$DB_PORT){
        switch ($DB_TYPE) {
            case 'MySQLi':
                if($DB_PORT<>Null){
                    $DB_HOST.=":".$DB_PORT;
                }
                $this->connection = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
                if ($this->connection->connect_error) { return "Connection failed: " . $this->connection->connect_error; }else{
                    // echo "Connected successfully";
                }
                break;
            case 'PDO':
                if($DB_PORT<>Null){
                    $DB_HOST.="";
                }
                try {
                    $this->connection = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASS);
                    // set the PDO error mode to exception
                    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // echo "Connected successfully";
                } catch(PDOException $e) {
                    die("Connection failed: " . $e->getMessage());
                }
                break;
        }
    }

    public function escape_values($posted_values): string
    {
        switch ($this->db_type) {
            case 'MySQLi':
                $this->posted_values = $this->connection->real_escape_string($posted_values);
                break;
            case 'PDO':
                $this->posted_values = addslashes($posted_values);
                break;
        }
        return $this->posted_values;
    }

    public function count_results($sql){
        switch ($this->db_type) {
            case 'MySQLi':
                if(is_object($this->connection->query($sql))){
                    $result = $this->connection->query($sql);
                    return $result->num_rows;
                }else{
                    print "Error 5: " . $sql . "<br />" . $this->connection->error . "<br />";
                }
                break;
            case 'PDO':
                $res = $this->connection->prepare($sql);
                $res->execute();
                return $res->rowCount();
                break;
        }
    }
    
    public function insert($table, $data){
        ksort($data);
        $fieldDetails = NULL;
        $fieldNames = implode('`, `',  array_keys($data));
        $fieldValues = implode("', '",  array_values($data));
        $sth = "INSERT INTO $table (`$fieldNames`) VALUES ('$fieldValues')";
        return $this->extracted($sth);
    }

    public function select($sql){
        switch ($this->db_type) {
            case 'MySQLi':
                $result = $this->connection->query($sql);
                return $result->fetch_assoc();
                break;
            case 'PDO':
                $result = $this->connection->prepare($sql);
                $result->execute();
                return $result->fetchAll(PDO::FETCH_ASSOC)[0];
                break;
        }
    }

    public function select_while($sql){
        switch ($this->db_type) {
            case 'MySQLi':
                $result = $this->connection->query($sql);
                for ($res = array (); $row = $result->fetch_assoc(); $res[] = $row);
                return $res;
                break;
            case 'PDO':
                $result = $this->connection->prepare($sql);
                $result->execute();
                return $result->fetchAll(PDO::FETCH_ASSOC);
                break;
        }
    }
  
    public function update($table, $data, $where){
        $wer = '';
        if(is_array($where)){
            foreach ($where as $clave=>$value){
                $wer.= $clave."='".$value."' AND ";
            }
            $wer   = substr($wer, 0, -4);
            $where = $wer;
        }
        ksort($data);
        $fieldDetails = NULL;
        foreach ($data as $key => $values){
            $fieldDetails .= "$key='$values',";
        }
        $fieldDetails = rtrim($fieldDetails,',');
        if($where==NULL or $where==''){
            $sth = "UPDATE $table SET $fieldDetails";
        }else {
            $sth = "UPDATE $table SET $fieldDetails WHERE $where";
        }
        return $this->extracted($sth);
    }
   
}