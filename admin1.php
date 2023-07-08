<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benutzerverwaltung</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
</head>
<body>
    <table>
    <tr>
    <th>ID</th>
    <th>email</th>
    <th>vorname</th>
    <th>nachname</th>
    <th>Aktionen</th>
    </tr>

    <?php
    session_start();
    require_once("inc/config.inc.php");
    require_once("inc/functions.inc.php");

    if(isset($_GET["del"])){
        if(!empty($_GET["del"])){
            $statement = $pdo->prepare("DELETE FROM users WHERE ID = :id");
            $statement->execute(array(":id" => $_GET["del"]));
            ?>
            <p>Der Benutzer wurde gelöscht</p>
            <?php
        }
    }

    $statement = $pdo->prepare("SELECT * FROM users ORDER BY id");
    $statement->execute();
    while($row = $statement->fetch()){
        ?>
        <tr>
        <td><?php echo $row["id"] ?></td>
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["vorname"] ?></td>
        <td><?php echo $row["nachname"] ?></td>
        <td><a href="admin.php?id=<?php echo $row["id"] ?>"><i class="fas fa-edit"></i></a><a href="admin1.php?del=<?php echo $row["id"] ?>"><i class="fas fa-user-minus"></i></a></td>
        </tr>
        <?php
        
    }
    include("templates/header.inc.php")
    ?>
    <tr><a href="12345678.php"><i class="fas fa-user-plus"></i></a></tr>
    </table>
</body>
</html>
<?php
    include("templates/footer.inc.php")
    ?>