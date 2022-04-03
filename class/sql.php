<?php

class Sql extends PDO
{
    private $conn;
    
    public function __construct()
    {
    $this->conn =new PDO ('mysql:host=localhost;dbname=dbphp7', 'root', '');
    }

    private function setParams($statment, $parameters = array())
    {
        foreach ($parameters as $key => $value)
        {
            $this->setParam($statment, $key, $value);
        }
    }

    private function setParam($statment, $key, $value)
    {
        $statment->bindParam($key, $value);
    }

    public function queri($rawQuery, $params = array())
    {
        $stmt=$this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
    }

    public function select($ramQuery, $params = array()):array
    {
        $stmt = $this->queri($ramQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
#echo "OK ate aqui";
?>