<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room List</title>
</head>
<body>
    <h1>Room List</h1>
    <a href="index.php?action=add">Add Room</a>
    <table>
        <tr>
            <th>Room ID</th>
            <th>Room Number</th>
            <th>Room Type</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($rooms)) { ?>
            <tr>
                <td><?php echo $row['RoomID']; ?></td>
                <td><?php echo $row['RoomNumber']; ?></td>
                <td><?php echo $row['RoomType']; ?></td>
                <td><?php echo $row['Price']; ?></td>
                <td><?php echo $row['Status']; ?></td>
                <td>
                    <a href="index.php?action=details&RoomID=<?php echo $row['RoomID']; ?>">View</a>
                    <a href="index.php?action=edit&RoomID=<?php echo $row['RoomID']; ?>">Edit</a>
                    <a href="index.php?action=delete&RoomID=<?php echo $row['RoomID']; ?>" onclick="return confirm('Are you sure you want to delete this room?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <a href="index.php?action=logout">Logout</a>

</body>
</html>
