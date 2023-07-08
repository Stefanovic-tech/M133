
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benutzer bearbeiten</title>
</head>
<body>

    <?php
    if(isset($_GET["id"])){
        if(!empty($_GET["id"])){
            require_once("inc/config.inc.php");
            require_once("inc/functions.inc.php");
                if(isset($_POST["submit"])){
                $statement = $pdo->prepare("UPDATE users SET email = :email WHERE ID = :id");
                $statement->execute(array(":email" => $_POST["email"], ":id" => $_GET["id"]));
                ?>
                <p>Der Benutzer wurde gespeichert.</p>
                <?php
            }
            $statement = $pdo->prepare("SELECT * FROM users WHERE id = :id");
            $statement->execute(array(":id" => $_GET["id"]));
            $row = $statement->fetch();
            ?>
            <form action="admin1.php?id=<?php echo $_GET["id"] ?>" method="post">
                <input type="email" name="email" value="<?php echo $row["email"] ?>" placeholder="Email" require><br>
                <button name="submit" type="submit">Speichern</button>
            </form>
            <?php
        } else {
            //admin.php?id
            ?>
            <p>Kein Benutzer wurde angefragt</p>
            <?php
        }
    } else {
        //admin.php

        ?>
        <p>Kein Benutzer wurde angefragt</p>
        <?php
    }
    ?>
</body>
</html>
<?php
    include("templates/footer.inc.php")
    ?>
    