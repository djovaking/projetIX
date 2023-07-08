<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../../assets/dist/main.css">
</head>
<body>
  <div class="container-login">
      <div class="image">
          <img src="../../assets/images/pizza-italienne-traditionnelle.jpg" alt="pizza">
      </div>
      <div class="form">
          <h1>Se connecter</h1>
          <?php $this->modal("form", $form, $formErrors); ?>
      </div>
  </div>
</body>
</html>