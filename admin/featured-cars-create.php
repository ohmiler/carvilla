<?php

    include_once __DIR__ . "/config/database.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $carName = $_POST['car_name'];
        $carYear = $_POST['car_year'];
        $carMake = $_POST['car_make'];
        $carModel = $_POST['car_model'];
        $carBodystyle = $_POST['car_bodystyle'];
        $carCondition = $_POST['car_condition'];
        $carPrice = $_POST['car_price'];
        $carShortdesc = $_POST['car_shortdesc'];
        $carLongdesc = $_POST['car_longdesc'];
        $uploadDir = '../assets/uploads/';
        
        // Handle the file upload
        if (isset($_FILES['car_img']) && $_FILES['car_img']['error'] == 0) {
            $fileName = basename($_FILES['car_img']['name']);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            $uniqueFileName = md5(uniqid()) . '.' . $fileType;  // Generate a unique name and append the extension
            $targetFilePath = $uploadDir . $uniqueFileName;

            // Allow certain file formats (you can add more if needed)
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array(strtolower($fileType), $allowTypes)) {
                if (move_uploaded_file($_FILES['car_img']['tmp_name'], $targetFilePath)) {
                    // File uploaded successfully, now save data to the database
                    
                    try {
                        $stmt = $con->prepare("INSERT INTO featured_cars (name, image, year, make, model, body_style, car_condition, price, short_description, long_description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                        $stmt->execute([$carName, $uniqueFileName, $carYear, $carMake, $carModel, $carBodystyle, $carCondition, $carPrice, $carShortdesc, $carLongdesc]);

                        if ($stmt) {
                            echo json_encode([
                                "status" => "success",
                                "message" => "Data successfully inserted!"
                            ]);
                        } else {
                            echo json_encode([
                                "status" => "error",
                                "message" => "Failed to insert data."
                            ]);
                        }
                    } catch (PDOException $e) {
                        echo json_encode([
                            "status" => "error",
                            "message" => "Database error"
                        ]);
                    }
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
        } else {
            echo json_encode([
                "status" => "error",
                "message" =>  "No file uploaded or file upload error."
            ]);
        }
    }
?>
