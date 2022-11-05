<?php

$users = [];
$isUserConnected = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération du login et password saisi par l'utilisateur
    $useLogin = $_POST["useLogin"];
    $userPassword = $_POST["usePassword"];

    // Création d'une instance PDO pour se connecter à la base de données en base de données
    $connector = new PDO("mysql:host=localhost;dbname=challengeinjectionsql;charset=utf8", 'root', '');

    // Création de la requête SQL permettant de récupérer les informations de l'utilisateur
    // à partir du login et password saisis par l'utilisateur
    $query = "SELECT * FROM t_user where useLogin = '" . $useLogin . "' and usePassword = '" . $userPassword . "'";

    // Exécution de la requête. A noter l'utilisation de la méthode ->query()
    $req = $connector->query($query);

    // On convertit le résultat de la requête en tableau
    $user = $req->fetchALL(PDO::FETCH_ASSOC);
    // Si le tableau 'user' n'est pas vide, cela signifie que l'utilisateur a bien été trouvé en DB
    if ($user) {
        $isUserConnected = 1;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" />
    <title>Exemple d'injection SQL</title>
</head>

<body>
    <div class="container">
        <h1>Exemple d'injection SQL</h1>
        <div class="block">
            <h2>Se connecter</h2>
            <form method="post" action="index.php" style="margin-top: 40px">
                Username: <input type="text" name="useLogin" value="">
                Password: <input type="text" name="usePassword" value="">
                <input type="submit" name="login" value="Login">
            </form>
        </div>
        <div class="block">
            <h2>Utilisateur connecté ? : <?php echo $isUserConnected ?></h2>
            <?php if ($isUserConnected) {
                echo "<h2>Bonjour " . $user[0]["useLogin"] . " </h2>";
            } ?>
        </div>
        <div class="block">
            <h2>Requête SQL:</h2>
            <?php var_dump($query); ?>
        </div>
    </div>
</body>

</html>