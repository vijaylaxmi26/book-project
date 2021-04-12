<?php 
   $dsn= "mysql:host=localhost;dbname=signup";
try{
    $pdo = new PDO($dsn, 'root','');

}catch(PDOException $e){
    echo $e->getMessage();
}

?>