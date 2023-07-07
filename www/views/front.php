<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Mon site MVC</title>
    <meta name="description" content="mon super site en MVC from scratch">
    <link rel="stylesheet" href="../assets/dist/main.css">
</head>

<body>
    <?php include 'header.php' ?>
    <!-- la vue  -->
    <?php include $this->view; ?>

    <!-- footer -->
    <?php include 'footer.php' ?>
</body>

</html>