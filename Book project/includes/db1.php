<?php 
session_start();
   $dsn= "mysql:host=localhost;dbname=signup";
try{
    $pdo = new PDO($dsn, 'root','');

}catch(PDOException $e){
    echo $e->getMessage();
}

?>