<?php 
session_start();
require_once("inc/functions.inc.php");
include("templates/header.inc.php")
?>
<!DOCTYPE html>
<html>
<head>
  <title>ToDo-Liste</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>ToDo-Liste</h1>
  <form action="add_task.php" method="POST">
    <input type="text" name="task" placeholder="Neue Aufgabe hinzufügen" required>
    <button type="submit">Hinzufügen</button>
  </form>
  <ul>
    <?php
    include('inc/config.inc.php');

    // Abrufen der Aufgaben aus der Datenbank
    $query = "SELECT * FROM todos";
    $statement = $pdo->query($query);
    if ($statement->rowCount() > 0) {
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo "<li>" . $row['task'] . "</li>";
        }
    }

    ?>
  </ul>
</body>
</html>
<?php 
include("templates/footer.inc.php")
?>