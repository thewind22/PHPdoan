<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room</title>
</head>
<body>
    <h1>Add Room</h1>
    <form method="POST" action="index.php?action=add">
        <label for="RoomNumber">Room Number:</label>
        <input type="text" name="RoomNumber" required><br>
        <label for="RoomType">Room Type:</label>
        <input type="text" name="RoomType" required><br>
        <label for="Price">Price:</label>
        <input type="text" name="Price" required><br>
        <label for="Status">Status:</label>
        <input type="text" name="Status" required><br>
        <button type="submit">Add</button>
    </form>
</body>
</html>
