<?php
include 'models\Room.php';

class RoomController {
    private $roomModel;

    public function __construct() {
        include 'models\db_connection.php';
        $this->roomModel = new Room($connection);
    }

    public function index() {
        $rooms = $this->roomModel->getAllRooms();
        include 'views/room/rooms.php';
    }
    public function details($roomId) {
        $room = $this->roomModel->getRoomById($roomId);
        include 'views/room/room_details.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $roomNumber = $_POST['RoomNumber'];
            $roomType = $_POST['RoomType'];
            $price = $_POST['Price'];
            $status = $_POST['Status'];
            $this->roomModel->addRoom($roomNumber, $roomType, $price, $status);
            header("Location: index.php");
            exit;
        }
        include 'views/room/add_room.php';
    }

    public function edit($roomId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $roomNumber = $_POST['RoomNumber'];
            $roomType = $_POST['RoomType'];
            $price = $_POST['Price'];
            $status = $_POST['Status'];
            $this->roomModel->updateRoom($roomId, $roomNumber, $roomType, $price, $status);
            header("Location: index.php");
            exit;
        }
        $room = $this->roomModel->getRoomById($roomId);
        include 'views/room/edit_room.php';
    }

    public function delete($roomId) {
        $this->roomModel->deleteRoom($roomId);
        header("Location: index.php");
        exit;
    }
}
?>
