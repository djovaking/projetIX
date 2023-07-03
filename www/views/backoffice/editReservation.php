<h1>Edit Reservation</h1>

<form method="POST" action="updatereservation">
    <input type="hidden" name="reservationId" value="<?php echo $_GET['reservationId']; ?>">
    <div>
        <label for="name">Date:</label>
        <input type="text" name="date" value="<?php echo $_GET['date']; ?>">
    </div>
    <div>
        <label for="time">Temps:</label>
        <input type="text" name="time" value="<?php echo substr($_GET['time'], 0, 8); ?>">
    </div>
    <div>
        <label for="nb_person">Nombre de personnes:</label>
        <input type="text" name="nb_person" value="<?php echo $_GET['nb_person']; ?>">
    </div>
    <div>
        <label for="firstname">Prénom:</label>
        <input type="text" name="firstname" value="<?php echo $_GET['firstname']; ?>">
    </div>
    <div>
        <label for="lastname">Nom:</label>
        <input type="text" name="lastname" value="<?php echo $_GET['lastname']; ?>">
    </div>
    <div>
        <label for="phone">Téléphone:</label>
        <input type="text" name="phone" value="<?php echo $_GET['phone']; ?>">
    </div>
    <button type="submit">Update</button>
</form>
<form method="POST" action="deleteReservation">
    <input type="hidden" name="reservationId" value="<?php echo $_GET['reservationId']; ?>">
    <button type="submit" onclick="return confirm('Are you sure you want to delete this reservation ?')">Supprimer la réservation</button>
</form>