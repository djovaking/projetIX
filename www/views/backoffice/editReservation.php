<!-- backoffice/edit-reservation.php -->
<h1>Edit Reservation</h1>

<?php $reservationId = $_GET['id']; ?>
<form>
        <h1>Edit Reservation</h1>

        <form method="POST" action="updatepage.php">
            <input type="hidden" name="reservationId" value="<?php echo $reservationId; ?>">
            <label for="status">Statut de la réservation :</label>
            <input type="text" name="status" id="status" value="' . $status . '"><br>

            <!-- Afficher d\'autres champs de la réservation -->
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="' . $nom . '"><br>

            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value="' . $email . '"><br>

            <!-- etc. -->

            <button type="submit">Update</button>
</form>

