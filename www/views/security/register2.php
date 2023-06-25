<!DOCTYPE html>
<html>

<head>
    <title>--test inscription email--</title>
</head>

<body>
    <h2>S'inscrire2</h2>
    <form action="traitement.php" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="motdepasse">Mot de passe :</label>
        <input type="password" id="motdepasse" name="motdepasse" required><br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="S'inscrire">
    </form>
</body>

</html>