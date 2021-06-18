<?php
class Database{
    protected $host = "localhost";
    protected $db = "employee_management";
    protected $username = "sahildalvi";
    protected $password = "sahildalvi";

    protected $table;
    protected $stmt;
    protected $pdo;

    protected $debug = true;

    public function __construct(){
        try{
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->db}",$this->username, $this->password);

        }catch(PDOException $e){
            die($this->debug ? $e->getMessage() : 'Some Error While Connecting!');
        }
    }

    public function query($sql){
        return $this->pdo->query($sql);//executes the ddl statements
        // return $stmt->fetchAll();
    }
    public function rawQueryExecutor($sql){
        return $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function table($tableName){
        $this->table = $tableName;
        return $this;
    }

    public function insert($data){
        // die(print_r($data));
        $keys = array_keys($data);

        $fields = "`".implode("`,`",$keys)."`";
        $placeholder = ":".implode(", :",$keys);
        $sql = "INSERT INTO `{$this->table}` ({$fields}) VALUES ({$placeholder})";

        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function update($table, $data, $condition="1")
     {
         $columnKeyValue = "";
         $i = 0;
         foreach($data as $key=>$value){
             $columnKeyValue .= "$key = :$key";
             $i++;
             if($i<count($data)){
                 $columnKeyValue .= ", ";
             }
         }
        $sql = "UPDATE {$table} SET {$columnKeyValue} WHERE {$condition}";
        // die($sql);
        $this->stmt = $this->pdo->prepare($sql);
        // die($sql);
        $this->stmt->execute($data);
        return $this;
     }


    public function where($field, $operator, $value){
    $this->stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE {$field} {$operator} :value");
    $this->stmt->execute(["value" =>$value]);
    return $this;
    }

    public function exists($data){
        $field = array_keys($data)[0];
        return $this->where($field, "=", $data[$field])->count() ? true : false;
    }

    public function count(){
        return $this->stmt->rowCount();
    }

    public function get(){
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function first(){
        return $this->get()[0];
    }
}
?>