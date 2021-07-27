<?php
    try{
        $pdo = new PDO("mysql:host=localhost; dbname=mr-fisher", "root", "");
    }catch(PDOException $pdo){
        die("connection failed");
    }
?>