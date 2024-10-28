<?php

    include_once __DIR__ . "/config/database.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $carId = $_POST['edit_car_id'];
        $carName = $_POST['edit_car_name'];
        $carOldImg = $_POST['edit_car_oldimg'];
        $carYear = $_POST['edit_car_year'];
        $carMake = $_POST['edit_car_make'];
        $carModel = $_POST['edit_car_model'];
        $carBodystyle = $_POST['edit_car_bodystyle'];
        $carCondition = $_POST['edit_car_condition'];
        $carPrice = $_POST['edit_car_price'];
        $carShortDesc = $_POST['edit_car_shortdesc'];
        $carLongDesc = $_POST['edit_car_longdesc'];
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
            $stmt = $con->prepare("UPDATE featured_cars SET name = :name, image = :image, year = :year, make = :make, model = :model, body_style = :body_style, car_condition = :car_condition, price = :price, short_description = :short_description, long_description = :long_description WHERE id = :car_id");
            $stmt->bindParam(':name', $carName);
            $stmt->bindParam(':image', $fileName); // Will use the new image if uploaded, otherwise the old image
            $stmt->bindParam(':year', $carYear); 
            $stmt->bindParam(':make', $carMake); 
            $stmt->bindParam(':model', $carModel); 
            $stmt->bindParam(':body_style', $carBodystyle); 
            $stmt->bindParam(':car_condition', $carCondition); 
            $stmt->bindParam(':price', $carPrice); 
            $stmt->bindParam(':short_description', $carShortDesc);
            $stmt->bindParam(':long_description', $carLongDesc);
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
