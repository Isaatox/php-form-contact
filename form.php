<html>
    <head>
        <meta charset= "utf-8">
    </head>
    <body>
       
    <?php
        $nameErr = $emailErr = $genderErr = $websiteErr = "";
        $name = $email = $gender = $comment = $website = "" ;
        function test_input($data)

    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

    }

    

        if($_SERVER["REQUEST_METHOD"]== "POST") {
            if (empty($_POST["name"])){
                $nameErr = "Nom est requis";
            } else {
                $name = test_input($_POST["name"]);
                $name = test_input($_POST["name"]);
                if (!preg_match('/^[a-zA-Z \p{L}]+$/ui', $name)) {
                    $nameErr = "Only letters and white space allowed";
                }
            }
            if (empty($_POST["email"])){
                $emailErr="Email est requis";
            }else{
                $email= test_input($_POST["email"]);
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }
            if (!empty($_POST["website"])){
                $website= test_input($_POST["website"]);
                $website = test_input($_POST["website"]);
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                    $websiteErr = "URL invalide";
                }
            }
            if (!empty($_POST["comment"])){
                $comment= test_input($_POST["comment"]);
            }
            if (empty($_POST["gender"])){
                $genderErr="Gender est requis";
            }else{
                $gender= test_input($_POST["gender"]);
            }
        }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nom: <input type="text" name="name" value="<?php echo $name;?>"><br><br>
        E-mail: <input type="text" name="email" value="<?php echo $email;?>"><br><br>
        site: <input type="text" name="website" value="<?php echo $website;?>"><br><br>
        Commentaire: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea><br><br>
        Genre:<input type="radio" name="gender"
                    <?php if (isset($gender) && $gender=="female") echo "checked";?>
                        value="female">Femme
                <input type="radio" name="gender"
                    <?php if (isset($gender) && $gender=="male") echo "checked";?>
                        value="male">Homme
                <input type="radio" name="gender"
                    <?php if (isset($gender) && $gender=="other") echo "checked";?>
                        value="other">Autre
                <input type="submit" name="submit" value="Envoyer">
    </form>
</body>
</html>