<?php
    include_once __DIR__ . '/config/database.php';  // Include your database connection

    // Check if ID is provided
    if (isset($_POST['id'])) {
        $carId = $_POST['id'];

        // First, retrieve the image path for the car
        $stmt = $con->prepare("SELECT car_img FROM newest_cars WHERE id = :id");
        $stmt->bindParam(':id', $carId);
        $stmt->execute();
        $car = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($car) {
            $image = '../assets/uploads/' . $car['car_img'];

            // Check if the image file exists and delete it
            if (file_exists($image)) {
                unlink($image); // Delete the image file from the server
            }

            // Prepare the delete query
            $stmt = $con->prepare("DELETE FROM newest_cars WHERE id = :id");
            $stmt->bindParam(':id', $carId);

            if ($stmt->execute()) {
                // Return success response if the car was deleted
                echo json_encode(['status' => 'success']);
            } else {
                // Return failure response if the car was not deleted
                echo json_encode(['status' => 'error']);
            }
        }
    }
?>
