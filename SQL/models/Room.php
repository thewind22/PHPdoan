<?php
class Room {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
    

    public function getAllRooms() {
        $query = "SELECT * FROM rooms";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }

    public function getRoomById($roomId) {
        $query = "SELECT * FROM rooms WHERE RoomID = '$roomId'";
        $result = mysqli_query($this->connection, $query);
        $room = mysqli_fetch_assoc($result);
        return $room;
    }

    public function addRoom($roomNumber, $roomType, $price, $status) {
        $query = "INSERT INTO rooms (RoomNumber, RoomType, Price, Status) VALUES ('$roomNumber', '$roomType', '$price', '$status')";
        mysqli_query($this->connection, $query);
    }

    public function updateRoom($roomId, $roomNumber, $roomType, $price, $status) {
        $query = "UPDATE rooms SET RoomNumber = '$roomNumber', RoomType = '$roomType', Price = '$price', Status = '$status' WHERE RoomID = '$roomId'";
        mysqli_query($this->connection, $query);
    }

    public function deleteRoom($roomId) {
        $query = "DELETE FROM rooms WHERE RoomID = '$roomId'";
        mysqli_query($this->connection, $query);
    }
}
?>
