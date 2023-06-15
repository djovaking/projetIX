<!-- backoffice/reservation.php -->
<h1>Reservation Management</h1>

<table>
    <thead>
        <tr>
            <?php foreach (array_keys($reservations[0]) as $column) : ?>
                <th><?php echo $column; ?></th>
            <?php endforeach; ?>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservations as $reservation) : ?>
            <tr>
                <?php foreach ($reservation as $value) : ?>
                    <td><?php echo $value; ?></td>
                <?php endforeach; ?>
                <td>
                    <a href="/admin/reservations/edit/<?php echo $reservation['id']; ?>">Edit</a>
                    <a href="/admin/reservations/delete/<?php echo $reservation['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
