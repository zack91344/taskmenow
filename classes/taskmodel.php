<?php
Database=membership;Data Source=us-cdbr-azure-west-a.cloudapp.net;User Id=b20f46da60e22d;Password=ee06f1cb
    function connect(){
        $host = "us-cdbr-azure-west-a.cloudapp.net";
        $user = "b20f46da60e22d";
        $pwd = "ee06f1cb";
        $db = "membership";

        try{
            $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e){
            die(print_r($e));
        }
        return $conn;
    }

    function markItemComplete($item_id)
    {
	    $conn = connect();
	    $sql = "UPDATE items SET is_complete = 1 WHERE id = ?";
	    $stmt = $conn->prepare($sql);
	    $stmt->bindValue(1, $item_id);
	    $stmt->execute();
    }


    function getAllItems(){
        $conn = connect();
        $sql = "SELECT * FROM items";
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_NUM);

    }

    function addItem($name, $category, $date, $is_complete){
        $conn = connect();
        $sql = "INSERT INTO items (name, category, date, is_complete) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $category);
        $stmt->bindValue(3, $date);
        $stmt->bindValue(4, $is_complete);
        $stmt->execute();
    }

    function deleteItem($item_id){
        $conn = connect();
        $sql = "DELETE FROM items WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $item_id);
        $stmt->execute();
    }
   