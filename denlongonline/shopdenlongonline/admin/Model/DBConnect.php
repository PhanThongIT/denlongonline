<?php

class DBConnect{
    
    private $connect = NULL;

    function __construct($dbName = 'denlongonline',$user = 'root', $password='phanthong'){
        $this->connect = new PDO("mysql:host=localhost;dbname=$dbName;port=3306",$user,$password);
        $this->connect->exec("set names utf8");
    }


    function setStatement($sql, $options = []){
        $stmt = $this->connect->prepare($sql);
        for($i = 1; $i<= count($options); $i++){
            $stmt->bindValue($i, $options[$i-1]);
            //$stmt->bindValue($i+1, $options[$i]);
        }
        return $stmt;
    }

    //sd cho lenh INSERT/UPDATE/DELETE
    function executeQuery($sql, $options = []){
        $stmt = $this->setStatement($sql,$options);
        return $stmt->execute();
    }

    // sd cho cau SELECT return 1 data
    function loadOneRow($sql,$options = []){
        $stmt = $this->setStatement($sql,$options);
        $check = $stmt->execute();
        if($check){
            return $stmt->fetch(PDO::FETCH_OBJ); 
        }   
        else return false;
    }

    //sd cho cau SELECT return more datas
    function loadMoreRows($sql,$options=[]){
        $stmt = $this->setStatement($sql,$options);
        $check = $stmt->execute();
        if($check){
            return $stmt->fetchAll(PDO::FETCH_OBJ); 
        }   
        else return false;
    }

    // Xử lý hàm lấy ra id vừa insert vào database
    function getLastId(){
        return $this->connect->lastInsertId();
    }

}

?>
