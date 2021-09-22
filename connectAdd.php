<?php
require('connect.php');
//require('addPlayer.php');
if (isset($_REQUEST['submitButton'])) {

    $id = $_REQUEST['id'];
    $action = $_REQUEST['action'];
    echo $action;
    $firstName = $_REQUEST['player_Fname'];
    $lastName = $_REQUEST['player_Lname'];
    $age = $_REQUEST['player_age'];
    $position = $_REQUEST['player_position'];
    $good_leg = $_REQUEST['player_legs'];

    $sentence = $connection->query("SELECT * FROM jugadores where (nombre = '$firstname' AND apellidos = '$lastname' AND edad = '$age' AND posicion ='$position' AND piernabuena = '$goodleg')");

    if ($sentence->rowCount() <= 0) {
    }
    $sentence = null;
    $ending;
    if ($action == 'edit') {
        $query = "update  jugadores  SET nombre = ?, apellidos= ?, edad=?,posicion=?,piernabuena=? WHERE id =" . $id . "";

        $ending = 'Table updated';
    } else {
        $query = 'insert into jugadores (nombre,apellidos,edad,posicion,piernabuena)
        values(?,?,?,?,?)';
        $ending = 'Player added';
    }
    try {
        $stmt = $connection->prepare($query);
        $stmt->execute(array($firstName, $lastName, $age, $position, $good_leg));
        $stmt = null;
        echo $ending;
    } catch (Exception $e) {
        echo 'query failed' . $e->getMessage();
    }
} else {
    echo 'Rellena valores';
}
