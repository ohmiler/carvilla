<?php

    include_once __DIR__ . "/config/database.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $clientId = $_POST['edit_client_id'];
        $clientOldImg = $_POST['edit_client_oldimg'];
        $clientMsg = $_POST['edit_client_msg'];
        $clientName = $_POST['edit_client_name'];
        $clientCity = $_POST['edit_client_city'];
        
        $uploadDir = 'uploads/';

        $fileName = $clientOldImg; // Default to old image
        
        // Handle the file upload
        if (isset($_FILES['edit_client_img']) && $_FILES['edit_client_img']['error'] == 0) {
            $newFileName = basename($_FILES['edit_client_img']['name']);
            $targetFilePath = $uploadDir . $newFileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array(strtolower($fileType), $allowTypes)) {
                if (move_uploaded_file($_FILES['edit_client_img']['tmp_name'], $targetFilePath)) {
                    $fileName = $newFileName; // Set to new file if upload is successful
                } else {
                    echo json_encode([
                        "status" => "error",
                        "message" =>  "File upload failed."
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "error",
                    "message" =>  "Invalid file type."
                ]);
            }
        }

        // Now, update the database with either the new image or the old image
        try {
            $stmt = $con->prepare("UPDATE clients_review SET client_img = :client_img, client_msg = :client_msg, client_name = :client_name, client_city = :client_city WHERE id = :client_id");
            $stmt->bindParam(':client_img', $fileName); // Will use the new image if uploaded, otherwise the old image
            $stmt->bindParam(':client_msg', $clientMsg); 
            $stmt->bindParam(':client_name', $clientName); 
            $stmt->bindParam(':client_city', $clientCity); 
            $stmt->bindParam(':client_id', $clientId);
            $stmt->execute();

            if ($stmt->rowCount()) {
                echo json_encode([
                    "status" => "success",
                    "message" => "Data successfully updated!"
                ]);
            } else {
                echo json_encode([
                    "status" => "error",
                    "message" => "No changes made."
                ]);
            }
        } catch (PDOException $e) {
            echo json_encode([
                "status" => "error",
                "message" => "Database error: " . $e->getMessage()
            ]);
        }
    }
?>
