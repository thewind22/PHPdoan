
CREATE TABLE Roles (
  RoleID INT PRIMARY KEY AUTO_INCREMENT,
  RoleName VARCHAR(255) NOT NULL
);


CREATE TABLE Users (
  UserID INT PRIMARY KEY AUTO_INCREMENT,
  UserName VARCHAR(255) NOT NULL,
  Email VARCHAR(255) NOT NULL UNIQUE,
  Password VARCHAR(255) NOT NULL,
  RoleID INT,
  FOREIGN KEY (RoleID) REFERENCES Roles(RoleID)
);


CREATE TABLE Rooms (
  RoomID INT PRIMARY KEY AUTO_INCREMENT,
  RoomNumber VARCHAR(50) NOT NULL UNIQUE,
  RoomType VARCHAR(255) NOT NULL,
  Price DECIMAL(10, 2) NOT NULL,
  Status VARCHAR(50) NOT NULL
);


CREATE TABLE Reservations (
  ReservationID INT PRIMARY KEY AUTO_INCREMENT,
  UserID INT,
  RoomID INT,
  BookingDate DATE NOT NULL,
  CheckInDate DATE NOT NULL,
  CheckOutDate DATE NOT NULL,
  Status VARCHAR(50) NOT NULL,
  FOREIGN KEY (UserID) REFERENCES Users(UserID),
  FOREIGN KEY (RoomID) REFERENCES Rooms(RoomID)
);


CREATE TABLE Payments (
  PaymentID INT PRIMARY KEY AUTO_INCREMENT,
  ReservationID INT,
  Amount DECIMAL(10, 2) NOT NULL,
  PaymentDate DATE NOT NULL,
  PaymentMethod VARCHAR(255) NOT NULL,
  FOREIGN KEY (ReservationID) REFERENCES Reservations(ReservationID)
);


INSERT INTO Roles (RoleName) VALUES
('Admin'),
('Staff'),
('Customer');


INSERT INTO Rooms (RoomNumber, RoomType, Price, Status) VALUES
('101', 'Standard', 100.00, 'Available'),
('102', 'Standard', 100.00, 'Available'),
('201', 'Deluxe', 150.00, 'Available'),
('202', 'Deluxe', 150.00, 'Available');

