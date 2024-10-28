<?php
    include_once __DIR__ . '/config/database.php';  // Include your database connection

    // Check if ID is provided
    if (isset($_POST['id'])) {
        $clientId = $_POST['id'];

        // First, retrieve the image path for the car
        $stmt = $con->prepare("SELECT client_img FROM clients_review WHERE id = :id");
        $stmt->bindParam(':id', $clientId);
        $stmt->execute();
        $client = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($client) {
            $image = '../assets/uploads/' . $client['client_img'];

            // Check if the image file exists and delete it
            if (file_exists($image)) {
                unlink($image); // Delete the image file from the server
            }

            // Prepare the delete query
            $stmt = $con->prepare("DELETE FROM clients_review WHERE id = :id");
            $stmt->bindParam(':id', $clientId);

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
