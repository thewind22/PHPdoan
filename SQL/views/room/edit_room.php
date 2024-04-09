<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room</title>
</head>
<body>
    <h1>Edit Room</h1>
    <form method="POST" action="index.php?action=edit&RoomID=<?php echo $room['RoomID']; ?>">
        <label for="RoomNumber">Room Number:</label>
        <input type="text" name="RoomNumber" value="<?php echo $room['RoomNumber']; ?>" required><br>
        <label for="RoomType">Room Type:</label>
        <input type="text" name="RoomType" value="<?php echo $room['RoomType']; ?>" required><br>
        <label for="Price">Price:</label>
        <input type="text" name="Price" value="<?php echo $room['Price']; ?>" required><br>
        <label for="Status">Status:</label>
        <input type="text" name="Status" value="<?php echo $room['Status']; ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
