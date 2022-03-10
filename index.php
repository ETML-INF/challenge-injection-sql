<?php

$users = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $useLogin = $_POST["useLogin"];
    $userPassword = $_POST["usePassword"];

    $connector = new PDO('mysql:host=localhost;dbname=db_example_injection;charset=utf8', 'dbNicknameUser', '.ETML151');
    $query = "SELECT * FROM t_user where useLogin = '" . $useLogin . "'";

    $req = $connector->query($query);
    $users = $req->fetchALL(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Exemple d'injection SQL</title>
</head>

<body>
    <h1>Exemple d'injection SQL</h1>

    <form method="post" action="index.php" style="margin-top: 40px">
        Username: <input type="text" name="useLogin" value="">
        Password: <input type="text" name="usePassword" value="">
        <input type="submit" name="login" value="Login">
    </form>

    <table class="table" style="margin-top: 40px">
        <tr>
            <td>Username</td>
            <td>Password</td>
            <td>Role</td>
        </tr>

        <?php
        foreach ($users as $user) {
            $html = "<tr>";
            $html .= "<td>" . $user["useLogin"] . "</td>";
            $html .= "<td>" . $user["usePassword"] . "</td>";
            $html .= "<td>" . $user["useAdministrator"] . "</td>";
            $html .= "</tr>";
            echo $html;
        }
        ?>
    </table>

</body>

</html>