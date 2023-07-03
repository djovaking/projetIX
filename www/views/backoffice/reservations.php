<?php if (empty($reservations)) : ?>
    <p>Aucune réservation n'a été trouvé.</p>
<?php else : ?>
    <table>
        <thead>
            <tr>
                <?php foreach (array_keys($reservations[0]) as $column) : ?>
                    <th><?php echo $column; ?></th>
                <?php endforeach; ?>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation) : ?>
                <tr>
                    <?php foreach ($reservation as $value) : ?>
                        <td><?php echo $value; ?></td>
                        <?php endforeach; ?>
                        <td><a href="editReservation?reservationId=<?php echo $reservation["id"]; ?>
                                    &date=<?php echo $reservation["date"]; ?>
                                    &time=<?php echo $reservation["time"]; ?>
                                    &nb_person=<?php echo $reservation["nb_person"]; ?>
                                    &firstname=<?php echo $reservation["firstname"]; ?>
                                    &lastname=<?php echo $reservation["lastname"]; ?>
                                    &phone=<?php echo $reservation["phone"]; ?>
                                    ">Edit</a></td>
                        <td><a href="deleteReservation?reservationId=<?php echo $reservation["id"]; ?>">Delete</a></td>               
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>