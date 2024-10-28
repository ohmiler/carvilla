<?php
include_once __DIR__ . "/config/database.php";

if (isset($_POST['id'])) {
    $carId = $_POST['id'];

    // Fetch car data from the database
    $stmt = $con->prepare("SELECT * FROM newest_cars WHERE id = :id");
    $stmt->bindParam(':id', $carId);
    $stmt->execute();
    
    $car = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($car) {
        echo json_encode([
            "status" => "success",
            "data" => $car
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Car not found."
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request."
    ]);
}
?>
