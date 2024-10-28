<?php

    include_once __DIR__ . "/config/database.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $carId = $_POST['edit_car_id'];
        $carName = $_POST['edit_carname'];
        $carDesc = $_POST['edit_cardesc'];
        $carOldImg = $_POST['edit_car_oldimg'];
        $uploadDir = 'uploads/';

        $fileName = $carOldImg; // Default to old image
        
        // Handle the file upload
        if (isset($_FILES['edit_car_img']) && $_FILES['edit_car_img']['error'] == 0) {
            $newFileName = basename($_FILES['edit_car_img']['name']);
            $targetFilePath = $uploadDir . $newFileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array(strtolower($fileType), $allowTypes)) {
                if (move_uploaded_file($_FILES['edit_car_img']['tmp_name'], $targetFilePath)) {
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
            $stmt = $con->prepare("UPDATE newest_cars SET car_img = :car_img, car_name = :car_name, car_desc = :car_desc WHERE id = :car_id");
            $stmt->bindParam(':car_img', $fileName); // Will use the new image if uploaded, otherwise the old image
            $stmt->bindParam(':car_name', $carName);
            $stmt->bindParam(':car_desc', $carDesc);
            $stmt->bindParam(':car_id', $carId);
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
