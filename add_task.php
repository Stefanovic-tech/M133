<?php
include('inc/config.inc.php');

// Überprüfen und Hinzufügen der neuen Aufgabe in die Datenbank
if (isset($_POST['task'])) {
    $task = $_POST['task'];
    $query = "INSERT INTO todos (task) VALUES (?)";
    $statement = $pdo->prepare($query);
    if ($statement->execute([$task])) {
        header("Location: todo.php"); // Weiterleitung zur Hauptseite
    } else {
        echo "Fehler beim Hinzufügen der Aufgabe.";
    }
}
?>
