<!-- backoffice/edit-reservation.php -->
<h1>Edit Reservation</h1>

<form action="<?php echo $editUrl; ?>" method="POST">
    <!-- Champs de formulaire pour la modification de la réservation -->
    <label for="status">Status:</label>
    <input type="text" name="status" id="status" value="<?php echo $reservation['status']; ?>"><br>

    <input type="submit" value="Update Reservation">
</form>
