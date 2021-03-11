<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Nom : <input type="text" name="fname">
    <input type="submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_REQUEST['fname'];
        if (empty($name)){
            echo "Name is empty";
        } else {
            echo $name;
        }
    }
    ?>
</body>
</html>