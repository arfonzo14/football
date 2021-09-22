<?php
global $connection;

$jugadores = array(array());

try {
    $connection = new PDO("mysql:host=localhost;dbname=futeboldb", "root", "");
 
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



function listJug($connection)
{
    try {
        
        $stmt = $connection->prepare('select * from jugadores');
        $stmt->execute();
        $jugadores = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
    } catch (Exception $e) {
        echo 'query failed' . $e->getMessage();
    }
    return $jugadores;  
}




